<?php

namespace App\Helpers;

use App\Models\RoleAccess;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class General
{
    public static function check($allow_roles)
    {
        $user = Auth::user();
        
        return true;

        $role_list = RoleAccess::where('user_id', $user->id)->pluck('role_id');

        foreach ($allow_roles as $ar) {
            /** $ar => allow role */
            foreach ($role_list as $role) {
                Log::info("$ar == $role");
                if ($ar == $role) {
                    return true;
                }
            }
        }
        return false;
        // return false;
    }
}
