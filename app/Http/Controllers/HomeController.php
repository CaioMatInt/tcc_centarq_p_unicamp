<?php

namespace App\Http\Controllers;

use App\Services\ComplaintService;
use App\Services\ConductionPointService;
use App\Services\MedicalAppointmentService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $complaintService;
    private $userService;
    private $medicalAppointmentService;
    private $conductionPointService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ComplaintService $complaintService, UserService $userService, MedicalAppointmentService $medicalAppointmentService,
                                ConductionPointService $conductionPointService)
    {
        $this->middleware('auth');
        $this->complaintService = $complaintService;
        $this->userService = $userService;
        $this->medicalAppointmentService = $medicalAppointmentService;
        $this->conductionPointService = $conductionPointService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'totalOfComplaints' => $this->complaintService->renderTotal(),
            'totalOfUsers' => $this->userService->renderTotal(),
            'totalOfMedicalAppointments' => $this->medicalAppointmentService->renderTotal(),
            'totalOfConductionPoints' => $this->conductionPointService->renderTotal(),
            'lastMedicalAppointments' => $this->medicalAppointmentService->renderListWithANumberOfAppointmentsWithRelatioships(3, ['user', 'createdByUser', 'healthUnit'])
        ];

        return view('dashboard', $data);

    }
}
