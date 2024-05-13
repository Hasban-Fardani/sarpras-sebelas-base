<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserChartController extends Controller
{
    public function __invoke()
    {
        return view('user.chart');
    }
}
