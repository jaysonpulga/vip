@extends('frontend.layouts.main')

@section('content')

<!--// div secondpanel -->
	@include('frontend.layouts.secondpanel')  
<!--  ~end secondpanel -->

<!--// div how does work modal -->
	@include('frontend.offer_dashboard.howdoeswork')  
<!--  ~end how does work modal -->



@if((@$current_offer > 0) || (@$featured_offer > 0 ))
	
<div>@include('frontend.offer_dashboard.current_active_deals')</div>

<div>@include('frontend.offer_dashboard.featured_review_deals')</div>

<div>@include('frontend.offer_dashboard.compare_deals')</div>

@else
<div class='row'>
	<div class="col-lg-12">
		<div class="jumbotron jumbotronText" >
			<div class="container">
				<h1 class="display-4"> Hello, {{Auth::user()->name}} </h1>
				<p class="lead"> 
				    We will send you new offers soon!
				</p>
			</div>
		</div>
	</div>
</div>
@endif	



@endsection