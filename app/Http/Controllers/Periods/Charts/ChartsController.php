<?php

namespace App\Http\Controllers\Periods\Charts;

use App\Http\Controllers\Controller;
use App\Model\Period;

use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function index(Request $request, Period $period)
    {
        $accounts = $period->accounts->all();
        $titles = [];
        $balances = [];

        foreach ($accounts as $account) {
            if ($account['category'] == 1 ||
                $account['category'] >= 4) continue;
            $titles[] = $account['title'];
            $balances[] = abs($account['balance']);
        }

        $period->setAmounts();

        $chart = Charts::create('pie', 'highcharts')
//            ->view('custom.line.chart.view') // Use this if you want to use your own template
            ->title($period->title . ' - $' . $period->getMercurialAmount())
            ->labels($titles)
            ->values($balances)
            ->dimensions(500,500)
            ->responsive(true);
        return view('periods.charts.index', compact('chart'));
    }
}
