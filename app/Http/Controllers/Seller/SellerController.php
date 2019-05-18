<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Seller;

class SellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seller = Seller::has('products')->get();

        return $this->showAll($seller);
    }

   

    
    public function show(Seller $seller)
    {
        //
       // $seller = Seller::has('products')->findOrFail($id);

        return$this->showOne($seller);
    }

  
}
