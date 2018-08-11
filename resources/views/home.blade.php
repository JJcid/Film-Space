@extends('layouts.app')

@section('content')
<div class="pl-5 pr-5">
    <div class="row justify-content-center">
        @forelse($films as $film)
            <div class="col-md-3">
                @include('partials.films.card_film')
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __("No hay ninguna película disponible") }}
            </div>
        @endforelse
    </div>

    <div class="row justify-content-center">
        {{ $films->links() }}
    </div>
</div>
@endsection
