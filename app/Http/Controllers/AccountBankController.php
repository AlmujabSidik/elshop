<?php

namespace App\Http\Controllers;

use App\Models\AccountBank;
use Illuminate\Http\Request;

class AccountBankController extends Controller
{
    public function index()
    {
        $accountBanks = AccountBank::all();
        return view('forms.components.pembayaran', [
            'accountBanks' => $accountBanks
        ]);
    }
}