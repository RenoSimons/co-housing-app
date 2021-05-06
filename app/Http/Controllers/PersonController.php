<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class PersonController extends Controller
{
    public function index() {
        $applications = Application::get();

        return view('persons', ['applications' =>$applications]);
    }
}
