<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\UserPasswordReseted;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    // public function list(Request $request)
    // {
    //     $intranetUser = auth()->user();

    //     if (! $intranetUser->hasPermissionTo('users.view-any')) {
    //         throw new AuthorizationException();
    //     }

    //     $request->validate([
    //         'search' => 'required|String|min:3',
    //     ]);

    //     $users = User::where('name', 'LIKE', "%$request->search%")
    //         ->orWhere('email', 'LIKE', "%$request->search%")->get();

    //     return JsonResource::collection($users);
    // }

    public function list()
    {

        //$user = auth()->user();

        // if (! $user) {
        //     throw new AuthorizationException();
        // }

        $users = User::all();

        return $users;
    }

    public function create( Request $request)
    {
        // auth()->user();

        // if (! $user) {
        //     throw new AuthorizationException();
        // }

        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email
        ]);

        $user->password = bcrypt($request->password);

        $user->save();

        return new JsonResource($user);
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
