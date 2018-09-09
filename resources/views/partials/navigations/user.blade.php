<li><a class="nav-link" href="{{ route('profile.index') }}">{{ __("Mi perfil") }}</a></li>
<li><a class="nav-link" href="{{ route('subscriptions.admin') }}">{{ __("Mis suscripciones") }}</a></li>
<li><a class="nav-link" href="{{-- route('invoices.admin') --}}">{{ __("Mis facturas") }}</a></li>
<li><a class="nav-link" href="{{-- route('films.subscribed') --}}">{{ __("Mis películas") }}</a></li>
@include('partials.navigations.logged')
