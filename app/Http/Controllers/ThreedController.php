<?php

namespace App\Http\Controllers;

use App\Threed;
use Illuminate\Http\Request;

class ThreedController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threeds = Threed::paginate(15);
        return view("threed.index",compact('threeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject'=>'required|min:5',
            'type'=>'required',
            'threed'=>'required|min:20',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        auth()->user()->threeds()->create($request->all());
        // Threed::create($request->all());
        return back()->withMessage("Threed Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Threed  $threed
     * @return \Illuminate\Http\Response
     */
    public function show(Threed $threed)
    {
        return view('threed.single',compact('threed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Threed  $threed
     * @return \Illuminate\Http\Response
     */
    public function edit(Threed $threed)
    {
        return view('threed.edit', compact('threed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Threed  $threed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Threed $threed)
    {
        if(auth()->user()->id != $threed->user_id)
        {
            abort(401,"unauthor");
        }

        $this->validate($request, [
            'subject'=>'required|min:5',
            'type'=>'required',
            'threed'=>'required|min:20',

        ]);


        $threed->update($request->all());

        return redirect()->route('threed.show',$threed->id)->withMessage('Threed updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Threed  $threed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Threed $threed)
    {
         if(auth()->user()->id != $threed->user_id)
        {
            abort(401,"unauthor");
        }

        $threed->delete();

        return redirect()->route('threed.index')->withMessage("Threet deleted");
    }
}
