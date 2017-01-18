<?php

namespace App\Http\Controllers\Periods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Period;

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
      $period = new Period(['title' => $request->title]);
      $period->setUser(1);
      $period->save();

      return back();
    }
}
