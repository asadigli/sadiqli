@extends('lts.ms')

@section('head')
  <title>{{ trans('app.send_suggest')}}: Sadiqli</title>
  <meta name="description" content="Blog saytı {{ trans('app.contact')}}" />
  <meta name="keywords" content="Blog saytı {{ trans('app.contact')}}" />
@endsection
@section('body')
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumb">
              <li><a href="/"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">{{__('app.Suggestions')}}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4 suggest-page">
            <h2>{{trans('app.why_send_suggestion')}}?</h2><hr>
            <span>
              @foreach($stats = App\Stats::where('type',"why_send_suggestion_text")->where('lang',config('app.locale'))->get() as $stat) {!! $stat->text !!} @endforeach</span>
          </div>
          <div class="col-md-8 suggest-page">
            <h2>{{ trans('app.send_your_suggestions_by_this_page')}}</small></h2>
            <hr>
            <center><div class="hidden_alert alert alert-success alert-dismissible" id="sent" style="display:none;"></div></center>
            <center><div class="hidden_alert alert alert-danger alert-dismissible" id="sent_failed" style="display:none;"></div></center>
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="@lang('app.your_name')..."/>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="@lang('app.your_email')..."/>
              </div>
                <input type="hidden" class="form-control" id="title" value="SUGGESTION"/>
              <div class="form-group">
                <textarea class="form-control" rows="5" id="message" placeholder="@lang('app.your_message')..."></textarea>
              </div>
              <div class="text-center"><button type="submit" id="send_mess" class="btn btn-theme pull-right capi">{{ trans('app.send_message')}}</button></div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('foot')
  <script type="text/javascript">
  jQuery(document).ready(function(){
    $( ".hidden_alert" ).empty().css('display','none');
    jQuery('#send_mess').click(function(e){
      e.preventDefault();
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
      jQuery.ajax({
        url: "/contact",
        method: 'POST',
        data: { name: jQuery('#name').val(), email: jQuery('#email').val(), title: jQuery('#title').val(), message: jQuery('#message').val(), },
          error: function(result){
            $( ".hidden_alert" ).empty().css('display','none');
            jQuery('#name').css('border','1px solid red');
            jQuery('#email').css('border','1px solid red');
            jQuery('#title').css('border','1px solid red');
            jQuery('#message').css('border','1px solid red');
            $( "#sent_failed" ).append( "<b>Zəhmət olmasa xanaları doldurun!</b>" ).css('display','').delay(8000).fadeOut();
        },
        success: function(result){
            $( ".hidden_alert" ).empty().css('display','none');
            jQuery('#name').css('border','1px solid #ccc').val("");
            jQuery('#email').css('border','1px solid #ccc').val("");
            jQuery('#title').css('border','1px solid #ccc').val("");
            jQuery('#message').css('border','1px solid #ccc').val("");
            $( "#sent" ).append( "Sizin məktubunuza tezliklə cavab veriləcək. Diqqətiniz üçün təşəkkür edirik!" ).css('display','').delay(13000).fadeOut();
      }});
    });
  });
  </script>
@endsection
