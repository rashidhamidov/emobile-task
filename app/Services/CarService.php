<?php

namespace App\Services;


use App\Models\Car;

class CarService
{
    public function cars()
    {
        return Car::where('isDelete', 0)->get();
    }

    public function store($request)
    {
        try {
            $data = new Car();
            $data->name = $request->name;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update($request)
    {
        try {
            $data = Car::find($request->car_id);
            $data->name = $request->name;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function getCar($id)
    {
        try {
            $data = Car::find($id);
            return $data;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function deleteCar($id)
    {
        $data = Car::find($id);
        if ($data) {
            $data->isDelete = 1;
            $data->save();
        }
    }
}
