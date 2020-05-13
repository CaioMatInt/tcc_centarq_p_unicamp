<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTownHall;
use App\Services\CityService;
use App\Services\IbgeApiService;
use App\Services\TownHallService;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TownHallController extends Controller
{
    private $townHallService;
    private $ibgeApiService;
    private $userService;
    private $cityService;
    const stateOfSaoPauloIbgeId = 35;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Prefeituras';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Prefeitura';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'townhall';
    public $crudRouteName = 'prefeituras';

    public function __construct(TownHallService $townHallService, IbgeApiService $ibgeApiService, UserService $userService, CityService $cityService)
    {

        $this->townHallService = $townHallService;
        $this->ibgeApiService = $ibgeApiService;
        $this->userService = $userService;
        $this->cityService = $cityService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->townHallService->renderListWithCityRelation(),
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
            'ibgeCitiesArray' => $this->ibgeApiService->renderListOfCitiesByIbgeStateId(self::stateOfSaoPauloIbgeId),
            'crudRouteName' => $this->crudRouteName
        ];

        return view('dashboard.' . $this->crudFolder . '.create', $data);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(StoreTownHall $request)
    {

        try {
            DB::beginTransaction();

            $data = $request->all();

            $cityInserted = $this->cityService->buildInsert($data);

            $dataToCreateATownHall['image'] = $data['image'];
            $dataToCreateATownHall['city_id'] = $cityInserted->id;

            $townHallPersistance = $this->townHallService->buildInsert($dataToCreateATownHall);

            $this->userService->buildInsertTownHallAdmins($data['adminRG'], $data['adminEmail'], $data['adminName'], $townHallPersistance->id);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' de ' . $request->name . ' cadastrada com sucesso',
            ]);



        } catch (\Exception $e) {

            DB::rollBack();

            $request->session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao cadastrar ' . $this->name . ' de ' . $request->name . '. Por favor, contate o administrador do sistema.',
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
            return redirect()->route($this->crudRouteName);
        }
    }

}
