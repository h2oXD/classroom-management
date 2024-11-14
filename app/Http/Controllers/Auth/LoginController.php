<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
        $user = Auth::user();

        // Kiểm tra vai trò của người dùng và điều hướng họ tới dashboard tương ứng
        if ($user->role === '0') {
            return route('admin.dashboard');
        } elseif ($user->role === '2') {
            return route('teacher.dashboard');
        } elseif ($user->role === '1') {
            return route('student.dashboard');
        }

        // Đường dẫn mặc định nếu không có vai trò nào khớp
        return route('home');
    }
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
