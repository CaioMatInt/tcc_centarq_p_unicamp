<?php

namespace App\Http\Controllers;

use App\Services\TownHallService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TownHallController extends Controller
{
    private $townHallService;
    public $plural_name = 'Prefeituras';
    public $name = 'Prefeitura';

    public function __construct(TownHallService $townHallService)
    {
        $this->townHallService = $townHallService;
    }


    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'resources' => $this->townHallService->renderList(),
            'pageTitle' => 'Cadastro de ' . $this->plural_name

        ];

        return view('dashboard.townHall.index', $data);
    }

    /**
     * @return void
     */
    public function create()
    {
        $data = [
            'pageTitle' => 'Criar nova ' . $this->name
        ];

        return view('dashboard.townHall.create', $data);
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
                'text' => $this->name . ' ' . $request->name . ' cadastrada com sucesso',
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
        $data = $this->townHallService->renderEdit($id);

        return view('dashboard.townHall.edit', $data);
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

            \Log::error($e->getFile() . "\n" . $e->getLine() . "\n" . $e->getMessage());

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

            \Log::error($e->getFile() . "\n" . $e->getLine() . "\n" . $e->getMessage());

            session()->flash('msg', [
                'type' => 'danger',
                'text' => 'Erro ao remover ' . $this->name,
            ]);
        } finally {
            return redirect()->route('prefeituras');
        }
    }

}
