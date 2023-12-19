<?php

namespace Crm\Note\Requests;

use Crm\Base\Requests\ApiRequest;

class NoteCreation extends ApiRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'note' => 'required',
        ];
    }
}
