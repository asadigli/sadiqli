
<div class="col-lg-4">
  <aside class="right-sidebar">
    @if(4==5)
    <div class="widget">
      <form role="form">
        <div class="form-group">
          <input type="text" class="form-control" id="s" placeholder="Search..">
        </div>
      </form>
    </div>
    @endif
    <div class="widget">
      <h5 class="widgetheading">{{trans('app.categories')}}</h5>
      <ul class="cat">
        @foreach($cats = App\Category::all() as $cat)
        @php $cts = App\Catrelation::where('cat_id',$cat->id)->get() @endphp
                <li><i class="fa fa-angle-right"></i><a href="#" title="{{$cat->name}}">{{$cat->name}}</a><span> ({{count($cts)}})</span></li>
        @endforeach
      </ul>
    </div>
    <div class="widget">
      <h5 class="widgetheading">{{trans('app.latest_blogs')}}</h5>
      <ul class="recent">
        @foreach($blgss = App\Blog::orderBy('created_at','desc')->take(3)->get() as $bg)
        <li>
          <img src="/img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="{{$bg->title}}" />
          <h6><a href="/blog/{{$bg->slug}}" title="{{$bg->title}}">{{$bg->title}}</a></h6>
          <p><a href="/blog/{{$bg->slug}}" title="{{$bg->title}}">{!! str_limit(strip_tags($bg->body), $limit = 70, $end = '...') !!}</a></p>
        </li>
        @endforeach
      </ul>
    </div>
    @if(3==4)
    <div class="widget">
      <h5 class="widgetheading">{{trans('app.popular_tags')}}</h5>
      <ul class="tags">
        <li><a href="#">Web design</a></li>
        <li><a href="#">Trends</a></li>
        <li><a href="#">Technology</a></li>
        <li><a href="#">Internet</a></li>
        <li><a href="#">Tutorial</a></li>
        <li><a href="#">Development</a></li>
      </ul>
    </div>
    @endif
  </aside>
</div>
