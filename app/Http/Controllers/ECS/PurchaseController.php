<?php

namespace App\Http\Controllers\ECS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PurchaseController extends Controller
{
    const CENTERS = [
        1 => '賽馬會黃志強長者地區中心',
        2 => '南區長者地區中心',
        3 => '方王煥娣長者鄰舍中心',
        4 => '林應和長者鄰舍中心',
    ];

    const PRODUCTS = [
        1 => ['name' => '奶粉 (大)', 'count' => 50, 'price' => 200],
        2 => ['name' => '奶粉 (細)', 'count' => 80, 'price' => 100],
        3 => ['name' => '尿片 (大)', 'count' => 120, 'price' => 160],
        4 => ['name' => '尿片 (中)', 'count' => 100, 'price' => 110],
        5 => ['name' => '尿片 (細)', 'count' => 100, 'price' => 90],
    ];

    const IDENTITIES = [
        1 => '護老者',
        2 => '長者會員',
        3 => '職員'
    ];

    const PURCHASES = [
        4 => ['identity' => '長者會員', 'code' => '03EL30012', 'name' => '陳明康', 'phone' => '9898xxxx', 'product_id' => 1, 'count' => 1, 'create_date' => '2021-02-26 13:05', 'invoice' => '80182'],
        3 => ['identity' => '長者會員', 'code' => '03EL30005', 'name' => '張大妹', 'phone' => '9132xxxx', 'product_id' => 2, 'count' => 2, 'create_date' => '2021-02-25 10:05', 'invoice' => '80172'],
        2 => ['identity' => '長者會員', 'code' => '03EL30018', 'name' => '趙霞', 'phone' => '9085xxxx', 'product_id' => 1, 'count' => 1, 'create_date' => '2021-02-21 17:16', 'invoice' => '80008'],
        1 => ['identity' => '護老者', 'code' => 'J0012', 'name' => '黃敏', 'phone' => '6085xxxx', 'product_id' => 3, 'count' => 1, 'create_date' => '2021-01-01 12:35', 'invoice' => '79982']
    ];

    public function __construct()
    {
        $centers = self::CENTERS;
        $products = self::PRODUCTS;
        $identities = self::IDENTITIES;
        View::share('centers', $centers);
        View::share('products', $products);
        View::share('identities', $identities);
    }

    public function index()
    {
        $purchases = self::PURCHASES;
        return view('ECS.purchase.index', compact('purchases'));
    }

    public function create()
    {
        return view('ECS.purchase.create', compact('centers'));
    }

    public function edit($purchase_id)
    {
        $purchase = self::PURCHASES[$purchase_id];
        return view('ECS.purchase.edit', compact('purchase'));
    }
}