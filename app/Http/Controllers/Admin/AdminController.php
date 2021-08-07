<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Traits\GeneralTrait;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    //use AuthenticatesUsers;
    use GeneralTrait;




    public function getlogin()
    {
        return view('Admin.Login');
    }
    public function getDashboard()
    {
        return view('Admin.Dashboard');
    }
    public function getData()
    {
        $Datas = Admin::select()->paginate(4);
        return view('Admin.Dashboard', compact('Datas'));
    }

    public function delete()
    {
        Admin::getQuery()->delete();

    }

    public function checkLogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('Admin.getData');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}





}
