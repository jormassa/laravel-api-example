<?php

namespace App\Models\Requests;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Http\Request;
use Validator;

class BookStoreRequestBody extends DataTransferObject
{

    public string $name;

    public string $author;


    public static function fromRequest(Request $request): self
    {
        return BookStoreRequestBody::fromArray($request->all());
    }

    public static function fromArray($request): self
    {

        $validator = Validator::make($request, [
            'name' =>  'required',
            'author' =>  'required',
        ]);
 
        if($validator->fails()){
            return response()->json($validator->errors(), 400); 
        }

        return new self([
            'name' => $request['name'],
            'author' => $request['author'],
        ]);
    }

}
