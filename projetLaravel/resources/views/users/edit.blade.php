@extends('/layouts.base')

@section("title")
    Modification d'utilisateur
@endsection

@section("content")
<x-auth-card>
    <form action="{{route('users.update',$user->id)}}" method="post" class="form">
    @csrf
        <div class="container">
            <legend>Formulaire de modification</legend>
            <div class="form-group">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" value="{{$user->prenom}}">
            </div>
            <div class="form-group">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{$user->nom}}">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <button type="submit">Sauvegarder</button>
                <input type="text" name="prenom" class="form-control" value="{{$user->prenom}}">
            </div>
        </div>
    </form>
<x-auth-card>
@endsection