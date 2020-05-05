<?php

namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\Http;

class IbgeApiService
{
    /**
     * AdministratorService constructor.
     * @param TownHallRepository $TownHallRepository
     */
    public function __construct()
    {
        //
    }

    /**
     * @return mixed
     */
    public function renderListOfCitiesByIbgeStateId($ibge_state_id)
    {
        return [1 => 'Campinas'];
        try {
            $ibgeCitiesArray =  Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' . $ibge_state_id . '/municipios')->json();
            $rearrengedIbgeCitiesArray = [];
            foreach($ibgeCitiesArray as $ibgeCity){
                $rearrengedIbgeCitiesArray[$ibgeCity['id']] = $ibgeCity['nome'];
            }

            return $rearrengedIbgeCitiesArray;

        }catch(\Exception $e){
            throw new \Error('Erro ao consultar serviço de API do IBGE');
        }

    }

}
