<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
            'balance' => 'required|numeric|min:100|max:100000000',
            'account_id' => 'required|exists:App\Models\Account,id',
            'to_account_id' => 'required|exists:App\Models\Account,id',
        ];
    }
}
