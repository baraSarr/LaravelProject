<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Correction;
use Illuminate\Support\Facades\Storage;

class CorrectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('correction.create',[
            'epreuve_id'=>$id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $epreuve = Epreuve::findOrFail($id);
        $correction = new Correction();
        $correction->nom = $request->nom;
        $correction->matiere = $request->matiere;
        $correction->filiere = $request->filiere;
        $path = Storage::disk('local')->put('files',$request->contenu);
        $correction->contenu = $path;
        $correction->user_id = $epreuve->user_id;
        $correction->epreuve_id = $epreuve->id;
        $correction->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $correction = Correction::findOrFail($id);
        return view("correction.show",[
            "correction"=>$correction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $correction = Correction::findOrFail($id);
        return view('correction.edit',[
            "correction"=>$correction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $correction = Correction::findOrFail($id);
        $correction->nom = $request->nom;
        $correction->matiere = $request->matiere;
        $correction->filiere = $request->filiere;
        $path = Storage::disk('local')->put('files',$request->contenu);
        $correction->contenu = $path;
        $correction->save();
        return redirect()->back();
    }

    public function download($id)
    {
        $correction = Correction::findOrFail($id);
        $path = $correction->contenu;
        return Storage::download($path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $correction = Correction::findOrFail($id);
        $correction->delete();
        return redirect()->back();
    }
}
