<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = ['transaction_num', 'type'];

    protected $guarded = [];

    public function account(){
        return $this->belongsTo('App\Models\Account');
    }

    public function transactions(){
        if($this->type == 'deposite_withdraw'){
            return $this->hasMany('App\Models\DepositeWithdrawTransaction');
        }elseif($this->type == 'transfer'){
            return $this->hasMany('App\Models\TransferTransaction');
        }
    }

    public function accounts(){
        if($this->type == 'deposite_withdraw'){
            return $this->belongsToMany('App\Models\Account', 'App\Models\DepositeWithdrawTransaction');
        }elseif($this->type == 'transfer'){
            return $this->belongsToMany('App\Models\Account', 'App\Models\TransferTransaction');
        }
    }

    protected static function booted()
    {
        static::created(function ($transaction) {
            //
        });

        static::creating(function ($transaction) {
            $transaction->transaction_num = Transaction::generate_unique_num();
        });

        static::updated(function ($transaction) {
            //
        });

        static::updating(function ($transaction) {
            //
        });
    }

    public static function generate_unique_num(){
        $transaction_num = (string)mt_rand(100000000000, 999999999999);
        while ( !empty(Transaction::firstWhere('transaction_num', $transaction_num)) ){
            $transaction_num = (string)mt_rand(100000000000, 999999999999);
        }
        return $transaction_num;
    }
}
