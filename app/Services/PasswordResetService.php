<?php

namespace App\Services;

use App\Notifications\UserRegisteredNotification;
use App\Repositories\PasswordResetRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PasswordResetService extends EloquentService
{

    private $passwordResetRepository;

    /**
     * PasswordResetService constructor.
     * @param passwordResetRepository $passwordResetRepository
     */
    public function __construct(PasswordResetRepository $passwordResetRepository)
    {
        $this->passwordResetRepository = $passwordResetRepository;
        parent::__construct($passwordResetRepository);
    }

    /**
     * @param $data
     * @return String URL for password resetting
     */
    public function createTokenForPasswordReset($email)
    {
        $token = Str::random(60);

        $dataToInsert['email'] = $email;
        $dataToInsert['token'] =  bcrypt($token);
        $dataToInsert['created_at'] =  Carbon::now();

        $this->passwordResetRepository->create($dataToInsert);

        return url('/') . '/password/reset/' . $token . '?email=' . urlencode($email);

    }

}
