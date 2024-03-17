@extends('lts.ms')
@section('head')
	<title>Blog</title>
	<meta name="description" content="Blog name: Sadiqli: {{$blog->title}}" />
	<meta name="keywords" content="@foreach($tags = App\Tag::where('blog_id',$blog->id)->take(5)->get() as $tag){{ $loop->first ? '' : ', ' }}{{$tag->tag}}@endforeach">
@endsection
@section('body')
		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<ul class="breadcrumb">
							<li><a href="#"><i class="fa fa-home"></i></a></li>
							@php
							$catrel = App\Catrelation::where('blog_id',$blog->id)->get()
							@endphp
							@foreach($catrel as $ct) @foreach($cat = App\Category::where('id',$ct->cat_id)->get() as $cat) <li>{{$cat->name}}</li>
							<li>@foreach($subs = App\Subcat::where('id',$ct->subcat_id)->get() as $sub) {{$sub->name}} @endforeach</li> @endforeach @endforeach
							<li class="active">{!! str_limit($blog->title, $limit = 20, $end = '...') !!}</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<article>
							<div class="post-image">
								<img src="/uploads/blogs/{{$blog->image1}}" alt="{{$blog->title}}" class="img-responsive" />
								<div class="bottom-article">
									<ul class="meta-post">
										<li><i class="fa fa-calendar"></i><a href="#"> {{date('M d, Y', strtotime($blog->created_at))}}</a></li>
										<li><i class="fa fa-user"></i><a href="#"> Azad Sadiqli</a></li>
										@if($tags = App\Tag::where('blog_id',$blog->id)->take(5)->count() != 0)<li><i class="fa fa-tags"></i>
											@foreach($tags = App\Tag::where('blog_id',$blog->id)->take(5)->get() as $tag) {{ $loop->first ? '' : ', ' }} <a href="#"> {{$tag->tag}}</a> @endforeach
										</li>@endif
									</ul>
								</div>
								<div class="post-heading">
									<h3>{{$blog->title}}</h3>
								</div>
							</div>
							{!! $blog->body !!}
							<div class="bottom-article" id="LikeSectionUpdate">
								<ul class="meta-post">
									<li><a href="#LButModal" data-toggle="modal"><i class="fa fa-thumbs-up"></i></a> {{$like = App\Like::where('blog_id',$blog->id)->count()}} {{trans('app.like_number')}} </li>
								</ul>
							</div>
							<div class="modal fade" id="LButModal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
												<a class="close" data-dismiss="modal" aria-label=""><span>×</span></a>
										 </div>
										 <div class="modal-body">
											 <div class="like_div">
												 <h4> {{trans('app.please_fill_blanks')}} </h4>
												 <div class="alert alert-danger alert-dismissible" id="blog_like_failed" style="display:none;">{{trans('app.failed_text_message')}}</div>
												 <input type="hidden" id="like_blog_id" value="{{$blog->id}}">
												 <input type="text" id="blog_like_name" class="form-control" placeholder="* {{trans('app.enter_name')}}"><br>
												 <input type="text" id="blog_like_email" class="form-control" placeholder="* {{trans('app.enter_email_address')}}"><br>
												 <a href="#" id="LikeBlog" class="btn btn-success pull-right">{{trans('app.like_it')}}</a><br><br>
											 </div>
											 <div class="thank-you-pop" id="blog_liked" style="display:none;">
													<img src="/img/success.png" alt="Thank you!">
													<h1>{{trans('app.thank_you')}}</h1>
													<p> {{trans('app.your_submission_is_received')}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</article>
						<div class="comment-area">
							<div id="divToReload">
								<h4>{{trans('app.comment_number')}} ({{$comments = App\Comment::where('blog_id',$blog->id)->count()}})</h4>
								@foreach($comments = App\Comment::where('blog_id',$blog->id)->whereNull('reply_id')->orderBy('created_at','asc')->get() as $comment)
								<div class="media">
									<a class="pull-left"><img src="/img/avatar.png" title="{{trans('app.commenter')}}" alt="{{trans('app.commenter')}}" class="img-circle" /></a>
									<div class="media-body">
										<div class="media-content">
											<h6>{{$comment->name}} <small>{{date('M d, Y', strtotime($comment->created_at))}}</small>
												@if(4==5)<a href="#{{$comment->token}}" data-toggle="modal" class="pull-right btn"><i class="fa fa-trash"></i></a>@endif
											</h6>
											<p>{{$comment->comment}}</p>
											@if(1 == 2)
											<!-- <a id="reply" class="align-right reply">Reply</a>
											<div class="input-group"id="reply-text" style="display:none;">
												<span class="input-group-addon">@Michael</span>
												<input type="text" class="form-control" placeholder="Password">
												<span class="input-group-addon btn btn-success">Sent</span>
											</div> -->
											@endif
										</div>
										@foreach($rep_coms = App\Comment::where('reply_id',$comment->id)->orderBy('created_at','asc')->get() as $rep_com)
										<div class="media">
											<a class="pull-left" title="{{trans('app.commenter')}}"><img src="/img/avatar.png" alt="{{trans('app.commenter')}}" class="img-circle" /></a>
											<div class="media-body">
												<div class="media-content">
													<h6>{{$rep_com->name}} <span class="v-prof" title="Admin Profile">&#x2714;</span> <small>{{$rep_com->created_at->diffForHumans()}}</small></h6>
													<p>{!! $rep_com->comment !!}</p>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
								@if(4==5)
								<div class="modal fade" id="{{$comment->token}}" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
													<a href="#" class="close" data-dismiss="modal" aria-label=""><span>×</span></a>
											 </div>
											 <div class="modal-body">
												 <div class="like_div">
													 <h4> {{trans('app.please_fill_blanks')}} </h4>
													 <div class="alert alert-danger alert-dismissible" id="blog_like_failed" style="display:none;">{{trans('app.failed_text_message')}}</div>
													 <input type="hidden" id="like_blog_id" value="{{$blog->id}}">
													 <input type="text" id="blog_like_name" class="form-control" placeholder="* {{trans('app.enter_name')}}"><br>
													 <input type="text" id="blog_like_email" class="form-control" placeholder="* {{trans('app.enter_email_address')}}"><br>
													 <a href="#" id="LikeBlog" class="btn btn-success pull-right">{{trans('app.like_it')}}</a><br><br>
												 </div>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
							<div class="marginbot30"></div>
							<h4>{{trans('app.leave_a_comment_here')}}</h4>
		            <div class="alert alert-success alert-dismissible" id="comment_sent" style="display:none;">{{trans('app.comment_added_text')}}</div>
		            <div class="alert alert-danger alert-dismissible" id="comment_sent_failed" style="display:none;">{{trans('app.failed_text_message')}}</div>
								<input type="hidden" class="form-control" id="comment_blog_id" value="{{$blog->id}}">
								<div class="form-group">
									<input type="text" class="form-control" id="comment_name" placeholder="* {{trans('app.enter_name')}}" maxlength="100" minlenth="2">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="comment_email" placeholder="* {{trans('app.enter_email_address')}}" maxlength="100" minlenth="2">
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="8" id="comment_body" placeholder="* {{trans('app.your_comment_here')}}"  maxlength="1000" minlenth="10"></textarea>
								</div>
								<a href="#" id="AddComment" class="btn btn-theme btn-md pull-right capi">{{trans('app.share')}}</a>
						</div>
						<div class="clear"></div>
					</div>
					@include('lts.blogside')
				</div>
			</div>
		</section>
@endsection
@section('foot')
@endsection
