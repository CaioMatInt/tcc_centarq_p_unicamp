<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalExamType;
use App\Services\CityService;
use App\Services\IbgeApiService;
use App\Services\MedicalExamTypeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MedicalExamTypeController extends Controller
{
    private $medicalExamTypeService;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Tipos de Exame';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Tipo de Exame';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'medicalExam';
    public $crudRouteName = 'tipos-de-exame';

    public function __construct(MedicalExamTypeService $medicalExamTypeService)
    {
        $this->medicalExamTypeService = $medicalExamTypeService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->medicalExamTypeService->renderList(),
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
    public function store(StoreMedicalExamType $request)
    {

        try {
            DB::beginTransaction();

            $data = $request->all();

            $this->medicalExamTypeService->buildInsert($data);


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
            'resource' => $this->medicalExamTypeService->renderEdit($id)
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
            $this->medicalExamTypeService->buildUpdate($id, $data);

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
            $this->medicalExamTypeService->buildDelete($id);

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
