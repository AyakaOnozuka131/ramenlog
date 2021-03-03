<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $username = Auth::user()->name;
        $user = User::where('name', $username)->first();
        $reviews = $user->reviews->sortByDesc('created_at');

        return view('users.show',['user'=>$user,'reviews'=>$reviews]);
    }


}
