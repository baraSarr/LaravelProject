@extends('/layouts.base')

@section("title")
    Accueil
@endsection

@section("content")
<div>
<img src="{{URL::asset('/image/e-learning.jpeg')}}" class="mask bg-gradient-primary" alt="e-learning.jpeg" style="margin-left: 0%; width: 100%; height: 350%;margin-top: -17%; "><text></text>
</div>
<div class="b-example-divider"></div>
<div>
    <marquee behavior="" direction="" style="color:#789395;"><h4>Bienvenue sur la bibliothèque en ligne de Ecole Supérieure Multinationale des Télécommunication</h4></marquee>
</div>
<h4>Epreuves</h4>
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
                        <a href="{{route('epreuves.download',$epreuve->id)}}" class="btn-sm btn border-1 col-4 col-xs-12 mr-3"
                            style="background-color: #E5E3C9 ;margin-left: 33%;"></i> Voir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
<h4>Correction</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection