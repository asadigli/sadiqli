@extends('lts.ms')

@section('head')
  <title>{{ trans('app.contact')}}: Sadiqli</title>
  <meta name="description" content="Blog site {{ trans('app.contact')}}" />
  <meta name="keywords" content="Blog site {{ trans('app.contact')}}" />
@endsection
@section('body')
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumb">
              <li><a href="/"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">{{__('app.contact_us')}}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2>{!! __('app.contact_page_text') !!}</h2>
            <hr>
            <center><div class="alert alert-success alert-dismissible" id="sent" style="display:none;">{{trans('app.contacted_text')}}</div></center>
            <center><div class="alert alert-danger alert-dismissible" id="sent_failed" style="display:none;">{{trans('app.failed_text_message')}}</div></center>
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="@lang('app.your_name')..."/>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="{{__('app.your_email')}}"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="title" id="title" placeholder="{{__('app.subject')}}"/>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" id="message" placeholder="{{__('app.your_message')}}"></textarea>
              </div>
              <div class="text-center"><button type="submit" id="send_mess" class="btn btn-theme btn-block btn-md capi">{{ trans('app.send_message')}}</button></div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('foot')
@endsection
