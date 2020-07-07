<?php

namespace App\Http\Controllers;

use App\Services\GenderService;
use App\Services\UserService;
use App\Services\UserTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    private $userService;
    private $genderService;
    private $userTypeService;
    /* Name of this CRUD in Portuguese and in plural */
    public $pluralName = 'Usuários';
    /* Name of this CRUD in Portuguese*/
    public $name = 'Usuário';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'user';
    public $crudRouteName = 'usuarios';

    public function __construct(UserService $userService, UserTypeService $userTypeService, GenderService $genderService)
    {
        $this->userService = $userService;
        $this->userTypeService = $userTypeService;
        $this->genderService = $genderService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->userService->renderList(),
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
            'userTypesArray' => $this->userTypeService->renderArrayForSelectInputWithOnlyNameAndID(),
            'gendersArray' => $this->genderService->renderArrayForSelectInputWithOnlyNameAndID()
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

            $this->userService->buildInsert($data);


            $request->session()->flash('msg', [
                'type' => 'success',
                'text' => $this->name . ' "' . $request->name . '" cadastrada com sucesso',
            ]);



        } catch (\Exception $e) {
        dd($e);
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
            'resource' => $this->userService->renderEdit($id),
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
            $this->userService->buildUpdate($id, $data);

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
            $this->userService->buildDelete($id);

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


    /**
     * @return array
     */
    public function renderUsersListWithRGAndIdByLikeName(Request $request)
    {
        $name = $request->all()['name'];
        return $this->userService->renderJsonListWithRGAndIdByLikeName($name);

    }



    /**
     * @return void
     */
    public function showHistoryOfMedicalAppointmensByUserId($id)
    {

        $data = [
            'pageTitle' => 'Visualizar histórico de consultas ',
            'resources' => $this->userService->renderHistoryOfMedicalAppointmensByUserId($id),
            'crudRouteName' => $this->crudRouteName,
            'pluralName' => $this->pluralName,
        ];

        return view('dashboard.' . $this->crudFolder . '.historyOfMedicalAppointments', $data);
    }


}
