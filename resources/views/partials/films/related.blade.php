<div class="col-12-pt-0 mt-4">
    <h2 class="text-muted">
        {{ __('Películas relacionadas') }}
    </h2>
</div>
<div class="container-fluid">
    <div class="row">
        @forelse($related as $relatedFilm)
            <div class="col-md-6 listing-block">
                <div class="media">
                    <div class="fav-box">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('films.detail', $relatedFilm->slug) }}">
                        <img src="/storage/films/{{ $relatedFilm->picture }}" alt="{{ $relatedFilm->name }}"
                             class="d flex align-self-start"/>
                    </a>
                    <div class="media-body pl-3">
                        <div class="price">
                            <small>{{ $relatedFilm->name }}</small>
                        </div>
                        <div class="stats">
                            @include('partials.films.rating', ['film' => $relatedFilm])
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __('No existe ningún curso relacionado') }}
            </div>
        @endforelse
    </div>
</div>
