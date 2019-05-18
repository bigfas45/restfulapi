<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Buyer;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
    }

  function show(Buyer $buyer)
    {
        //
    //    $buyers = Buyer::has('transactions')->findOrFail($id);

        return $this->showOne($buyer);
    }

  
}
