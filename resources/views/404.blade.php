@extends('lts.ms')
@section('head')
	<meta name="description" content="{{trans('app.page_not_found')}}: Sadiqli" />
	<meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE">
	<title>{{trans('app.page_not_found')}}</title>
@endsection
@section('body')
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li class="active">404 {{trans('app.page_not_found')}}</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-center">
							<h2 class="error">404</h2>
							<p class="lead">{{trans('app.page_not_found_text')}}</p>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
