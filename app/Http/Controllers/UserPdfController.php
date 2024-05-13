<?php

namespace App\Http\Controllers;

use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class UserPdfController extends Controller
{
    public function __invoke()
    {

        $users = User::get();

        $data = [
            'title' => 'PDF for model User',
            'date' => date('d/m/y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('user.pdf', $data);

        return $pdf->download('users.pdf');
    }
}
