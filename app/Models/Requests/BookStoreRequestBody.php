<?php

namespace App\Models\Requests;

use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Http\Request;
use Validator;

use App\Exceptions\CustomException;

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
            // return response()->json($validator->errors(), 400); 
            throw new CustomException(400,'Bad request');
        }

        return new self([
            'name' => $request['name'],
            'author' => $request['author'],
        ]);
    }

}
