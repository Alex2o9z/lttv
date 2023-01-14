@extends('client.layouts.master')
@php
	$title = __('lang.pricing');
@endphp
@section('title',$title)

@section('content')
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{asset('public/frontend/img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Pricing</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Pricing</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- pricing -->
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- plan features -->
				<div class="col-12">
					<ul class="row plan-features">
						<li class="col-12 col-md-6 col-lg-4">1 month unlimited access!</li>
						<li class="col-12 col-md-6 col-lg-4">Stream on your phone, laptop, tablet or TV.</li>
						<li class="col-12 col-md-6 col-lg-4">1 month unlimited access!</li>
						<li class="col-12 col-md-6 col-lg-4">Thousands of TV shows, movies & more.</li>
						<li class="col-12 col-md-6 col-lg-4">You can even Download & watch offline.</li>
						<li class="col-12 col-md-6 col-lg-4">Thousands of TV shows, movies & more.</li>
					</ul>
				</div>
				<!-- end plan features -->

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Basic</span> <span>Free</span></div>
						<div class="price__item"><span>7 days</span></div>
						<div class="price__item"><span>720p Resolution</span></div>
						<div class="price__item"><span>Limited Availability</span></div>
						<div class="price__item"><span>Desktop Only</span></div>
						<div class="price__item"><span>Limited Support</span></div>
						<a href="#" class="price__btn">Choose Plan</a>
					</div>
				</div>
				<!-- end price -->

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price price--premium">
						<div class="price__item price__item--first"><span>Premium</span> <span>$19.99</span></div>
						<div class="price__item"><span>1 Month</span></div>
						<div class="price__item"><span>Full HD</span></div>
						<div class="price__item"><span>Lifetime Availability</span></div>
						<div class="price__item"><span>TV & Desktop</span></div>
						<div class="price__item"><span>24/7 Support</span></div>
						<a href="#" class="price__btn">Choose Plan</a>
					</div>
				</div>
				<!-- end price -->

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="price">
						<div class="price__item price__item--first"><span>Cinematic</span> <span>$39.99</span></div>
						<div class="price__item"><span>2 Months</span></div>
						<div class="price__item"><span>Ultra HD</span></div>
						<div class="price__item"><span>Lifetime Availability</span></div>
						<div class="price__item"><span>Any Device</span></div>
						<div class="price__item"><span>24/7 Support</span></div>
						<a href="#" class="price__btn">Choose Plan</a>
					</div>
				</div>
				<!-- end price -->
			</div>
		</div>
	</div>
	<!-- end pricing -->
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4 text-center">
			<div id="paypal-button"></div>
            <input type="hidden" id="vnd_to_usd" value="{{round(40,2)}}"></div>
		<div class="col-4"></div>
	</div>

	<!-- features -->
	<section class="section section--dark">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Our Features</h2>
				</div>
				<!-- end section title -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-tv feature__icon"></i>
						<h3 class="feature__title">Ultra HD</h3>
						<p class="feature__text">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-film feature__icon"></i>
						<h3 class="feature__title">Film</h3>
						<p class="feature__text">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-trophy feature__icon"></i>
						<h3 class="feature__title">Awards</h3>
						<p class="feature__text">It to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-notifications feature__icon"></i>
						<h3 class="feature__title">Notifications</h3>
						<p class="feature__text">Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-rocket feature__icon"></i>
						<h3 class="feature__title">Rocket</h3>
						<p class="feature__text">It to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
					</div>
				</div>
				<!-- end feature -->

				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-globe feature__icon"></i>
						<h3 class="feature__title">Multi Language Subtitles </h3>
						<p class="feature__text">Various versions have evolved over the years, sometimes by accident, sometimes on purpose.</p>
					</div>
				</div>
				<!-- end feature -->
			</div>
		</div>
	</section>
	<!-- end features -->

	<!-- partners -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Our Partners</h2>
				</div>
				<!-- end section title -->

				<!-- section text -->
				<div class="col-12">
					<p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
				</div>
				<!-- end section text -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/themeforest-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/audiojungle-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/codecanyon-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/photodune-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/activeden-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/3docean-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->
			</div>
		</div>
	</section>
	<!-- end partners -->
@if(Route::has('login'))
	@auth
		@php $id = Auth::user()->id; @endphp
	@endauth
@endif
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
   var usd = document.getElementById('vnd_to_usd').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AXFw73NvqsIrku_CExjG163IhMzOoJi2cHxyKsJ5k8lONI1j3tiLXVaeUELjJlSP0u78OPLhRTYn63Zl',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn bạn đã sử dụng dịch vụ!');
        location.replace("{{url('/pricing/payment')}}");
      });
    }
  }, '#paypal-button');

</script>
@endsection