<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Classroom;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    const PATH_VIEW_ADMIN = 'admins.';
    public function dashboard()
    {
        return view(self::PATH_VIEW_ADMIN . __FUNCTION__);
    }
    

}
