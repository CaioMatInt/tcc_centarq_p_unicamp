<?php

namespace App\Http\Controllers;

use App\Services\IbgeApiService;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return array
     */
    public function renderUsersListWithRGAndIdByLikeRG(Request $request)
    {
        $rg = $request->all()['rg'];
        return $this->userService->renderJsonListWithRGAndIdByLikeRG($rg);

    }

}
