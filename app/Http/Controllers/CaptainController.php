<?php

namespace App\Http\Controllers;
use App\Captain;
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
    public function store(Request $request)
    {
        $assignment = new Assignment;


        $assignment->fill($request->only([
            "subject ",
            "description",
            "captain_id",
            "user_id"
        ]));    
        $assignment->save();

        return redirect(action('CaptainController@show'));
    }
}
