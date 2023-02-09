<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $valid = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if ($valid != NULL) {
            $time = Carbon::now()->timezone('Asia/Phnom_Penh');
            $times = explode(' ', $time);
            $admin = new Admin();
            $admin->username = $valid['username'];
            $admin->password = $times[1] + $valid['password'] + $times[0];
            $admin->created_at = $time;
            $admin->updated_at = $time;
            $admin->save();
        }
    }

    public function login(Request $request)
    {
        $valid = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if ($valid != null) {
            $admin = Admin::where('username', $valid['username']);
            $times = explode(' ', $admin->created_at);
            if (Hash::check($admin->password, ($times[1] + $valid['password'] + $times[0]))) {
                $request->session()->get('admin_session');

                return redirect('/dashboard');
            }
        }
    }
}
