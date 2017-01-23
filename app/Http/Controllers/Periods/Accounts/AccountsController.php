<?php

namespace App\Http\Controllers\Periods\Accounts;

use App\AccountNameEnum;
use App\CategoryEnum;
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

        $var = AccountNameEnum::all()->get($request->title - 1);

        $account = new Account([
            'title' => $var->name,
            'balance' => $request->balance,
            'category' => $var->category_enum_id
        ]);

        $account->setUser(1);

        $period->addAccount($account);

        return back();
    }

    public function index(Period $period, Account $account)
    {
        $accountCategories = AccountNameEnum::all();
        return view('periods.accounts.index', compact('account', 'accountCategories'));
    }

    public function edit(Request $request, Period $period, Account $account)
    {
        $accountCategories = AccountNameEnum::all();

        $var = $accountCategories->get($request->title - 1);
        $account->setTitle($var->name);
        $account->setBalance($request->balance);
        $account->category = $var->category_enum_id;

        $account->save();

        $period->setAmounts();
        return redirect()->route('periods.periodId', ['period' => $period->id]);
    }

    public function destroy(Period $period, Account $account)
    {
        $account->delete($account);
        return redirect()->route('periods.periodId', ['period' => $period->id]);
    }

}
