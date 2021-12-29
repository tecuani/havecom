<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (! Auth::user()) {

            return view('home.index', compact('services', 'opinions'));
        }

        return view('home.logged', compact('services', 'opinions'));
    }
}
