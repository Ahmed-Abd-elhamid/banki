<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Rules\ValidBalance;
use App\Rules\ValidAccountNum;
use App\Rules\ValidTransactionType;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!is_null(Auth::user())){
            return true;
        }else{
            return false;       
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(($this->path() == 'transactions/transfer') && ($this->method() == 'POST')){
            for ($current_item = 1; $current_item < ($this->items + 1); $current_item++) {
                return [
                    'balance' => new ValidBalance,
                    'from_account' => new ValidAccountNum,
                    'to_account' => new ValidAccountNum,
                ];
            }
        }elseif(($this->path() == 'transactions/depsoite_withdraw') && ($this->method() == 'POST')){
            for ($current_item = 1; $current_item < ($this->items + 1); $current_item++) {
                return [
                    'balance' => new ValidBalance,
                    'type' => new ValidTransactionType,
                    'my_account' => new ValidAccountNum,
                ];
            }   
        }
    }
}
