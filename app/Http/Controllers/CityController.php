<?php

namespace App\Http\Controllers;

use App\Services\IbgeApiService;
use App\Services\CityService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    private $cityService;
    /* Name of this CRUD, in plural */
    public $plural_name = 'Cidades';
    /* Name of this CRUD*/
    public $name = 'Cidade';
    /* Name of the this CRUD folder, in resources, used along this class in "return views" */
    public $crudFolder = 'townhall';

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }


    /**
     * @return void
     */
    public function index()
    {

        $data = [
            'resources' => $this->cityService->renderList(),
            'pageTitle' => 'Cadastro de ' . $this->plural_name

        ];

        return view('dashboard.' . $this->crudFolder . '.index', $data);
    }
    
}
