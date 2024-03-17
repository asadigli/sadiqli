@extends('lts.ms')
@section('head')
<title>{{trans('app.home')}} - Sadiqli</title>
<meta name="description" content="Sadıqlı - bloq saytı"/>
<meta name="keywords" content="Blog, information, informasiya, media, texnologiya, dünya" />
@endsection
@section('body')
@include('lts.slide')
<section class="callaction">
	<div class="container">
		<div class="row center">
				<div class="cta-text">
						<h2>@foreach($stats = App\Stats::where('type',"slide_title")->where('lang',config('app.locale'))->get() as $stat) {!! $stat->text !!} @endforeach</h2>
						@foreach($stats = App\Stats::where('type',"slide_text")->where('lang',config('app.locale'))->get() as $stat) {!! $stat->text !!} @endforeach
				</div>
		</div>
	</div>
</section>
<section id="content">
	<div class="container marginbot50">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading center capi">{{trans('app.latest_blogs')}}</h4>
				<div id="grid-container" class="cbp-l-grid-projects">
					<ul>
						@foreach($blogs as $blog)
						<li class="cbp-item">
							<div class="cbp-caption">
								<a href="/blog/{{$blog->slug}}">
									<div class="blog-small-image">
										<div class="v-blog-div"><span class="view-blog">{{$views = App\View::where('blog_id',$blog->id)->count()}} <i class="fa fa-eye"></i> </span></div>
										<div class="l-blog-div"><span class="like-blog">{{$like = App\Like::where('blog_id',$blog->id)->count()}} <i class="fa fa-thumbs-up"></i> {{$comms = App\Comment::where('blog_id',$blog->id)->count()}} <i class="fa fa-comments"></i></span></div>
										<img src="/uploads/blogs/small/{{$blog->image1}}" alt="{{$blog->title}}"/>
									</div>
								</a>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a href="/blog/{{$blog->slug}}" class="blog-button" title="Blog">{{trans('app.detailed')}}</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title">{{$blog->title}}</div>
							<div class="cbp-l-grid-projects-desc">
								@foreach($catrel = App\Catrelation::where('blog_id',$blog->id)->take(1)->get() as $ct) @foreach($cat = App\Category::where('id',$ct->cat_id)->get() as $cat) {{$cat->name}} / @endforeach
								@foreach($sub = App\Subcat::where('id',$ct->subcat_id)->get() as $sub) {{$sub->name}}  @endforeach
								@endforeach
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="cbp-l-loadMore-button">
					<a href="/all-blogs" class="more-button">{{__('app.More')}}</a>
				</div>
			</div>
		</div>
	</div>
@if(1 == 2)
	<!-- <div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<h4>How to do</h4>
						<div class="testimonialslide clearfix flexslider">
							<ul class="slides">
								<li>
									<blockquote>
										Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
									</blockquote>
									<h4>Daniel Dan <span>&#8213; MA System</span></h4>
								</li>
								<li>
									<blockquote>
										Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
									</blockquote>
									<h4>Mark Wellbeck <span>&#8213; AC Software </span></h4>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-lg-6">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#one" data-toggle="tab"><i class="icon-briefcase"></i> One</a></li>
							<li><a href="#two" data-toggle="tab">Two</a></li>
							<li><a href="#three" data-toggle="tab">Three</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="one">
								<p><img src="img/dummy1.jpg" class="pull-left" alt="" />
									<strong>Augue iriure</strong> dolorum per ex, ne iisque ornatus veritus duo. Ex nobis integre lucilius sit, pri ea falli ludus appareat. Eum quodsi fuisset id, nostro patrioque qui id. Nominati eloquentiam in mea.
								</p>
								<p>
									No eum sanctus vituperata reformidans, dicant abhorreant ut pro. Duo id enim iisque praesent, amet intellegat per et, solet referrentur eum et.
								</p>
							</div>
							<div class="tab-pane" id="two">
								<p><img src="img/dummy1.jpg" class="pull-right" alt="" /> Tale dolor mea ex, te enim assum suscipit cum, vix aliquid omittantur in. Duo eu cibo dolorum menandri, nam sumo dicit admodum ei. Ne mazim commune honestatis cum, mentitum phaedrum sit
									et.
								</p>
								<p>Lorem ipsum dolor sit amet, vel laoreet pertinacia at, nam ea ornatus ocurreret gubergren. Per facete graecis eu.</p>
							</div>
							<div class="tab-pane" id="three">
								<p>Lorem ipsum dolor sit amet, vel laoreet pertinacia at, nam ea ornatus ocurreret gubergren. Per facete graecis eu. </p>
								<p>
									Cu cum commodo regione definiebas. Cum ea eros laboramus, audire deseruisse his at, munere aeterno ut quo. Et ius doming causae philosophia, vitae bonorum intellegat usu cu.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
@endif
</section>
@endsection
@section('foot')
@endsection
