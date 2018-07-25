<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SubcompanyResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'id' => $this->s_company_id,
            'name' => $this->s_company_name,
            'feedbackday' => $this->s_avg_feedback_day,
            'email' => $this->s_company_email,
            'address' => $this->s_company_address,
            'pin' => $this->s_company_pin,
            'city' => $this->s_company_city,
            'state_id' => $this->state->state_id,
            'state' => $this->state->state_name,
            'country_id' => $this->country->country_id,
            'country' => $this->country->country_name,
            'gstinno' => $this->s_company_GSTIN,
        ];
    }

    public function with($request)
    {
        if(empty($this))
        {
            $message = "query is not successfull";
        }
        else
        {
            $message = "query is successfull";
        }
        return[
            "ver" => '1.0.0',
            "message" => $message
        ];
    }
}
