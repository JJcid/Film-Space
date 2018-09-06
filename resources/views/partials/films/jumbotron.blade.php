<div class="row">
    <div class="col-md-12">
        <div class="card film-card" style="background-image: url('{{ url('/images/jumbotron_film.png') }}')">
            <div class="text-white text-center d-flex align-items-center justify-content-center py-5 px-4 my-5">
                <div class="col-5">
                    <img class="img-fluid poster" src="{{ $film->pathAttachment() }}" />
                </div>

                <div class="col-3 text-left film-text">
                    <h1>{{ __("Película") }}: {{ $film->name }}</h1>
                    <h5>{{ __("Categoría") }}: {{ $film->category->name }}</h5>
                    <h5>{{ __("Fecha de publicación") }}: {{ $film->created_at->format('d/m/Y') }}</h5>
                    <h6>{{ __("Número de valoraciones") }}: {{ $film->reviews_count }}</h6>
                    @include('partials.films.rating', ['rating' => $film->custom_rating])
                    @include('partials.films.action_button')
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
