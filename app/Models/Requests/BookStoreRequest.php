<?php

namespace App\Models\Requests;

use Illuminate\Http\Request;
use App\Models\Requests\BookStoreRequestBody;

class BookStoreRequest extends Request
{

    private $dto;
    
    // Create a BookStoreRequest object from the standard Request
    public function __construct(Request $request)
    {
        Request::createFrom($request,$this);
        $this->dto = BookStoreRequestBody::fromRequest($request);      
    }

    // Any call that cannot be executed by $this, we try to execute with $this->dto
    public function __call($method, $args)
    {
        $this->dto->$method($args[0]);
    }

}
