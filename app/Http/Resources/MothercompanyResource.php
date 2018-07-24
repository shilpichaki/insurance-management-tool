<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Response;

class MothercompanyResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // if(empty($request))
        // {
        //     $status = 0;
        // }
        // else
        // {
        //     $status = 1;
        // }

        // $response = array('data' => $request,'status' => $status);
        // return $response;


        // return response()->json('data' => [
        //     'id' => $this->m_company_id,
        //     'name' => $this->m_company_name,
        //     'feedbackday' => $this->m_avg_feedback_day,
        //     'email' => $this->m_company_email,
        //     'address' => $this->m_company_address,
        //     'pin' => $this->m_company_pin,
        //     'city' => $this->m_company_city,
        //     'state' => $this->state($this->m_company_state),
        //     'country' => $this->company($this->m_company_country),
        //     'gstinno' => $this->m_company_GSTIN,
        // ],'status_code' => 200);


        return 
        [
            'id' => $this->m_company_id,
            'name' => $this->m_company_name,
            'feedbackday' => $this->m_avg_feedback_day,
            'email' => $this->m_company_email,
            'address' => $this->m_company_address,
            'pin' => $this->m_company_pin,
            'city' => $this->m_company_city,
            'state' => $this->state->state_name,
            'country' => $this->country->country_name,
            'gstinno' => $this->m_company_GSTIN,
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
