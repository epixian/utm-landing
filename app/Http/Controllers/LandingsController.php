<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;

class LandingsController extends Controller
{
    public function index()
    {
        $userdata = json_decode(base64_decode(request('utm_term')));
        
        if ($userdata !== null) {

            Visit::create([
                'utm_source' => request('utm_source'),
                'utm_medium' => request('utm_medium'),
                'utm_campaign' => request('utm_campaign'),
                'utm_term' => request('utm_term'),
                'utm_content' => request('utm_content')
            ]);
            return view('landing', compact('userdata'));
        }
        else {
            abort(404);
        }
        
    }


}
