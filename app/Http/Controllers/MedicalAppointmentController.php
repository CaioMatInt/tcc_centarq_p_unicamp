<?php

namespace App\Http\Controllers;

use App\Repositories\ComplaintRepository;
use App\Services\ComplaintService;
use App\Services\ConductionPointService;
use App\Services\HealthUnitService;
use App\Services\MedicalAppointmentService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MedicalAppointmentController extends Controller
{
    private $medicalAppointmentService;
    private $healthUnitsService;
    private $complaintsService;
    private $conductionPointService;

    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Consultas';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Consulta';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'medicalAppointment';
    public $crudRouteName = 'consultas';

    public function __construct(MedicalAppointmentService $medicalAppointmentService, HealthUnitService $healthUnitsService, ComplaintService $complaintsService
        , ConductionPointService $conductionPointService)
    {
        $this->medicalAppointmentService = $medicalAppointmentService;
        $this->healthUnitsService = $healthUnitsService;
        $this->complaintsService = $complaintsService;
        $this->conductionPointService = $conductionPointService;
    }


    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'resources' => $this->medicalAppointmentService->renderListWithRelationships(['user', 'healthUnit']),
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
            'pluralName' => $this->pluralName,
            'healthUnitsArray' => $this->healthUnitsService->renderArrayForSelectInputWithOnlyNameAndID(),
            'complaintsArray' => $this->complaintsService->renderArrayForSelectInputWithOnlyNameAndID(),
            'conductionPointsArray' => $this->conductionPointService->renderArrayForSelectInputWithOnlyNameAndID(),

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

            $this->medicalAppointmentService->buildInsert($data);


            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' cadastrada com sucesso',
            ]);



        } catch (\Exception $e) {

            DB::rollBack();

            $request->session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao cadastrar ' . $this->name . '. Por favor, contate o administrador do sistema.',
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
            'resource' => $this->medicalAppointmentService->renderEditWithRelationships($id, ['user']),
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName,
            'healthUnitsArray' => $this->healthUnitsService->renderArrayForSelectInputWithOnlyNameAndID(),
            'complaintsArray' => $this->complaintsService->renderArrayForSelectInputWithOnlyNameAndID(),
            'selectedComplaintsArray' => $this->complaintsService->renderRelatedConductionPointsIdsArrayRelatedToAMedicalAppointment($id),
            'conductionPointsArray' => $this->conductionPointService->renderArrayForSelectInputWithOnlyNameAndID(),
            'selectedConductionPointsArray' => $this->conductionPointService->renderRelatedConductionPointsIdsArrayRelatedToAMedicalAppointment($id),
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
            $this->medicalAppointmentService->buildUpdate($id, $data);

            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' atualizada com sucesso',
            ]);


        } catch (\Exception $e) {

            $request->session()->flash('msg', [
                'type' => 'error',
                'text' => 'Erro ao atualizar ' . $this->name,
            ]);
        } finally {
            return redirect()->route($this->crudRouteName . '.index');
        }

    }


    /**
     * @return void
     */
    public function show($id)
    {
        $data = [
            'pageTitle' => 'Visualizar ' . $this->name,
            'resource' => $this->medicalAppointmentService->renderEditWithRelationships($id, ['user', 'medicalAppointmentComplaints', 'medicalAppointmentConductionPoints', 'healthUnit']),
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName,
        ];

        return view('dashboard.' . $this->crudFolder . '.show', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            $this->medicalAppointmentService->buildDelete($id);

            session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' removida com sucesso',
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
