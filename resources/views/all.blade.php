@extends('lts.ms')
@section('head')
<meta name="description" content="Sadıqlı - bloq saytı"/>
<meta name="keywords" content="Blog, information, informasiya, media, texnologiya, dünya" />
<title>{{trans('app.all_blogs')}}</title>
<link rel="stylesheet" href="/css/sad.css">
@endsection
@section('body')
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
							<li class="active">{{trans('app.all_blogs')}}</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="heading capi">{{ trans('app.all_blog')}}</h4>
						<div id="filters-container" class="cbp-l-filters-button">
							<div data-filter="*" class="cbp-filter-item-active cbp-filter-item">{{ trans('app.all')}}
								<div class="cbp-filter-counter"></div>
							</div>
							@php $cats = App\Category::all() @endphp
							@foreach($cats as $cat)
							<div data-filter=".{{$cat->slug}}" class="cbp-filter-item">{{$cat->name}}
								<div class="cbp-filter-counter"></div>
							</div>
							@endforeach
						</div>
						<div id="grid-container" class="cbp-l-grid-projects">
							<ul>
								@php $blogs = App\Blog::all() @endphp
								@foreach($blogs as $blog)
								@php $catrel = App\Catrelation::where('blog_id',$blog->id)->get() @endphp
								<li class="cbp-item @foreach($catrel as $ct) @foreach($cats = App\Category::where('id',$ct->cat_id)->get() as $cat) {{$cat->slug}} @endforeach @endforeach">
									<div class="cbp-caption">
										<a href="/blog/{{$blog->slug}}" title="{{$blog->title}}">
											<div class="blog-small-image">
												<div class="v-blog-div"><span class="view-blog">{{$views = App\View::where('blog_id',$blog->id)->count()}} <i class="fa fa-eye"></i> </span></div>
												<div class="l-blog-div"><span class="like-blog">{{$like = App\Like::where('blog_id',$blog->id)->count()}} <i class="fa fa-thumbs-up"></i> {{$comms = App\Comment::where('blog_id',$blog->id)->count()}} <i class="fa fa-comments"></i></span></div>
												<img src="/uploads/blogs/small/{{$blog->image1}}" alt="{{$blog->title}}" title="{{$blog->title}}"/>
											</div>
										</a>
										<div class="cbp-caption-activeWrap">
											<div class="cbp-l-caption-alignCenter">
												<div class="cbp-l-caption-body">
													<a href="/blog/{{$blog->slug}}" class="blog-button" data-title="Blog" title="{{$blog->title}}">{{trans('app.detailed')}}</a>
												</div>
											</div>
										</div>
									</div>
									<div class="cbp-l-grid-projects-title">{{$blog->title}}</div>
									<div class="cbp-l-grid-projects-desc">
									@php
									$catrel = App\Catrelation::where('blog_id',$blog->id)->take(1)->get()
									@endphp
									@foreach($catrel as $ct)
									@php
									$cat = App\Category::where('id',$ct->cat_id)->get()
									@endphp @foreach($cat as $cat) {{$cat->name}} / @endforeach
									@php
									$sub = App\Subcat::where('id',$ct->subcat_id)->get()
									@endphp @foreach($sub as $sub) {{$sub->name}}  @endforeach
									@endforeach </div>
								</li>
								@endforeach
							</ul>
						</div>
						@if(1==2)
						<div class="cbp-l-loadMore-button">
							<a href="" class="more-button">LOAD MORE</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</section>
@endsection
@section('foot')
@endsection
