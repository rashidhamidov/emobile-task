<?php


namespace App\Services;

use App\Models\Trip;

class TripService
{
    public function trips($id)
    {
        $trips = Trip::where('isDelete', 0)->where('costumer_id', $id)->get();
        return $trips;
    }

    public function store($request, $id)
    {
        try {

            $data = new Trip();
            $data->costumer_id = $id;
            $data->city_id = $request->city_id;
            $data->start_date = $request->start_date;
            $data->duration = $request->duration;
            $data->distance = $request->distance;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            $data = Trip::find($id);
            $data->city_id = $request->city_id;
            $data->start_date = $request->start_date;
            $data->duration = $request->duration;
            $data->distance = $request->distance;
            $data->save();
            return $data->costumer_id;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function getTrip($id)
    {
        try {
            $data = Trip::find($id);
            return $data;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteTrip($id)
    {
        $data = Trip::find($id);
        if ($data) {
            $data->isDelete = 1;
            $data->save();
        }
        return $data->costumer_id;
    }
}
