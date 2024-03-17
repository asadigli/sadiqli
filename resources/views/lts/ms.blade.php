<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="Azad Sadigli">
	<meta name="_token" content="{{csrf_token()}}" />
	<link rel="shortcut icon" type="image/x-icon" href="//cdn.sadiq.li/img/logo.png" />
	<link rel="stylesheet" href="//cdn.sadiq.li/css/sad.min.css">
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@section('head')
@show
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="navbar navbar-default navbar-static-top" id="myHeader">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
						<a class="navbar-brand sad-head-logo" href="/">Sad<span>Blog</span></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="@if(Request::path() == '/') active @endif"><a href="/">{{trans('app.home')}}</a></li>
							<li class="">
								<a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">{{trans('app.more')}} <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="/suggest-new-topic">{{trans('app.suggest_topic')}}</a></li>
										@foreach($pgs = App\Page::where('active',1)->where('header',1)->get() as $pg)
										<li><a class="capi" href="/page/{{$pg->slug}}">{{$pg->short_name}}</a></li>
										@endforeach
								</ul>
							</li>
							<li class="@if(Request::path() == 'all-blogs') active @endif"><a href="/all-blogs">{{trans('app.all_blogs')}}</a></li>
							<li class="@if(Request::path() == 'contact') active @endif"><a href="/contact">{{trans('app.contact')}}</a></li>
							@if(1 == 3)
							<li class="dropdown s-but">
                  <a href="#" class="dropdown-toggle btn-sadi" data-toggle="dropdown"> <i class="fa fa-search"></i></a>
                  <ul class="dropdown-menu pull-right" role="menu" style="left:">
                    <li>
											<input type="text" class="form-control" style="width:400px;" placeholder="Enter keywords..." name="" value="">
										</li>
                    </ul>
              </li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</header>
@section('body')
@show
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>{{trans('app.information')}}</h4>
							<ul class="link-list">
								@foreach($pgs = App\Page::where('active',1)->where('footer',1)->where('footer_loc',"info")->get() as $pg)
								<li><a class="capi" href="/page/{{$pg->slug}}">{{$pg->short_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>{{trans('app.guidance')}}</h4>
							<ul class="link-list">
								<li><a class="capi" href="/suggest-new-topic">{{trans('app.suggest_topic')}}</a></li>
								@foreach($pgs = App\Page::where('active',1)->where('footer',1)->where('footer_loc',"guid")->get() as $pg)
								<li><a class="capi" href="/page/{{$pg->slug}}">{{$pg->short_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>{{trans('app.pages')}}</h4>
							<ul class="link-list">
								<li><a href="https://solutions.sadiqli.com/">SadSolutions</a></li>
								@foreach($pgs = App\Page::where('active',1)->where('footer',1)->where('footer_loc',"page")->get() as $pg)
								<li><a class="capi" href="/page/{{$pg->slug}}">{{$pg->short_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="widget">
							<h4>{{ trans('app.subscribe')}}</h4>
							@foreach($stats = App\Stats::where('type',"subscribe_text_part")->where('lang',config('app.locale'))->get() as $stat) {!! $stat->text !!} @endforeach
		            <div class="hidden_alert alert alert-success" id="subs_sent" style="display:none;"></div>
		            <div class="hidden_alert alert alert-danger" id="subs_sent_failed" style="display:none;"></div>
							<div class="form-group multiple-form-group input-group">
								<input type="email" placeholder="* {{trans('app.email')}}..." name="email" class="form-control" id="SubscribeEmail">
								<span class="input-group-btn">
                    <button type="button" id="AddSubscription" class="SubE-button btn btn-theme btn-add">{{trans('app.subscribe')}}</button>
                </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sub-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="copyright">
								<p>{{date('Y')}} &copy; Sadiqli </p>
							</div>
						</div>
						@if(1==3)
						<div class="col-lg-6">
							<ul class="social-network">
								<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
		</footer>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<script src="//cdn.sadiq.li/js/sad.min.js"></script>
  @section('foot')
  @show
</body>
</html>
