<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::filter([
            \App\Filters\ByCustomer::class,
            \App\Filters\AmountLess::class,
            \App\Filters\AmountMore::class,
            \App\Filters\StartAt::class,
            \App\Filters\EndAt::class,
            \App\Filters\ByDate::class,
            \App\Filters\OrderBy::class,
            ])
        ->with('customer')
        ->get();
        
        return $accounts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->toArray(), [
            'customer_id'   => 'required|exists:customers,id',
            'amount'        => 'nullable|numeric',
            'description'   => 'nullable',
        ])->validate();
        $account = new Account($data);
        $account->save();
        return $account;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $account->load('customer');
        return $account;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $data = Validator::make($request->toArray(), [
            'customer_id'   => 'filled|exists:customers,id',
            'amount'        => 'nullable|numeric',
            'description'   => 'nullable',
        ])->validate();
        $account->update($data);
        //array_merge($data, [ 'updated_at'=> Date::now()]));

        return $account;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
    }
}
