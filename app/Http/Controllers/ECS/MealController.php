<?php

namespace App\Http\Controllers\ECS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MealController extends Controller
{
    const CENTERS = [
        1 => '賽馬會黃志強長者地區中心',
        2 => '南區長者地區中心',
        3 => '南區長者綜合服務處',
        4 => '林應和長者鄰舍中心',
        5 => '方王煥娣長者鄰舍中心'
    ];

    public function __construct()
    {
        View::share('centers', self::CENTERS);
    }

    public function index()
    {
        return view('ECS.meal.index');
    }

    public function create()
    {
        return view('ECS.meal.create');
    }

    public function edit()
    {
        return view('ECS.meal.edit');
    }
}
