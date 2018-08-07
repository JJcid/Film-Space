<div class="col-md-4">
  <div class="card">
    <div class="card-header">{{ __('Socialite') }}</div>
    <div class="card-body">

      <!-- <a href="{{ route('social_auth', ['social_network_name' => 'facebook']) }}"
         class="btn btn-facebook btn-lg btn-block"  
      >
        {{ __('Facebook') }} <i class="fa fa-facebook"></i>
      </a>

      <a href="{{ route('social_auth', ['social_network_name' => 'twitter']) }}"
         class="btn btn-twitter btn-lg btn-block"  
      >
        {{ __('Twitter') }} <i class="fa fa-twitter"></i>
      </a> -->

      <a href="{{ route('social_auth', ['social_network_name' => 'google']) }}"
         class="btn btn-google btn-lg btn-block"  
      >
        {{ __('Google') }} <i class="fa fa-google"></i>
      </a>

      <a href="{{ route('social_auth', ['social_network_name' => 'github']) }}"
         class="btn btn-github btn-lg btn-block"
      >
        {{ __('Github') }} <i class="fa fa-github"></i>
      </a>

    </div>
  </div>
</div>