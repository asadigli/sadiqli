<section id="featured" class="bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="main-slider" class="main-slider flexslider">
					<ul class="slides">
						@foreach($sls = App\Slide::where('slide_active',1)->get() as $sl)
						<li>
							<img src="/uploads/slides/{{$sl->slide_image}}" alt="{{$sl->slide_title}}"/>
							<div class="flex-caption">
								<h3>{{$sl->slide_title}}</h3>
								{!! $sl->slide_text !!}
								@if($sl->button_active == 1)
								@php($bt = $sl->button_type)
								<a href="{{$sl->button_link}}" class="btn @if($bt == 1) btn-danger @elseif($bt == 2) btn-success @elseif($bt == 3) btn-primary @else btn-warning @endif">
								{{$sl->button_name}}</a>
								@endif
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
