@extends('portal.layouts.master')
@section('title', 'PCIEERD eProposals - Frequently Ask Questions')
@section('content')
    <section id="content" class="section-padding" style="background-color:rgba(255,255,255,0);margin-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-section">
                        <h2 class="article-title" style="font-family:'Open Sans', sans-serif;">Frequently Ask Questions</h2>
                        <hr>
                        {{--<div class="table-responsive forms">--}}
                            {{--<table class="table table-striped table-hover datatable">--}}
                                {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>Frequently Ask Questions<br></th>--}}
                                        {{--<th>Q<br></th>--}}
                                        {{--<th><strong>Type</strong><br></th>--}}
                                    {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                    {{--@foreach ($faqs as $row)--}}
                                    {{--<tr>--}}
                                        {{--<td><a href="{{url('/uploads/'.$row->sFile)}}" target="_blank">{{$row->sTitle}}</a><br></td>--}}
                                        {{--<td>{{$row->iYear}}</td>--}}
                                        {{--<td><i class="fa fa-download"></i><br></td>--}}
                                    {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        <div>

                            <p><strong>Q. What is e-Proposals?</strong></p>
                            <p><strong>A. e-Proposals</strong>is a web-based application that allows Proponents to submit &amp; check the status of project proposals on-line .</p>
                            <p><strong>Q. What are the requirements of e-Proposals?</strong></p>
                            <p><strong>A. e-Proposals</strong>requires the following:</p>
                            <ol>
                                <li>Connection to the Internet - you may submit your proposals anytime, anywhere using an internet connection.<br /><br /></li>
                                <li>Registration to our on-line proposal submission - You must first sign up in order to have a User ID and Password to log on to the<strong>e-Proposals</strong>
                                    <p>Registration is<strong>FREE</strong>.</p>
                                    <p>Before you register, be sure that you have read the<strong>Call for Proposals</strong>found at the<a href="http://www.pcieerd.dost.gov.ph/">PCIEERD website</a>.</p>
                                    <p>During registration you should provide your valid e-mail address for the receipt of PCIEERD&#39;s acknowledgement letter.</p>
                                </li>
                                <li>Properly Filled-up OFFLINE FORMS:
                                    <ul>
                                        <li><a href="http://111.125.126.132/eProposals/downloads/2019-Revised-DOST-GIA-Form-2A-Detailed-Program.doc">PCIEERD-DOST Form 2A</a>for submission of Program Proposal;</li>
                                        <li><a href="http://111.125.126.132/eProposals/downloads/2019-Revised-DOST-GIA-Form-2B-Detailed-Project.doc">PCIEERD-DOST Form 2B</a>for submission of Project Proposal and/or Program Component Projects</li>
                                    </ul><br />Other Forms to be submitted:
                                    <ul>
                                        <li><a href="http://111.125.126.132/eProposals/downloads/2019-Revised-DOST-GIA-Form-B-Workplan.doc">PCIEERD-DOST FORM B (Workplan)</a>or submission of Project Proposal and/or Program Component Projects</li>
                                        <li><a href="http://111.125.126.132/eProposals/downloads/GAD_Checklist_1_for_ICT.xls">GAD Checklist 1: For ICT Project</a>for submission of GAD related checklist for<strong>ICT</strong>Project Proposal and/or Program Components.</li>
                                        <li><a href="http://111.125.126.132/eProposals/downloads/GAD_Checklist_2_for_Non_ICT.xls">GAD Checklist 2: For Non-ICT Project</a>for submission of GAD related checklist for<strong>Non-ICT</strong>Project Proposal and/or Program Components.</li>
                                    </ul>
                                </li>
                            </ol>
                            <p><strong>Q. What are the guidelines for file submission?</strong></p><strong>A.</strong>
                            <ol>
                                <li>You are allowed to submit one (1) Project Proposal at a time and minimum of two (2) Project Proposals per Program.</li>
                                <li>Only Excel (.xls) and PDF (.pdf) format are allowed for uploading, depending on the type of forms to be submitted.</li>
                                <li>Before uploading files, be sure to check the list of files uploaded to avoid duplication.</li>
                            </ol>
                            <p><br /><strong>Q. After registration, what&#39;s next?</strong></p>
                            <p><strong>A.</strong>After registration, you must activate your account by clicking the link sent to your email. Once you have activated your account you may now proceed to the log in page. Type your User ID and Password to access the submission facility.
                                Once logged in, you will be provided with a page containing links to the following:</p>
                            <ol>
                                <li>Guidelines for Uploading - contains the rules in submitting a project proposal file<strong>(MUST READ)</strong></li>
                                <li>Search Projects - allows users to check if you have proposals with the same title as that of the existing projects of PCIEERD</li>
                                <li>Submit Proposal - page where you submit a project proposal</li>
                                <li>Proposal Status - provides information on the status of your project proposals, allows you to resubmit files for a particular proposal when advised For Revisions.</li>
                                <li>Help - provides a step by step guide to help you submit your proposal successfully.</li>
                                <li>Downloads - contains downloadable forms for submission.</li>
                                <li>Account Settings - enables users to update email address, password and account retrieval information.</li>
                                <li>Personal Information - enables users to update personal information.</li>
                                <li>Sign Out - logs out the user from the system for security reasons.</li>
                            </ol><br />
                            <p><strong>Q. What should I do if I forgot my User ID or Password?</strong></p>
                            <p><strong>A.</strong>On the log in page of the<strong><em>e</em>-Proposals</strong>, click the link to &quot;Forgot your password&quot; which will direct you to a page where you will be asked to supply the e-mail address you provided during your registration.
                                After clicking the submit button, an electronic mail will be sent to you containing the link to change your password.</p>
                            <p></p>
                            <hr />
                            <h3 style="font-family:'Open Sans', sans-serif;"><strong>Can&#39;t find what you are looking for?</strong></h3>
                            <p>Leave us a message by clicking on the<strong>Leave a message</strong>located at the bottom section of the page. This also function as live chat messaging should an agent is available.</p>
                            <p>You may send us your question at<a href="mailto:george.monroyo@gmail.com">george.monroyo@gmail.com</a>, we will be glad to assist you. For project related issues/queries, please send them directly to the assigned Project Officer.</p>
                            <p></p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('table', '')
@section('javascript')

@stop