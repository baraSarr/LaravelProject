@extends('/layouts.base')

@section("title")
    Insertion d'epreuve
@endsection

@section("content")
<x-auth-card>
    <form action="{{route('users.store_epreuve',$user_id)}}" method="post" enctype="multipart/form-data" class="form">
    @csrf
        <div class="container">
            <legend>Insertion d'epreuve</legend>
            <div>
                <div class="form-group">
                    <label for="nom">Nom de l'epreuve</label>
                    <input type="text" name="nom" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="matiere">Matiere</label>
                    <input type="text" name="matiere" class="form-control">
                </div>
                <div class="form-group">
                    <label for="filiere">Filiere</label>
                    <input type="text" name="filiere" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nomProfesseur">Nom du professeur</label>
                    <input type="text" name="nomProfesseur" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contenu">Fichier de l'epreuve</label>
                    <input type="file" name="contenu" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</x-auth-card>
@endsection