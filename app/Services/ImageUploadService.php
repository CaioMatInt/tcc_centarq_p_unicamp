<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            $tempImagePath = 'images/user_temporary_images/' . $imageName;
            $storagePath = '/public/images/user_images/' . $imageName;

            $resizedImage = Image::make($imageObject)->fit(100);
            $tempImagePath = public_path($tempImagePath);
            $resizedImage->save($tempImagePath);

            Storage::put($storagePath, $resizedImage->__toString());

            unlink($tempImagePath);

            return 'storage/images/user_images/' . $imageName;


        }catch(\Exception $e){

            throw new \Exception('Failed to upload image, error: ' .  $e);
        }

    }

}
