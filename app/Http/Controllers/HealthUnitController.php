<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHealthUnitRequest;
use App\Http\Requests\UpdateHealthUnitRequest;
use App\Services\HealthUnitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HealthUnitController extends Controller
{
    private $healthUnitService;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Unidades de Saúde';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Unidade de Saúde';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'healthUnit';
    public $crudRouteName = 'unidades-de-saude';

    public function __construct(HealthUnitService $healthUnitService)
    {
        $this->healthUnitService = $healthUnitService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->healthUnitService->renderPaginated(10),
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
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName
        ];

        return view('dashboard.' . $this->crudFolder . '.create', $data);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(StoreHealthUnitRequest $request)
    {

        try {
            DB::beginTransaction();

            $data = $request->all();

            $this->healthUnitService->buildInsert($data);


            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . '  ' . $request->name . ' cadastrada com sucesso',
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
            'resource' => $this->healthUnitService->renderEdit($id),
            'pluralName' => $this->pluralName,
            'crudRouteName' => $this->crudRouteName
        ];

        return view('dashboard.' . $this->crudFolder . '.edit', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateHealthUnitRequest $request)
    {

        try {
            $data = $request->all();
            $this->healthUnitService->buildUpdate($id, $data);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' de ' . $request->name . ' atualizada com sucesso',
            ]);

        } catch (\Exception $e) {

            $request->session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao atualizar ' . $this->name . ' de ' . $request->name,
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
            $this->healthUnitService->buildDelete($id);

            session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' removida com sucesso',
            ]);
        } catch (\Exception $e) {

            session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao remover ' . $this->name . '. Caso existam exames cadastrados para esta unidade, exclua todos os relacionados para excluir esta unidade de saúde.',
            ]);
        } finally {
            return redirect()->route($this->crudRouteName . '.index');
        }
    }

}
