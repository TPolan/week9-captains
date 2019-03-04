<?php

namespace App\Http\Controllers;
use App\Captain;
use App\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CaptainController extends Controller
{
    //
    public function show($captain_slug)
    {
        $captain = \App\Captain::where('slug', $captain_slug)->first();

        if (!$captain) {
            abort(404, 'Captain not found');
        }

        $view = view('captain/show');
        $view->captain = $captain;
        return $view;
    }
    public function index()
    {

        $captains = Captain::orderBy('name','ASC')->get();
        return view('captain/index',compact('captains'));
    }
    public function store(Request $request, $captain)
    {
        $assignment = new Assignment;

        $assignment->user_id = Auth::id();
        $captainID = Captain::where('slug',$captain)->get();
        // dd($captain);
        $assignment->captain_id = $captainID[0]->id;
        $assignment->fill($request->only([
            "subject",
            "description",
            
        ]));    
        $assignment->save();

        return redirect(action('CaptainController@index'));
    }
}
