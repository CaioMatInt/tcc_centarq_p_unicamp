<?php

namespace App\Http\Controllers;

use App\Services\ConductionPointService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ConductionPointController extends Controller
{
    private $conductionPointService;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Pontos de condução';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Ponto de condução';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'conductionPoint';
    public $crudRouteName = 'pontos-de-conducao';

    public function __construct(ConductionPointService $conductionPointService)
    {
        $this->conductionPointService = $conductionPointService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->conductionPointService->renderPaginated(10),
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
            'pageTitle' => 'Cadastrar nova ' . $this->name,
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName
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

            $this->conductionPointService->buildInsert($data);


            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' "' . $request->name . '" cadastrada com sucesso',
            ]);



        } catch (\Exception $e) {

            DB::rollBack();

            $request->session()->flash('msg', [
                'type' => 'error',
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
            'pageTitle' => 'Editar ' . $this->name,
            'resource' => $this->conductionPointService->renderEdit($id),
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName
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
            $this->conductionPointService->buildUpdate($id, $data);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' "' . $request->name . '" atualizada com sucesso',
            ]);

        } catch (\Exception $e) {

            $request->session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao atualizar ' . $this->name . ' ' . $request->name,
            ]);
        } finally {
            return redirect()->route($this->crudRouteName . '.index');
        }

    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $this->conductionPointService->buildDelete($id);

            session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' removido com sucesso',
            ]);
        } catch (\Exception $e) {

            session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao remover ' . $this->name,
            ]);
        } finally {
            return redirect()->route($this->crudRouteName . '.index');
        }
    }

}
