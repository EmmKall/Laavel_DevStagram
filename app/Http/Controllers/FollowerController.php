<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store( User $user )
    {
        $user->followers()->attach([ auth()->user()->id ]);

        return back();
    }

    public function destroy( User $user, Follower $follower )
    {
        $user->followers()->detach([ auth()->user()->id ]);

        return back();
    }

}
