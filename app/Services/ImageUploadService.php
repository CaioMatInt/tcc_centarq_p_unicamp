<?php

namespace App\Services;

use Carbon\Carbon;
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

            $imageExtension   = $imageObject->getClientOriginalExtension();

            $imageName = 'user_' . $userId . '_' . Carbon::now()->format('d_m_y') . '.' .  $imageExtension;
            $tempImagePath = 'images/user_temporary_images/' . $imageName;
            $storagePath = '/public/images/user_images/' . $imageName;

            $resizedImage = Image::make($imageObject)->fit(100);
            $tempImagePath = public_path($tempImagePath);

            /*Fix mobile flipping of the photo*/
            $resizedImage->orientate();
            $resizedImage->save($tempImagePath);

            Storage::put($storagePath, $resizedImage->__toString());

            unlink($tempImagePath);

            return 'storage/images/user_images/' . $imageName;


    }

}
