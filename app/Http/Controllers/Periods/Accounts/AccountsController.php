<?php

namespace App\Http\Controllers\Periods\Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Period;
use App\Model\Account;

class AccountsController extends Controller
{
    public function store(Request $request, Period $period)
    {
        if ($request->title == '') {
            throw new NotFoundHttpException('You suck at naming things.');
        }

        $account = new Account(['title' => $request->title, 'balance' => $request->balance, 'category' => $request->category]);
        $account->setUser(1);

        $period->addAccount($account);

        return back();
    }

    public function index(Period $period, Account $account)
    {
        return view('periods.accounts.index', compact('account'));
    }

    public function edit(Request $request, Period $period, Account $account)
    {
        $account->setTitle($request->title);
        $account->setBalance($request->balance);
        $account->save();

        $period->setAmount();
        return view('periods.show', compact('period'));
    }

    public function destroy(Period $period, Account $account)
    {
        $account->delete($account);
        return redirect()->route('periods.periodId', ['period' => $period->id]);
    }

}
