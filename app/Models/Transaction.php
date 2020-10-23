<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = ['transaction_num', 'type', 'money_in', 'money_out', 'transfer_from'];

    protected $guarded = [];

    public function account_transactions(){
        return $this->hasMany('App\Models\AccountTransaction');
    }

    public function accounts(){
        return $this->belongsToMany('App\Models\Account', 'account_transactions');
    }

    protected static function booted()
    {
        static::created(function ($transaction) {
            //
        });

        static::creating(function ($transaction) {
            $transaction->transaction_num = Transaction::generate_unique_num();
            // die($transaction);
        });

        static::updated(function ($transaction) {
            //
        });

        static::updating(function ($transaction) {
            //
        });
    }

    public static function generate_unique_num(){
        $transaction_num = mt_rand(100000000000, 999999999999);
        while ( !empty(Transaction::firstWhere('transaction_num', $transaction_num)) ){
            $transaction_num = mt_rand(100000000000, 999999999999);
        }
        return $transaction_num;
    }
}
