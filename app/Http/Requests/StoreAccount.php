<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Rules\ValidAccountType;
use App\Rules\ValidCurrency;

class StoreAccount extends FormRequest
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
            'type' => ['required', new ValidAccountType],
            'balance' => 'required|numeric|min:1000|max:1000000000000000000',
            'currency' => ['required', new ValidCurrency],
            'bank_id' => 'required|exists:App\Models\Bank,id',
        ];
    }
}


// 