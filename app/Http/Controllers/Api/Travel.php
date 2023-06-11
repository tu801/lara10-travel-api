<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TravelStoreRequest;

class Travel extends Controller
{
    public function store(TravelStoreRequest  $request): JsonResponse
    {
        $input = $request->all();

        dd($input);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Product::create($input);

        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    }
}
