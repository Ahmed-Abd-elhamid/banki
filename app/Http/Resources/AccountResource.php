<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'account_num' => $this->account_num,
            'balance' => $this->balance,
            'type' => $this->type,
            'currency' => $this->currency,
            'user' => $this->user,
            'user' => $this->user,
            'transactions' => $this->transactions,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        $full_msg = [
            'status' => true,
            'data' => $response,
            'messages' => 'Account description',
            'user' => auth()->user(),
        ];

        return $full_msg;
    }
}
