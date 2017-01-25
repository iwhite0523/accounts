<?php

namespace App\Http\Controllers\Periods\Charts;

use App\Http\Controllers\Controller;
use App\Model\Period;

use ConsoleTVs\Charts\Facades\Charts;

class ChartsController extends Controller
{
    public function index(Period $period)
    {
        $periodMercurialChartVars = $period->getMercurialChartVars();

        $period->setAmounts();

        $chart = Charts::create('pie', 'highcharts')
//            ->view('custom.line.chart.view') // Use this if you want to use your own template
            ->title($period->title . ' || $' . $period->getMercurialAmount())
            ->labels($periodMercurialChartVars->pluck('title')->toArray())
            ->values($periodMercurialChartVars->pluck('balance')->toArray())
            ->dimensions(500,500)
            ->responsive(true);
        return view('periods.charts.index', compact('chart'));
    }
}
