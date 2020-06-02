@extends('portal.layouts.master')
@section('title', 'e-Proposals')
@section('css')
    <style>
        .xs-banner, .call-to-action-section {
            /*background: rgba(11,156,215,1);*/
            /*color: #fff;*/
            /*background: linear-gradient(to right, #CF9529, #ED9C05,#ED9C05,#CF9529,#CF9529) !important;*/
            background-image:url('http://111.125.126.138/eventregistration2/banner.jpg');background-position:center; opacity: 1.5; background-size:cover !important;);
        }
        .xs-banner {

            /*background: #009685;*/
            /*background: -moz-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(204,24,30,1) 0%, rgba(204,24,30,1) 36%, rgba(241,111,92,1) 72%, rgba(204,24,30,1) 100%);*/
            /*background: -webkit-gradient(left top, right top, color-stop(0%, rgba(248,80,50,1)), color-stop(0%, rgba(204,24,30,1)), color-stop(36%, rgba(204,24,30,1)), color-stop(72%, rgba(241,111,92,1)), color-stop(100%, rgba(204,24,30,1)));*/
            /*background: -webkit-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(204,24,30,1) 0%, rgba(204,24,30,1) 36%, rgba(241,111,92,1) 72%, rgba(204,24,30,1) 100%);*/
            /*background: -o-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(204,24,30,1) 0%, rgba(204,24,30,1) 36%, rgba(241,111,92,1) 72%, rgba(204,24,30,1) 100%);*/
            /*background: -ms-linear-gradient(left, rgba(248,80,50,1) 0%, rgba(204,24,30,1) 0%, rgba(204,24,30,1) 36%, rgba(241,111,92,1) 72%, rgba(204,24,30,1) 100%);*/
            /*background: linear-gradient(to right, rgba(248,80,50,1) 0%, rgba(204,24,30,1) 0%, rgba(204,24,30,1) 36%, rgba(241,111,92,1) 72%, rgba(204,24,30,1) 100%);*/
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f85032', endColorstr='#cc181e', GradientType=1 );
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f6290c', endColorstr='#e73827', GradientType=1 );
            min-height: 600px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .epropwelcome {
            font-style: italic;
            /*color: #3399FF;*/
            color: #FFF;

            font-size: 25px;
            /* text-shadow: 0px 0px 3px #666, -3px 5px 10px #ccc; */
            letter-spacing: 0.0625em;
            font-family: "Times New Roman", Times, serif;
            /* text-shadow: -1px 0 #666, 0 1px #666, 1px 0 #666, 0 -1px #666; */
            text-shadow: 0px 0px 13px #eee, -3px 5px 10px #666;
        }

        .btn-outline-primary {
            color: #FFFFFF;
            border-color: #FFFFFF;
        }

        .embed-responsive-100x400px{
            padding-bottom: 400px;
        }

        @media (max-width: 767px) {
            ul.navbar-right{
                background-color:#48b685 !important;
            }

            .navbar-brand > img {
                width: 250px;
                margin-left: 10px !important;
            }
        }



    </style>

    @endsection
@section('content')

   <header id="head">
        <div class="container text-center hidden">
            <div class="row">
                <div class="col-lg-offset-3 col-md-6">
                    <h1 class="text-left lead">Welcome to PCIEERD API!</h1>
                    <p class="text-center tagline">This system was designed to provide a venue for submission of project proposals on-line. At a click of a mouse and at the comfort of your desk, you can now submit your proposals for PCIEERD's funding.<br></p>
                    <p><a class="btn btn-default btn-default" role="button">SIGN UP</a><a class="btn btn-action btn-action" role="button">LEARN MORE</a></p>
                </div>
            </div>
        </div>
    </header>
    <div class="container text-center">
        <h2>PCIEERD API</h2>
        <p class="text-muted"><br>this collection is a great place to start exploring APIs that are free to use, specifically updated for 2019<br></p>
    </div>
    <div class="map-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Visit us</h2>
                <p class="text-center">4th and 5th Level, Science Heritage Bldg., DOST Complex, Gen. Santos Ave., Bicutan 1631, Sibol St, Taguig, Metro Manila<br></p>
            </div>
        </div><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB7Qwmj4NkNYUU9a6gDgqkoNMGlljjyNjs&amp;q=Philippine+Council+for+Industry%2C+Energy+and+Emerging+Technology+Research+and+Development%2C+4th+and+5th+Level%2C+Science+Heritage+Bldg.%2C+DOST+Complex%2C+Gen.+Santos+Ave.%2C+Bicutan+1631%2C+Sibol+St%2C+Taguig%2C+Metro+Manila&amp;zoom=15"
            width="100%" height="450"></iframe></div>


@endsection

@section('javascript')
<script>

</script>
@stop