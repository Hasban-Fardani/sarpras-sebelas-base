<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $users = User::latest();

        if(request('search')) {
            // dd(request('search'));
            $users->whereAny(['name', 'role', 'email'], 'like', '%' . request('search') . '%');
        }

        return view('admin', [
            'users' => $users->get()
        ]);
    }
}
