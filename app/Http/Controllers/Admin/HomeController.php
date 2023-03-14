<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $page = [
        'route' => 'costumer',
        'title' => 'Müştəri Paneli'
    ];

    public function __construct()
    {
        View::share('page', $this->page);
    }

    public function index()
    {
        return redirect()->route('admin_costumer');
    }
}
