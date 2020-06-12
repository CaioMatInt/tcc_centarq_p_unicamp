<?php


namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\Http;

class ObjectArrayManipulationService
{

    public function __construct()
    {
        //
    }


    public function arrangeObjectToSelectInputComponent($objectToRearrenge, $idField, $idOptionText){

        $rearrengedArray = [];

        foreach($objectToRearrenge as $objectToRearrengeElement){
            $rearrengedArray[$objectToRearrengeElement->$idField] = $objectToRearrengeElement->$idOptionText;
        }


        return $rearrengedArray;
    }

}
