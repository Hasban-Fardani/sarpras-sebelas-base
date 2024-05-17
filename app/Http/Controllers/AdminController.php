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
            $users->whereAny(['nama', 'role', 'email'], 'like', '%' . request('search') . '%');
        }

        return view('admin', [
            'users' => $users->get(),
            'users' => $users->paginate(5)
        ]);
    }
}
