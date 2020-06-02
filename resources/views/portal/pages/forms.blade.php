@extends('portal.layouts.master')
@section('title', 'Quality Management System Portal - Forms and Templates')
@section('content')
    <section id="content" class="section-padding" style="background-color:rgba(255,255,255,0);margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-section">
                        <h2 style="font-family:'Open Sans', sans-serif;">Forms and Templates</h2>
                        <hr>
                        <div class="table-responsive forms">
                            <table class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th><strong>Common Forms/Templates</strong><br></th>
                                        {{--<th>Type</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($record as $row)
                                    <tr>
                                        <td><a href="{{url('/uploads/'.$row->sFile)}}" target="_blank">{{$row->sTitle}}</a><br></td>
                                        {{--<td><i class="fa fa-download"></i><br></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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