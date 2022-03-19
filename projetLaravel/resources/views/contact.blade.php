@extends('/layouts.base')

@section("title")
    Newsletter
@endsection

@section("content")
<x-auth-card>
    <form action="{{route('envoi')}}" method="post" class="form">
    @csrf
        <div class="container">
            <label for="email" class="form-label">Veuillez entrer votre adresse mail pour vous abonner à notre newsletter</label>
            <input type="email" name="email" id="" class="form-control">
            <button type="submit" class="btn">Enregistrer</button>
        </div>
    </form>
</x-auth-card>
@endsection