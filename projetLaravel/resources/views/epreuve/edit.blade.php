@extends('/layouts.base')

@section("title")
    Modification d'epreuve
@endsection

@section("content")
<x-auth-card>
    <form action="{{route('epreuves.update',$epreuve->id)}}" method="post" enctype="multipart/form-data" class="form">
    @csrf
        <div class="container">
            <legend>Modification d'epreuve</legend>
                <div class="form-group">
                    <label for="nom">Nom de l'epreuve</label>
                    <input type="text" name="nom" id="" class="form-control" value="{{$epreuve->nom}}">
                </div>
                <div class="form-group">
                    <label for="matiere">Matiere</label>
                    <input type="text" name="matiere" class="form-control" value="{{$epreuve->matiere}}">
                </div>
                <div class="form-group">
                    <label for="filiere">Filiere</label>
                    <input type="text" name="filiere" class="form-control" value="{{$epreuve->filiere}}">
                </div>
                <div class="form-group">
                    <label for="nomProfesseur">Nom du professeur</label>
                    <input type="text" name="nomProfesseur" class="form-control" value="{{$epreuve->nomProfesseur}}">
                </div>
                <div class="form-group">
                    <label for="contenu">Fichier de l'epreuve</label>
                    <input type="file" name="contenu" id="" class="form-control" value="{{$epreuve->contenu}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
        </div>
    </form>
    <x-auth-card>
@endsection