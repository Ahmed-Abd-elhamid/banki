<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'transaction_num' => $this->transaction_num,
            'balance' => $this->type == 'withdraw' ? $this->balance:"- {$this->balance}",
            'type' => $this->type,
        ];

        if($this->type == 'transfer'){
            $response['to_account'] = $this->to_account;
            $response['created_at'] = $this->created_at;
            $response['updated_at'] = $this->updated_at;
        }else{
            $response['created_at'] = $this->created_at;
            $response['updated_at'] = $this->updated_at;
        }


        $full_msg = [
            'status' => true,
            'data' => $response,
            'messages' => 'Transaction description',
            'user' => auth()->user(),
        ];

        return $full_msg;
    }
}
