<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\Click;

class LandingsController extends Controller
{
    public function index()
    {
        $userdata = json_decode(base64_decode(request('utm_term')));
        
        if ($userdata !== null) {

            $visit = Visit::create([
                'utm_source' => request('utm_source'),
                'utm_medium' => request('utm_medium'),
                'utm_campaign' => request('utm_campaign'),
                'utm_term' => request('utm_term'),
                'utm_content' => request('utm_content')
            ]);
            $visit_id = $visit->id;
            $utm_term = $visit->utm_term;
            return view('landing', compact('userdata', 'visit_id'));
        }
        else {
            abort(404);
        }
        
    }

    public function click()
    {
        $visit = Visit::where([
            ['id', request('visit_id')],
            ['utm_term', request('utm_term')]
        ])->get()->last();

        if ($visit) {
            Click::create([
                'visit_id' => request('visit_id'), 
                'target' => 'button']
            );
        }

        return redirect('/create');
    }
}
