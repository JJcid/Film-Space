<div class="card card-01">
    <img
        class="card-img-top"
        src="{{ $film->pathAttachment() }}"
        alt="{{ $film->name }}"
    />
    <div class="card-body">
        <span class="badge-box"><i class="fa fa-check"></i></span>
        <h4 class="card-title">{{ $film->name }}</h4>
        <hr />
        <div class="row justify-content-center">
            @include('partials.films.rating')
        </div>
        <hr />
        <span class="badge badge-danger badge-cat">{{ $film->category->name }}</span>
        <p class="card-text">
            {{ str_limit($film->description, 100) }}
        </p>
        <a
            href="{{ route('films.detail', $film->slug )}}"
            class="btn btn-course btn-block"
        >
            {{ __("Más información") }}
        </a>
    </div>
</div>
