<?php

namespace App\Services;
use App\Models\City;

class CityService
{
    public function cities()
    {
        return City::where('isDelete', 0)->get();
    }

    public function store($request)
    {
        try {
            $data = new City();
            $data->name = $request->name;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update($request)
    {
        try {
            $data = City::find($request->city_id);
            $data->name = $request->name;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function getCity($id)
    {
        try {
            $data = City::find($id);
            return $data;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function deleteCity($id)
    {
        $data = City::find($id);
        if ($data) {
            $data->isDelete = 1;
            $data->save();
        }
    }
}
