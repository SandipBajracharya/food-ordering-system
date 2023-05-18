<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\SizeService;
use App\Services\ProductService;

use Illuminate\Support\Facades\Auth; 
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    private $sizeService, $productService;

    public function __construct(SizeService $service, ProductService $productService)
    {
        $this->sizeService = $service;
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->findAllProductsByUserId(Auth::user()->id);
        return view('pages.client.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = $this->sizeService->findAll();
        return view('pages.client.products.create', compact('sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->productService->addProduct($request);
        Alert::toast($response['message'], $response['status']);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
