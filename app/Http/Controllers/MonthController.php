<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Month;
use App\Notifications\UserPasswordReseted;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthController extends Controller
{
    public function list()
    {
        //$user = auth()->user();

        // if (! $user) {
        //     throw new AuthorizationException();
        // }

        $months = Month::all();

        return $months;
    }

    public function get($id)
    {
        //$intranetUser = auth()->user();

        // if (! $intranetUser->hasPermissionTo('users.view-any')) {
        //     throw new AuthorizationException();
        // }

        $user = User::findOrFail($id);

        return $user;
    }

    public function update(Request $request, $id)
    {
        
        $user = User::findOrFail($id);

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        $user->save();

        return $user;
    }

    public function delete( $id)
    {
        
        $user = User::findOrFail($id);

        $user->delete();

        return $user;
    }

    // public function resetPassword($id)
    // {
    //     $intranetUser = auth()->user();
    //     if (! $intranetUser->hasPermissionTo('users.update-any')) {
    //         throw new AuthorizationException();
    //     }

    //     $tempPassword = $this->generateCode(6);

    //     $user = User::findOrFail($id);
    //     $user->password = bcrypt($tempPassword);
    //     $user->save();
    //     $user->notify(new UserPasswordReseted($user->name, $user->email, $tempPassword));

    //     return new JsonResource($user);
    // }

    // protected function generateCode($length = 6)
    // {
    //     $code = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $code .= random_int(0, 9);
    //     }

    //     return $code;
    // }
}
