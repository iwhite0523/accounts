<?php

namespace App\Http\Controllers\Periods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Period;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PeriodsController extends Controller
{
    public function index()
    {
        $periods = Period::all();

        return view('periods.index', compact('periods'));
    }

    public function show(Period $period)
    {
        $period->setAmount();
        return view('periods.show', compact('period'));
    }

    public function store(Request $request)
    {
        if ($request->title == '') {
            throw new NotFoundHttpException('You suck at naming things.');
        }

        $period = new Period(['title' => $request->title, 'period_start' => new \DateTime($request->periodStart)]);
        $period->setUser(1);
        $period->save();

        return back();
    }

    public function destroy(Period $period)
    {
        $period->delete();
        return back();
    }
}
