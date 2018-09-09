<div class="card card-01">
    <img
        class="card-img-top"
        src="{{ $film->pathAttachment() }}"
        alt="{{ $film->name }}"
    />
    <div class="card-body">
        @if($film->isInSubscriptionPlan())
            <span class="badge-box"><i class="fa fa-film"></i></span>
        @endif
        <h4 class="card-title">{{ str_limit($film->name, 15) }}</h4>
        <hr />
        <div class="row justify-content-center">
            @include('partials.films.rating')
        </div>
        <hr />
        <span class="badge badge-danger badge-cat">{{ $film->category->name }}</span>
        <p class="card-text">
            {{ str_limit($film->description, 75) }}
        </p>
        <a
            href="{{ route('films.detail', $film->slug )}}"
            class="btn btn-film btn-block"
        >
            <i class="fa fa-play-circle"> Mostrar más detalles </i>
        </a>
    </div>
</div>
