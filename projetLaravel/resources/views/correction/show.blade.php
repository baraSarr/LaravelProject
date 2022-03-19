@extends('/layouts.base')

@section("title")
    Détails de la correction
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
            <td>{{$correction->nom}}</td>
            <td>{{$correction->matiere}}</td>
            <td>{{$correction->filiere}}</td>
            <td>{{$correction->contenu}}</td>
            <td>
                <a href="{{route('corrections.download',$correction->id)}}">download</a>
                <a href="{{route('corrections.edit',$correction->id)}}">Edit</a>
            </td>
        </tr>
    </table>
@endsection