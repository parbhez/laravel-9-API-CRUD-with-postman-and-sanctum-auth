<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repository\Product\ProductInterface;

class ProductController extends Controller
{
	protected $product;

	public function __construct(ProductInterface $product)
	{
		$this->product = $product;
	}

    public function getAllProduct()
    {
    	return $this->product->getAllProduct();
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'name' => ['required','unique:products,name'],
            'price' => ['required'],
            'description' => ['required']
        ]);

        if($validator->fails()){
            return sendErrorResponse($validator->errors(),"Validation Error!",422); //client side error 422
        }
        $data = $validator->validated();
        $data['slug'] = str($data['name'])->slug();
    	$this->product->store($data);
    }

    public function show($id)
    {
    	return $this->product->show($id);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','unique:products,name,' .$id],
            'price' => ['required'],
            'description' => ['required']
        ]);

        if($validator->fails()){
            return sendErrorResponse($validator->errors(),"Validation Error!",422); //client side error 422
        }
        $data = $validator->validated();
        $data['slug'] = str($data['name'])->slug();
        return $this->product->update($data,$id);
    }

    public function delete($id)
    {
        return $this->product->delete($id);
    }
}
