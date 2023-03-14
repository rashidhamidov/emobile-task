<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Costumer;
use App\Models\Trip;
use App\Services\CityService;
use App\Services\TripService;
use Illuminate\Support\Facades\View;

class TripController extends Controller
{
    protected $page = [
        'route' => 'trip',
        'title' => 'Seyahet',
        'title_sum' => 'Seyahetler'
    ];

    public function __construct(protected TripService $tripService, protected CityService $cityService)
    {
        View::share('page', $this->page);
    }


    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view('pages.' . $this->page["route"] . '.index', [
            'datalist' => $this->tripService->trips($id),
            'costumer' => Costumer::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('pages.trip.create', [
            'cities' => $this->cityService->cities(),
            'costumer_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request, $id)
    {
        $this->tripService->store($request, $id);
        return redirect()->route('admin_costumer_trip', ['id' => $id])->with('success', 'Seyahet Ugurla Elave Olundu');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.trip.update', [
            'data' => $this->tripService->getTrip($id),
            'cities' => $this->cityService->cities()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripRequest $request, $id)
    {
        $costumer_id = $this->tripService->update($request, $id);
        return redirect()->route('admin_costumer_trip', ['id' => $costumer_id])->with('success', "Seyahet Ugurla Elave Yenilendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $costumer_id = $this->tripService->deleteTrip($id);
        return redirect()->route('admin_costumer_trip', ['id' => $costumer_id])->with('success', "Seyahet Ugurla Silindi");
    }
}
