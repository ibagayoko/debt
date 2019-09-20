<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function boot() {
        parent::boot();

        self::saved(function($transaction){
            $account = $transaction->account;
            $account->amount += $transaction->amount;
            $account->save();
        });

        self::deleted(function($transaction){
            $account = $transaction->account;
            $account->amount -= $transaction->amount;
            $account->save();
        });

    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
