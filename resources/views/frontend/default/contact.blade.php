@extends('frontend.layout')

@if(isset($contact_seo_title) && $contact_seo_title != "")
        @section('title_seo',$contact_seo_title)
    @elseif(isset($settings_title) && $settings_title != "")
        @section('title_seo',$settings_title)
@endif

@if(isset($contact_seo_description) && $contact_seo_description != "")
    @section('description_seo',$contact_seo_description)
@elseif(isset($settings_description) && $settings_description != "")
    @section('description_seo',$settings_description)
@endif

@section('contactSelect','active')

@section('container')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">İletişim <small>Bize Ulaşın</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home.index')}}">Anasayfa</a>
            </li>
            <li class="breadcrumb-item active">İletişim</li>
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            @if(isset($contact_gmaps))
                <div class="col-lg-8 mb-4 googleMaps">
                    {!! $contact_gmaps !!}
                </div>
            @endif
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3 class="contactTitles">İletişim Bilgileri</h3>

                @if(isset($contact_adres))
                    <p>
                        <b>Adres:</b> {!! $contact_adres !!}
                    </p>
                @endif

                @if(isset($contact_phone))
                    <p>
                        <b>Tel:</b> <a href="tel:{{$contact_phone}}" title="{{$contact_phone}}">{{$contact_phone}}</a>
                    </p>
                @endif
                @if(isset($contact_phone_two))
                    <p>
                        <b>Tel 2:</b> <a href="tel:{{$contact_phone_two}}" title="{{$contact_phone_two}}">{{$contact_phone_two}}</a>
                    </p>
                @endif
                @if(isset($contact_mail))
                    <p>
                        <b>E-Posta:</b> <a href="mailto:{{$contact_mail}}" title="{{$contact_mail}}">{{$contact_mail}}</a>
                    </p>
                @endif
                @if(isset($contact_mail_two))
                    <p>
                        <b>E-Posta 2:</b> <a href="mailto:{{$contact_mail_two}}" title="{{$contact_mail_two}}">{{$contact_mail_two}}</a>
                    </p>
                @endif
                @if(isset($contact_addinformation))
                    <div>
                        {!! $contact_addinformation !!}
                    </div>
                @endif

                @if(isset($socialHtml))

                    <hr>

                    <h3 class="contactTitles">Sosyal Medya</h3>

                    <div class="socialMedia contactPage">
                        <ul>{!! $socialHtml !!}</ul>
                    </div>
                @endif


            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

        @if(isset($contact_form_has) && $contact_form_has == 1)

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="errorTahtasi">
                        @foreach($errors->all() as $ekey)
                            <li>{{$ekey}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('success'))
                <div id="successmessage"></div>
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <h3>İletişim Formu</h3>

                    <form name="sentmessage" action="{{route('contactsend')}}" method="POST" >
                        @csrf
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Ad Soyad:</label>
                                <input type="text" class="form-control" value="{{old('name')}}" placeholder="Ad Soyad" id="name" name="name" required >
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Telefon Numarası:</label>
                                <input type="tel" class="form-control" value="{{old('phone')}}" id="phone" placeholder="Telefon Numarası" name="phone" require>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Email:</label>
                                <input type="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Konu:</label>
                                <input type="subject" class="form-control" value="{{old('subject')}}" id="subject" placeholder="Konu" name="subject" required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Mesaj:</label>
                                <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Mesajınızı girin" required maxlength="999" style="resize:none">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages -->

                        <input type="submit" name="gonder" class="btn btn-primary" value="Gönder" >
                    </form>
                </div>

            </div>
            <!-- /.row -->
        @endif
    </div>
    <!-- /.container -->
@endsection

@section('css') @endsection

@section('js') @endsection