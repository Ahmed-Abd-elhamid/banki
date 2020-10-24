<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferTransaction extends Model
{
    use HasFactory;

    protected $table = "transfer_transactions";

    protected $fillable = ['account_id', 'transaction_id'];

    protected $guarded = [];

    public function account(){
        return $this->belongsTo('App\Models\Account');
    }

    public function transaction(){
        return $this->belongsTo('App\Models\Transaction');
    }
}
