<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');
        $this->middleware('checkRole');
    }

    public function index()
    {
        return view('admin.dashboard',[
            'admins' => User::where('role', 1)->get(),
            'customers' => User::where('role', 0)->get(),
        ]);
    }

    public function promote($id)
    {
        User::findOrFail($id)->update([
            'role' => 1
        ]);

        return back()->withSuccess('User promoted to Admin');
    }

    public function demote($id)
    {
        if($id == 1)
        {
            return back()->withErrors('The main Admin cannot be demoted');
        }
        User::findOrFail($id)->update([
            'role' => 0
        ]);

        return back()->withSuccess('Admin demoted to User');
    }
}
