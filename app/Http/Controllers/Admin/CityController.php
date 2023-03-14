<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Support\Facades\View;

class CityController extends Controller
{
    /**
     * This is for controller view usage of model Parameters
     */
    protected $page = [
        'route' => 'city',
        'title' => 'Rayon',
        'title_sum' => 'Rayonlar'
    ];

    public function __construct(protected CityService $cityService)
    {
        View::share('page', $this->page);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.city.index');
    }

    public function fetchCities()
    {
        return response()->json($this->cityService->cities());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $this->cityService->store($request);
        return response()->json([
            'success' => true,
            'message' => 'Rayon Ugurla Yuklendi'
        ]);
    }

    public function edit($id)
    {
        return $this->cityService->getCity($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request)
    {
        $this->cityService->update($request);
        return response()->json([
            'success' => true,
            'message' => 'Rayon Ugurla Yenilendi'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->cityService->deleteCity($id);
        return response()->json([
            'success' => true,
            'message' => 'Rayon Ugurla Silindi'
        ]);
    }
}
