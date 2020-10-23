<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = "accounts";

    protected $fillable = ['account_num', 'balance', 'type', 'currency', 'bank_id', 'user_id'];

    protected $guarded = [];

    protected $attributes = [
        'is_active' => true,
    ];

    public function bank(){
        $this->hasOne('App\Models\Bank');
    }

    public function user(){
        $this->hasOne('App\Models\User');
    }

    protected static function booted()
    {
        static::created(function ($account) {
            //
        });

        static::creating(function ($account) {
            $account->account_num = Account::generate_unique_num();
            // die($account);
        });

        static::updated(function ($account) {
            //
        });

        static::updating(function ($account) {
            //
        });
    }

    public static function generate_unique_num(){
        $account_num = mt_rand(100000000000, 999999999999);
        while ( !empty(Account::firstWhere('account_num', $account_num)) ){
            $account_num = mt_rand(100000000000, 999999999999);
            echo "hell";
        }
        return $account_num;
    }
}
