<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::take(6)->get();

        $opinions = [[
            'name' => 'luis ramos',
            'body' => 'sf gdf ga dfg adfg adf gad fga dfg ',
            'rating' => '4.5'], [
            'name' => 'Jhon Doe',
            'body' => 'sf gdf ga dfg adfg adf gad fga dfg ',
            'rating' => '4.7'],];

        return view('home.guest', compact('services', 'opinions'));
    }
}
