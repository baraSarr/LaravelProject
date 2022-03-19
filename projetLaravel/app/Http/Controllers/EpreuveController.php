<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Correction;
use Illuminate\Support\Facades\Storage;

class EpreuveController extends Controller
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
        //
        $epreuves = Epreuve::paginate(15);;
        $corrections = Correction::paginate(15);;
        return view('welcome',[
            'epreuves'=>$epreuves,
            'corrections'=>$corrections
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('epreuve.create',[
            'user_id'=>$id,
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
        $epreuve = new Epreuve();
        $epreuve->nom = $request->nom;
        $epreuve->matiere = $request->matiere;
        $epreuve->filiere = $request->filiere;
        $epreuve->nomProfesseur = $request->nomProfesseur;
        $path = Storage::disk('local')->put('files',$request->contenu);
        $epreuve->contenu = $path;
        $epreuve->user_id = $id;
        $epreuve->save();
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
        $epreuve = Epreuve::findOrFail($id);
        $path = Storage::url($epreuve->contenu);
        return view("epreuve.show",[
            "epreuve"=>$epreuve,
            "path"=>$path,
        ]);
    }

    public function download($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $path = $epreuve->contenu;
        
        return Storage::download($path);
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
        $epreuve = Epreuve::findOrFail($id);
        return view('epreuve.edit',[
            "epreuve"=>$epreuve,
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
        $epreuve = Epreuve::findOrFail($id);
        $epreuve->nom = $request->nom;
        $epreuve->matiere = $request->matiere;
        $epreuve->filiere = $request->filiere;
        $epreuve->nomProfesseur = $request->nomProfesseur;
        $path = Storage::disk('local')->put('files',$request->contenu);
        $epreuve->contenu = $path;
        $epreuve->save();
        return redirect()->back();
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
        $epreuve = Epreuve::findOrFail($id);
        $epreuve->delete();
        return redirect()->back();
    }
}
