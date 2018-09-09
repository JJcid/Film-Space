<div class="col-12">
  @auth
      @can('isInSubscriptionPlan', $film)
        @can('subscribed', $film)
          <a class="btn btn-subscribe btn-bottom btn-block" href="#">
            <i class="fa fa-bolt"></i> {{ __('Ver')}}
          </a>
        @else
            <a class="btn btn-subscribe btn-bottom btn-block" href="{{ route('subscriptions.plans')  }}">
                <i class="fa fa-bolt"></i> {{ __('Suscribirme y ver')}}
            </a>
        @endcan
      @else
        @can('view_film', $film)
            <a class="btn btn-subscribe btn-bottom btn-block" href="#">
                <i class="fa fa-bolt"></i> {{ __('Ver')}}
            </a>
        @else
            <a class="btn btn-subscribe btn-bottom btn-block" href="#">
              <i class="fa fa-bolt"></i> {{ __('Alquilar')}}
            </a>
        @endcan
      @endcan
  @else
    <a class="btn btn-subscribe btn-bottom btn-block" href="{{route('login')}}">
        <i class="fa fa-user"></i> {{ __('Acceder')}}
    </a>
  @endauth
</div>
