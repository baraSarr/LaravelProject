@extends('/layouts.base')

@section("title")
    Liste des utilisateurs
@endsection

@section("content")
<h2>Liste des utilisateurs</h2>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Esmt</th>
        </tr>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->prenom}}</td>
                <td>{{$user->nom}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->esmt == null)
                        Non
                        @else
                            Oui
                        @endelse
                    @endif
                </td>
                <td>
                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary">show</a>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">update</a>
                    <a href="{{route('users.delete',$user->id)}}" class="btn btn-danger">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $users->links() }}
    </div>
@endsection