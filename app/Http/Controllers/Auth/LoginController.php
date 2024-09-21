<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('kaprodi')) {
            return redirect()->route('dashboard.kaprodi');
        } else if ($user->hasRole('superadmin')) {
            return redirect()->route('dashboard.superadmin');
        } else if ($user->hasRole('dosen')) {
            $dosen = $user->dosen;
            
            if ($dosen->kelas_id) {
                return redirect()->route('dashboard.dosen.wali_kelas');
            } else {
                return redirect()->route('dashboard.dosen');
            }
        } else if ($user->hasRole('mahasiswa')) {
            return redirect()->route('dashboard.mahasiswa');
        }
        return redirect('/home');
    }
}
