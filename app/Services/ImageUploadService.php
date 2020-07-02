<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{

    public function __construct()
    {
        //
    }

    public function uploadUserImage($imageObject, $userId)
    {
        try {
            $imageExtension   = $imageObject->getClientOriginalExtension();
            $imageName = 'user_' . $userId . '.' .  $imageExtension;
            $imageObject->storeAs('public/images/user_images/', $imageName);

            return 'images/user_images/' . $imageName;

        }catch(\Exception $e){

            throw new \Exception('Failed to upload image, error: ' .  $e);
        }

    }

}
