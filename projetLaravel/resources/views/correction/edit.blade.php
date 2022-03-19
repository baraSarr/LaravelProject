@extends('/layouts.base')

@section("title")
    Modification de correction
@endsection

@section("content")
<x-auth-card>
    <form action="{{route('corrections.update',$correction->id)}}" method="post" enctype="multipart/form-data" class="form">
    @csrf
        <div class="container">
            <legend>Modification de correction</legend>
                <div class="form-group">
                    <label for="nom">Nom de l'epreuve</label>
                    <input type="text" name="nom" id="" class="form-control" value="{{$correction->nom}}">
                </div>
                <div class="form-group">
                    <label for="matiere">Matiere</label>
                    <input type="text" name="matiere" class="form-control" value="{{$correction->matiere}}">
                </div>
                <div class="form-group">
                    <label for="filiere">Filiere</label>
                    <input type="text" name="filiere" class="form-control" value="{{$correction->filiere}}">
                </div>
                <div class="form-group">
                    <label for="contenu">Fichier</label>
                    <input type="file" name="contenu" id="" class="form-control" value="{{$correction->contenu}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
        </div>
    </form>
</x-auth-card>
@endsection