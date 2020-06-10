<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalExam;
use App\Services\CityService;
use App\Services\IbgeApiService;
use App\Services\MedicalExamService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MedicalExamController extends Controller
{
    private $medicalExamService;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Exames';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Exame';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'medicalExam';
    public $crudRouteName = 'Exames';

    public function __construct(MedicalExamService $medicalExamService)
    {
        $this->medicalExamService = $medicalExamService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->medicalExamService->renderList(),
            'pageTitle' => 'Cadastro de ' . $this->pluralName,
            'crudRouteName' => $this->crudRouteName

        ];

        return view('dashboard.' . $this->crudFolder . '.index', $data);
    }

    /**
     * @return void
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Cadastrar novo ' . $this->name,
            'crudRouteName' => $this->crudRouteName
        ];

        return view('dashboard.' . $this->crudFolder . '.create', $data);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();

            $data = $request->all();

            $this->medicalExamService->buildInsert($data);


            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . '  ' . $request->name . ' cadastrada com sucesso',
            ]);



        } catch (\Exception $e) {

            DB::rollBack();

            $request->session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao cadastrar ' . $this->name . '  ' . $request->name . '. Por favor, contate o administrador do sistema.',
            ]);

            return redirect()->route($this->crudRouteName . '.create');
        }

        DB::commit();

        return redirect()->route($this->crudRouteName. '.index');
    }

    /**
     * @return void
     */
    public function edit($id)
    {
        $data = [
            'pageTitle' => 'Editar' . $this->name,
            'resource' => $this->medicalExamService->renderEdit($id)
        ];

        return view('dashboard.' . $this->crudFolder . '.edit', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {

        try {
            $data = $request->all();
            $this->medicalExamService->buildUpdate($id, $data);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' de ' . $request->name . ' atualizada com sucesso',
            ]);

        } catch (\Exception $e) {

            $request->session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao atualizar ' . $this->name . ' de ' . $request->name,
            ]);
        } finally {
            return redirect()->route($this->crudRouteName);
        }

    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $this->medicalExamService->buildDelete($id);

            session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' removida com sucesso',
            ]);
        } catch (\Exception $e) {

            session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao remover ' . $this->name,
            ]);
        } finally {
            return redirect()->route($this->crudRouteName);
        }
    }

}
