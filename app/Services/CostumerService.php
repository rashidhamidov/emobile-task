<?php

namespace App\Services;

use App\Models\Costumer;

class CostumerService
{
    public function costumers($request)
    {

        $costumers = Costumer::where('isDelete', 0)
            ->where('name', 'like', "%" . $request->name . "%")
            ->where('surname', 'like', "%" . $request->surname . "%")
            ->where('gender', 'like', "%" . $request->gender . "%")
            ->where(function ($query) use ($request) {
                if ($request->car_id) {
                    $query->where('car_id', $request->car_id);
                }
                if ($request->birthday) {
                    list($year, $month, $day) = explode("-", date("Y-m-d"));
                    $range = $year - $request->birthday;
                    $query->where('birthday', 'like', "%" . $range . "%");
                }
            })
            ->get();
        return $costumers;
    }


    public function store($request)
    {
        try {
            $data = new Costumer();
            $data->car_id = $request->car_id;
            $data->name = $request->name;
            $data->surname = $request->surname;
            $data->birthday = $request->birthday;
            $data->phone = $request->phone;
            $data->gender = $request->gender;
            $data->color = $request->color;
            $data->year = $request->year;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            $data = Costumer::find($id);
            $data->car_id = $request->car_id;
            $data->name = $request->name;
            $data->surname = $request->surname;
            $data->birthday = $request->birthday;
            $data->phone = $request->phone;
            $data->gender = $request->gender;
            $data->color = $request->color;
            $data->year = $request->year;
            $data->save();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function getCostumer($id)
    {
        try {
            $data = Costumer::find($id);
            return $data;
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteCostumer($id)
    {
        $data = Costumer::find($id);
        if ($data) {
            $data->isDelete = 1;
            $data->save();
        }
    }
}
