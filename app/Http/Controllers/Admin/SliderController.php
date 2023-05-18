<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Services\SliderService;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    private $sliderService;    

    public function __construct(SliderService $slider)
    {
        $this->sliderService = $slider;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->sliderService->findAll();
        return view('pages.admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $response = $this->sliderService->addSlider($request);
        Alert::toast($response['message'], $response['status']);
        return redirect('/slider')->with($response['status'], $response['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->sliderService->findById($id);
        return view('pages.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $response = $this->sliderService->updateSlider($request, $id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/slider')->with($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->sliderService->deleteRecordById($id);
        Alert::toast($response['message'], $response['status']);
        return redirect('/admin/slider')->with($response['status'], $response['message']);
    }
}
