@extends('/layouts.base')

@section("title")
    Profil utilisateur
@endsection

@section("content")
<x-auth-card>
    <div class="container">
        <p>
            <strong>Prenom:</strong>
            <span>{{$user->prenom}}</span>
        </p>
        <p>
            <strong>Nom:</strong>
            <span>{{$user->nom}}</span>
        </p>
        <p>
            <strong>Email:</strong>
            <span>{{$user->email}}</span>
        </p>
        <p>
            <strong>Etudiant de l'esmt</strong>
            @if($user->esmt == null)
                <span>Non</span>
            @endif
        </p>
        <a href="{{route('users.edit',$user->id)}}">Modifier</a>
    </div>
</x-auth-card>
@endsection