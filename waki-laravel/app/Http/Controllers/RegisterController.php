<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('page.auth.register');
    }

    public function store(UserRequest $request)
    {
        $request["password"] = Hash::make($request->password);
        User::create($request->all());

        return back()->with('status_success', 'Register Success, Login and make good things !  ');
    }
}
