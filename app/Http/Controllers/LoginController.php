<?php

namespace App\Http\Controllers;

use App\Models\Asisten;
use App\Models\Caas;
use Illuminate\Http\Request;
use URL;

class LoginController extends Controller
{
    public function index()
    {
        if (session('loginStatus') == true and session('status') == 'asisten') {
            return redirect(route('asisten_lihat_nilai'));
        } elseif (session('loginStatus') == true and session('status') == 'caas') {
            return redirect(route('caas_lihat_nilai_by_id', session('0')->nim));
//            return redirect(route('caas_lihat_nilai'));
        } else {
            return view('landing');
        }
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if (Asisten::isExisted($username)) {
            if (Asisten::isValidated($username, $password)) {
                $user = Asisten::where('username', $username)->get();
                session()->put($user->all());
                session()->put(['loginStatus' => true]);
                session()->put(['status' => 'asisten']);
                return redirect(URL::previous());
            } else {
                return redirect('/');
            }
        } elseif (Caas::isExisted($username)) {
            if (Caas::isValidated($username, $password)) {
                $user = Caas::where('nim', $username)->get();
                session()->put($user->all());
                session()->put(['loginStatus' => true]);
                session()->put(['status' => 'caas']);
                return redirect(URL::previous());
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(URL::previous());
    }
}
