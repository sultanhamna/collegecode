<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashbordController extends Controller
{
  protected function dashbord()
    {
        return view ('admin.dashbord');
    }

}
