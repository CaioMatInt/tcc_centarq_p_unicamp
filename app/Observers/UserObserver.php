<?php

namespace App\Observers;

use App\Notifications\UserCreatedResetPasswordNotification;
use App\Services\PasswordResetService;
use App\User;


class UserObserver
{

    private $passwordResetService;

    public function __construct(PasswordResetService $passwordResetService)
    {
        $this->passwordResetService = $passwordResetService;
    }

    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        $user->resetLink = $this->passwordResetService->createTokenForPasswordReset($user->email);
        $user->notify(new UserCreatedResetPasswordNotification($user));

    }

}
