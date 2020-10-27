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
        return $this->belongsTo('App\Models\Account', 'account_id');
    }

    public function to_account(){
        if($this->type == 'transfer'){
            return $this->belongsTo('App\Models\Account', 'to_account_id');
        }else{
            return null;
        }
    }

    public function can_delete(){
        $diff = now()->diff($this->created_at);        
        $hours = $diff->h + ($diff->days*24);
        
        if( $hours >= 24){
            return false;
        }else{
            return true;
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

    public static function convert_currency($amount,$from_currency,$to_currency){
        $apikey = '79e2e2bb7b26da35810938dc';
      
        $from_Currency = urlencode($from_currency);
      
        $json = file_get_contents("https://v6.exchangerate-api.com/v6/{$apikey}/latest/{$from_Currency}");
        $obj = json_decode($json, true);
        
        $val = floatval($obj["conversion_rates"]["$to_currency"]);
        
        $total = $amount / $val;
        return $total;
    }
}
