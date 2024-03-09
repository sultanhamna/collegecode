<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgentDashbordController extends Controller
{
  protected function dashbord()
    {
        return view ('agent.dashbord');
    }

}
