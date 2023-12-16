<?php

namespace App\Http\Requests;

use Crm\Base\Requests\ApiRequest;

class CreateCustomerRequest extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' => 'required|min:3'
        ];
    }
}
