@extends('/layouts.base')

@section("title")
    Dashboard
@endsection

@section("content")
@if($user->profil == "utilisateur")
    <h2>Epreuves</h2>
    <a href="{{route('users.create_epreuve',$user->id)}}" class="btn btn-primary">Ajouter epreuve</a>
    <div class="row row-cols-3 row-cols-lg-4" style="margin-left: 5%;">

@foreach($epreuves as $epreuve)
<div class="col-12 col-md-2 col-lg-4 col-xl-3 ">
        <div class="card shadow-xl mt-2 " style="background-color:#B4CFB0;">

            <div class="align-items-center p-2 text-center">
                <div class="card-body mt-3 info">
                    <h5 class="card-title" style="color: #789395;"><strong> Titre: </strong><strong>{{ $epreuve->nom}}</strong></h5>
                    <p class="text-start" style="color: #789395;"><strong> Matiere: </strong>
                        {{ $epreuve->matiere }}</p>
                    <p class="text-start" style="color: #789395;"><strong>Filiere:</strong> {{$epreuve->filiere }} </p>
                    <p class="text-start" style="color: #789395;"> <strong>prof:</strong>
                        {{ $epreuve->nomProfesseur }}</p>
                    <div class="row my-3">
                            <a href="{{route('epreuves.edit',$epreuve->id)}}" class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>Modifier</a>
            <a href="{{route('epreuves.download',$epreuve->id)}}"class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>voir</a>
            <a href="{{route('epreuves.delete',$epreuve->id)}}"class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>Supprimer</a>
            <a href="{{route('epreuves.create_correction',$epreuve->id)}}"class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>Ajouter correction</a>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
    <hr style="margin-top:20px;margin-bottom:20px;">
    <h2>Corrections</h2>
    <div class="row row-cols-3 row-cols-lg-4" style="margin-left: 5%;">

@foreach($corrections as $correction)
<div class="col-12 col-md-2 col-lg-4 col-xl-3 ">
        <div class="card shadow-xl mt-2 " style="background-color:#B4CFB0;">

            <div class="align-items-center p-2 text-center">
                <div class="card-body mt-3 info">
                    <h5 class="card-title" style="color: #789395;"><strong> Titre: </strong><strong>{{ $correction->nom}}</strong></h5>
                    <p class="text-start" style="color: #789395;"><strong> Matiere: </strong>
                        {{ $correction->matiere }}</p>
                    <p class="text-start" style="color: #789395;"><strong>Filiere:</strong> {{$correction->filiere }} </p>
                    <div class="row my-3">
                        <a href="{{route('corrections.download',$correction->id)}}" class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i> Voir</a>
                            <a href="{{route('corrections.edit',$epreuve->id)}}" class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>Modifier</a>
            <a href="{{route('corrections.delete',$epreuve->id)}}" class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i>Supprimer</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@else
<table class="table">
    <tr>
        <th>Id</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Esmt</th>
    </tr>
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
                @endif
            </td>
        </tr>
    @endforeach
</table>
@endif
@endsection
            