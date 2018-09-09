<div class="row">
    <div class="col-md-12">
        <div class="card film-card col-md-12" style="background-image: url('{{ url('/images/jumbotron_film.png') }}')">
            <div class="text-white text-center d-sm-block d-md-flex align-content-center py-5 px-4 my-5">
                <div class="text-center">
                    <img class="img-fluid poster" src="{{ $film->pathAttachment() }}" />
                </div>

                <div class="text-center col-md-5 film-text">
                    <h1>{{ $film->name }}</h1>
                    <h5>{{ $film->category->name }}</h5>
                    <h5>{{ __("Fecha de publicación") }}: {{ $film->created_at->format('d/m/Y') }}</h5>
                    <h6>{{ __("Número de valoraciones") }}: {{ $film->reviews_count }}</h6>
                    @include('partials.films.rating', ['rating' => $film->custom_rating])
                    @include('partials.films.action_button')
                </div>
            </div>
        </div>
    </div>
</div>
