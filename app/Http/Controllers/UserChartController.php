<?php

namespace App\Http\Controllers;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class UserChartController extends Controller
{
    public function __invoke()
    {
        $roles = User::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->pluck('total', 'role')->all();

        $chart = (new LarapexChart)
            ->setType('pie')
            ->setTitle('Chart Role')
            ->setLabels(array_keys($roles))
            ->setSubtitle('2023 - 2024')
            ->setDataset(array_values($roles))
            ->setFontFamily('Sans serif');

        return view('user.chart', compact('chart'));
    }
}
