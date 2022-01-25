<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    public function index(){
        $car=Car::all()->toArray();
        return $car;
    }
}
