@extends('lts.ms')
@section('head')
	<title>{{$page->short_name}}: Sadiqli</title>
	<meta name="description" content="{{$page->short_name}}: Sadiqli project" />
@endsection
@section('body')
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li><a href="#">Sadiqli</a><i class="icon-angle-right"></i></li>
							<li class="active">{{$page->short_name}}</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<ul class="page-list">
							@foreach($pgs = App\Page::where('active',1)->get() as $pg)
							<li><h4><a href="/page/{{$pg->slug}}">{{$pg->short_name}}</a> </h4></li>
							@endforeach
						</ul>
					</div>
					<div class="col-lg-8">
						<h4>{{$page->title}}</h4>
						<p>
							{!! $page->body !!}
						</p>
					</div>
				</div>
			</div>
		</section>
@endsection
@section('foot')
@endsection
