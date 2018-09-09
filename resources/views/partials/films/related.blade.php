<div class="col-12-pt-0 mt-5">
    <hr>
    <h2 class="text-muted">
        {{ __('Películas relacionadas') }}
    </h2>
</div>
<div class="container-fluid mt-3">
    <div class="row">
        @forelse($related as $relatedFilm)
            <div class="col-md-6 listing-block">
                <div class="media">
                    <div class="fav-box" title="{{ __('Añadir a favoritos') }}">
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
                        <div class="btn btn-film">
                            <a class="btn-film" href="{{ $relatedFilm->slug }}" title="Ver">
                                <i class="fa fa-play-circle"></i>
                            </a>
                        </div>
                        @if($relatedFilm->isInSubscriptionPlan())
                        <div class="btn btn-film">
                            <i class="fa fa-film" title="En plan de suscripción"></i>
                        </div>
                        @endif
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
