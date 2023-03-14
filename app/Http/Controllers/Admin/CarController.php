<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Services\CarService;
use Illuminate\Support\Facades\View;

class CarController extends Controller
{
    /**
     * This is for controller view usage of model Parameters
     */
    protected $page = [
        'route' => 'car',
        'title' => 'Avtomobil',
        'title_sum' => 'Avtomobillər'
    ];

    public function __construct(protected CarService $carService)
    {
        View::share('page', $this->page);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.car.index');
    }

    public function fetchCars()
    {
        return response()->json($this->carService->cars());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $this->carService->store($request);
        return response()->json([
            'success' => true,
            'message' => 'Avtomobil Ugurla Yuklendi'
        ]);
    }

    public function edit($id)
    {
        return $this->carService->getCar($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request)
    {
        $this->carService->update($request);
        return response()->json([
            'success' => true,
            'message' => 'Avtomobil Ugurla Yenilendi'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->carService->deleteCar($id);
        return response()->json([
            'success' => true,
            'message' => 'Avtomobil Ugurla Silindi'
        ]);
    }
}
