<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;


class DepositeWithDrawStore extends FormRequest
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

        ];
    }


    public function validate_request($request){
        if ( $request->items > 0){
            for ($current_item = 1; $current_item < ($request->items + 1); $current_item++) {
                if( ($request->input('my_account'.$current_item) == null) || ($request->input('type'.$current_item) == null) || ($request->input('balance'.$current_item) == null)){ return false;}
    
                if ( $this->check_account_numbers($request->input('my_account'.$current_item)) ){ return false;}

                if ( $this->check_type($request->input('type'.$current_item)) ){ return false;}
            }
            return true;
        }else{
            return true;
        }
    }

    private function check_account_numbers($my_account){
       if ( empty(Account::firstWhere('account_num', $my_account)) ){
           return true;
       } else {
            return false;
       }
    }

    private function check_type($type){
        if ( in_array(strtoupper($type), ['depostie', 'withdraw']) ){
            return true;
        } else {
             return false;
        }
    }
}
