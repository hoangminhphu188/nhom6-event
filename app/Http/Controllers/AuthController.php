<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:255',
            'password' => 'required|min:6',
        ]);

        $username = $request->get('username');
        $password = $request->get('password');
        try {
            $user = Admin::where('username', $username)->firstOrFail();

            if (Hash::check($password, $user->password)) {
                $request->session()->put('admin', $user);
                return redirect()->route('admin.events.index');
            } else {
                return redirect()->back()->withErrors(['password' => 'Incorrect password'])->withInput();
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors('Username or password is incorrect!')->withInput();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
