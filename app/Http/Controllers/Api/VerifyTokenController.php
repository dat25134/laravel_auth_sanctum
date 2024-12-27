<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyTokenController extends Controller
{
    public function verifyToken(Request $request)
    {
        $user = $request->user();
        $userInfo = $user->toArray();
        $role = $user->getRoleNames();
        $permission = $user->getAllPermissions()->pluck('name');
        $userInfo['roles'] = $role;
        $userInfo['permissions'] = $permission;
        return response()->json($userInfo);
    }
}

