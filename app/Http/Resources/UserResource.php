<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->token) {
            $response['token'] = $this->token;
            // $response['accounts'] = $this->accounts;
            $response['created_at'] = $this->created_at;
            $response['updated_at'] = $this->updated_at;
        }else{
            // $response['accounts'] = $this->accounts;
            $response['created_at'] = $this->created_at;
            $response['updated_at'] = $this->updated_at;
        }

        $full_msg = [
            'status' => true,
            'data' => $response,
            'messages' => 'User description',
            'user' => auth()->user(),
        ];

        return $full_msg;
    }
}
