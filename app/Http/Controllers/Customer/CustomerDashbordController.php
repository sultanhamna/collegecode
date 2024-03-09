<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashbordController extends Controller
{
    //
    protected function  dashbord()
    {
        return view('customer.dashbord');
    }
}
