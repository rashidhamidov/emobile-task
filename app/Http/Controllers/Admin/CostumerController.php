<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCostumerRequest;
use App\Http\Requests\UpdateCostumerRequest;
use App\Models\Costumer;
use App\Services\CarService;
use App\Services\CostumerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CostumerController extends Controller
{
    protected $page = [
        'route' => 'costumer',
        'title' => 'Müştəri',
        'title_sum' => 'Müştərilər'
    ];

    public function __construct(protected CostumerService $costumerService, protected CarService $carService)
    {
        View::share('page', $this->page);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('pages.' . $this->page["route"] . '.index', [
            'datalist' => $this->costumerService->costumers($request),
            'cars' => $this->carService->cars()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.' . $this->page["route"] . '.create', [
            'cars' => $this->carService->cars()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCostumerRequest $request)
    {
        $this->costumerService->store($request);
        return redirect()->route('admin_costumer')->with('success', 'Mussteri Ugurla Elave Olundu');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.costumer.update', [
            'data' => $this->costumerService->getCostumer($id),
            'cars' => $this->carService->cars()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostumerRequest $request, $id)
    {
        $this->costumerService->update($request, $id);
        return redirect()->route('admin_costumer')->with('success', "Musteri Ugurla Yenilendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->costumerService->deleteCostumer($id);
        return redirect()->route('admin_costumer')->with('success', "Musteri Ugurla Silindi");
    }
}
