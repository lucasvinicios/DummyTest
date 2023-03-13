<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DummyHelper;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new DummyHelper();
    }

    public function index(){
        return $this->helper->products();
    }

    public function show(Request $request)
    {
        return $this->helper->getProduct($request->product);
    }

    public function store(Request $request)
    {
        return $this->helper->addProduct($request->title);
    }


}
