<?php

namespace App\Http\Controllers;

use App\Services\IbgeApiService;
use App\Services\TownHallService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TownHallController extends Controller
{
    private $townHallService;
    private $ibgeApiService;
    const stateOfSaoPauloIbgeId = 35;
    /* Name of this CRUD, in plural */
    public $plural_name = 'Prefeituras';
    /* Name of this CRUD*/
    public $name = 'Prefeitura';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'townhall';

    public function __construct(TownHallService $townHallService, IbgeApiService $ibgeApiService)
    {

        $this->townHallService = $townHallService;
        $this->ibgeApiService = $ibgeApiService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->townHallService->renderListWithCityRelation(),
            'pageTitle' => 'Cadastro de ' . $this->plural_name

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
            'ibgeCitiesArray' => $this->ibgeApiService->renderListOfCitiesByIbgeStateId(self::stateOfSaoPauloIbgeId)
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
            $data = $request->all();

            $this->townHallService->buildInsert($data);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' de ' . $request->name . ' cadastrada com sucesso',
            ]);


        } catch (\Exception $e) {

            $request->session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao cadastrar ' . $this->name . ' ' . $request->name,
            ]);

        } finally {
            return redirect()->route('prefeituras');
        }
    }

    /**
     * @return void
     */
    public function edit($id)
    {
        $data = [
            'pageTitle' => 'Editar' . $this->name,
            'resource' => $this->townHallService->renderEdit($id)
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
            $this->townHallService->buildUpdate($id, $data);

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
            return redirect()->route('coberturas');
        }

    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $this->townHallService->buildDelete($id);

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
            return redirect()->route('prefeituras');
        }
    }

}
