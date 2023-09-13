<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Notifications\UserPasswordReseted;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardController extends Controller
{
    public function create(Request $request)
    {
        //$user = auth()->user();

        // if (! $user) {
        //     throw new AuthorizationException();
        // }

        // $card = new Card([
        //     'user_id' => $request->user_id
        // ]);
        $card = new Card([
            'user_id' => $request->user
        ]);
        $card->save();

        return $card;
    }    
    
     public function list()
     {
        //  $user = auth()->user();

        //   if (! $user) {
        //       throw new AuthorizationException();
        //   }

         $card = Card::all();         

         return $card;
     }

    public function get(Request $request, $id)
    {
        //$intranetUser = auth()->user();

        // if (! $intranetUser->hasPermissionTo('users.view-any')) {
        //     throw new AuthorizationException();
        // }

        $builder = Card::query();

        if ($request->with){
            $this->addRelations($builder, $request, ['months']);
        }

        // return new JsonResource($builder->findOrFail($id));

        return $builder->findOrFail($id);
        // $card = Card::findOrFail($id);
        // return $card;
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

    protected function addRelations(Builder $builder, Request $request, array $allowed)
    {
        if ($request->query('with') !== null) {
            $relations = explode(',', $request->query('with'));
            $safeRelations = array_intersect($allowed, $relations);
            $builder->with($safeRelations);
        }
    }
}

