<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class TransferStore extends FormRequest
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
        return [
        //     'balance' => 'required|numeric|min:100|max:100000000',
        //     'account_id' => 'required|exists:App\Models\Account,id',
        //     'to_account_id' => 'required|exists:App\Models\Account,id',
        ];
    }

    public function validate_request($request){
        if ( $request->items > 0){
            for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {
                if( ($request->input('from_account'.$current_item) == null) || ($request->input('to_account'.$current_item) == null) || ($request->input('balance'.$current_item) == null)){ return false;}
    
                if ( $this->check_account_numbers($request->input('from_account'.$current_item), $request->input('to_account'.$current_item)) ){ return false;}
            }
            return true;
        }else{
            return true;
        }
    }

    private function check_account_numbers($from_account, $to_account){
       if ( empty(Account::firstWhere('account_num', $from_account)) || empty(Account::firstWhere('account_num', $to_account)) ){
           return true;
       } else {
            return false;
       }
    }
}
