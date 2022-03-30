<?php

namespace App\Http\Controllers;

use App\Events\CheckUser;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        if(Auth::attempt($data)) {
            event(new CheckUser(Auth::user()->id));
            if(Auth::user()->role_id == 1) {
                return redirect() ->route("admin-dash");
            } else {
                return redirect() ->route("librarian-dash");
            }

        } else {
            return redirect()->route('login')->with('failed', 'Սխալ մուտքանուն կամ ծածկագիր');
        }
    }

    public function register() {
        $data = [
            'name' => 'John smith',
            'phone' => '+37494454545',
            'avatar' => 'admin.jpg',
            'email' => 'manasyan@mail.ru',
            'password' => Hash::make('1234'),
            'is_verified' => 0,
            'is_blocked' => 0,
            'role_id' => 1,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ];

        User::create($data);
    }

    public function logout() {
        Auth::logout();;
        return redirect()->route('login');
    }
}
