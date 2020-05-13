<?php

namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    /**
     * AdministratorService constructor.
     * @param TownHallRepository $TownHallRepository
     */
    public function __construct()
    {
        //
    }

    public function uploadTownHallImage($imageObject, $cityId)
    {
        try {
            $imageExtension   = $imageObject->getClientOriginalExtension();
            $imageName = 'town_hall_' . $cityId . '.' .  $imageExtension;
            $imageObject->storeAs('public/images/town_hall_images/', $imageName);

            return 'images/town_hall_images/' . $imageName;

        }catch(\Exception $e){

            throw new \Exception('Failed to upload image, error: ' .  $e);
        }

    }

}
