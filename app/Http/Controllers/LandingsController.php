<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingsController extends Controller
{
    public function index()
    {
        $userdata = json_decode(base64_decode(request('utm_term')));
        
        if ($userdata !== null) {
            return view('landing', compact('userdata'));
        }
        else {
            abort(404);
        }
        
    }


}
