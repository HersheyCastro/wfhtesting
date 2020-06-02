@extends('portal.layouts.master')
@section('title', 'Quality Management System Portal - Announcements')
@section('content')
    <section id="content" class="section-padding" style="background-color:rgba(255,255,255,0);margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-section">
                        <h2 class="text-left" style="font-family:'Open Sans', sans-serif;">Announcements</h2>
                        <hr>
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                @forelse($announcements as $row)
                                    <li>
                                        <article class="entry-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img  @if($row->sPhoto != '')src="{{  asset('uploads/thumb') . '/'.  $row->sPhoto }}" @else src="{{asset('assets/img/tuv.png')}}" @endif class="img-responsive" style="margin-top:  10px;">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="entry-content" style="padding-right:  10px;">
                                                        <h4 class="entry-title style-03 "><a href="">{{$row->sTitle }}</a></h4>
                                                        <span> {{date('m/d/y ', strtotime($row->created_at))  }}</span>
                                                        {!! $row->sBody !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </article>

                                    </li>
                                    <hr>
                                @empty
                                    <li>
                                        <article class="entry-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="entry-content"  style="padding-right:  10px;">

                                                        <p>No Announcements</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </article>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('table', 'tables')
@section('javascript')

@stop