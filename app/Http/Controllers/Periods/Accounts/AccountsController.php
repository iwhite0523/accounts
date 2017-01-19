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
      $account = new Account(['title' => $request->title, 'balance' => $request->balance]);
      $account->setUser(1);

      $period->addAccount($account);

      return back();
    }

    public function edit(Period $period, Account $account)
    {
        return back();
    }

    public function destroy(Period $period, Account $account)
    {
        $account->delete($account);
        return back();
    }

}
