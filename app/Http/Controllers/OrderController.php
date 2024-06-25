<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $name = session('member_name', 'Member');
        return view('verifikasi', compact('name'));
    }
}
