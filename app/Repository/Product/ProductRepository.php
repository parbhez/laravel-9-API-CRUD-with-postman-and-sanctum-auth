<?php

namespace App\Repository\Product;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductRepository implements ProductInterface
{
	public function getAllProduct()
	{
        try{
            $data = Product::get();
    	    return sendSuccessResponse($data);
        }catch(QueryException $e){
            return sendErrorResponse($e->getMessage(),"Something Went Wrong!",500);
        }
	}

	public function store($data = [])
	{
        try{
            $data = Product::create($data);
            if($data){
                return sendSuccessResponse($data,'Data Created Successfully',201);
            }else{
                return sendErrorResponse([],'Data Not inserted',500);
            }
        }catch(QueryException $e){
            return sendErrorResponse($e->getMessage(),"Something Went Wrong",500);
        }
	}

	public function show($id)
	{
        try{
            $data = Product::find($id);
                if($data){
                    return sendSuccessResponse($data);
                }else{
                    return sendErrorResponse([],'Data Not Found',404);
                }
        }catch(QueryException $e){
            return sendErrorResponse($e->getMessage(),"Something Went Wrong!!",500);
        }
	}

	public function update($data = [], $id)
	{
        try{
            $data = Product::find($id)->update($data);
            return sendSuccessResponse($data,'Data Updated Successfully',200);

        }catch(QueryException $e){
            return sendErrorResponse($e->getMessage(),"Something Went Wrong!!",500);
        }
	}

	public function delete($id)
    {
		$data = Product::find($id);

        try{
            if($data){
                $data->delete();
                return sendSuccessResponse([],'Data Deleted Successfully !!',200);
            }else{
                return sendErrorResponse([],'Data Not Deleted',500);
            }
        }catch(QueryException $e){
            return sendErrorResponse($e->getMessage(),"Something Went Wrong!!",500);
        }
	}

	public function getDataWithPaginate()
    {
		Product::latest()->paginate(5);
	}
}
