@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        @if (Auth::user()->type == "recruteur")
            <h1>{{Auth::user()->prenom}}</h1>
        @endif
    </div>
</div>
@endsection


