@extends('layouts.app')
@section('jumbotron')
  @include('partials.films.jumbotron')
@endsection
@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-center">
            @include('partials.films.description')
            @include('partials.films.related')
        </div>

    </div>
@endsection
