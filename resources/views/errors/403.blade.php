

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

        @if( isset(Auth::user()->name))
				<div class="login-box">
				 <h1 class="text-center">BIENVENID@ <br>
				<strong>{{Auth::user()->name}} </strong></h1>
				<figure class="figure">
            <img src="{{ asset('img/logo.png') }}" width="100%" class="figure-img img-fluid rounded" alt="logo">
        </figure>
			  </div>
				@else
				<div class="login-box">
				<h1 class="text-center">Por favor inicia sesión con tu cuenta</h1>
				<figure class="figure">
						<img src="{{ asset('img/logo.png') }}" width="100%" class="figure-img img-fluid rounded" alt="logo">
				</figure>
			  </div>
				@endif
			</div>
		</div>
	</div>

