<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::filter([
                \App\Filters\ByAccount::class,
                \App\Filters\AmountLess::class,
                \App\Filters\AmountMore::class,
                \App\Filters\StartAt::class,
                \App\Filters\EndAt::class,
                \App\Filters\ByDate::class,
                \App\Filters\OrderBy::class,
                ])
            ->get();
        
        return $transactions;
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
            'account_id'   => 'required|exists:customers,id',
            'amount'        => 'required|numeric',
            'description'   => 'nullable',
        ])->validate();
        $account = new Transaction($data);
        $account->type = $data['amount'] > 0 ? 'PAYE' : 'CREDIT';
        $account->save();
        return $account;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return $transaction;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $data = Validator::make($request->toArray(), [
            'account_id'   => 'filled|exists:customers,id',
            'amount'        => 'required|numeric',
            'description'   => 'nullable',
        ])->validate();
        $account = new Transaction($data);
        $account->type = $data['amount'] > 0 ? 'PAYE' : 'CREDIT';
        $account->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    }
}
