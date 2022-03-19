@extends('/layouts.base')

@section("title")
    Détails de l'épreuve
@endsection

@section("content")
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Matiere</th>
            <th>Filiere</th>
            <th>Nom du professeur</th>
            <th>fichier</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>{{$epreuve->nom}}</td>
            <td>{{$epreuve->matiere}}</td>
            <td>{{$epreuve->filiere}}</td>
            <td>{{$epreuve->nomProfesseur}}</td>
            <td>{{$epreuve->contenu}}</td>
            <td>
                <a href="{{route('epreuves.download',$epreuve->id)}}">download</a>
                <a href="{{route('epreuves.edit',$epreuve->id)}}">Edit</a>
            </td>
        </tr>
    </table>
@endsection