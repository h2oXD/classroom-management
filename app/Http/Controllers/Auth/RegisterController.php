<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendWelcomeMail;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function registered(Request $request, $user)
    {
        SendWelcomeMail::dispatch($user);
    }
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
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => Rule::in(['1', '2']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => '1'
            ]);
            // Tạo mã student_code duy nhất
            do {
                $studentCode = fake()->unique()->numerify('SV######');
            } while (Student::where('student_code', $studentCode)->exists());

            Student::create([
                'user_id' => $user->id,
                'student_code' => $studentCode,
            ]);
            return $user;
        });

    }
}
