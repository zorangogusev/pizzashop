@extends('front.layouts.master')
@section('title','Contact Page')
@section('content')

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Contact <strong>Us</strong></h2>
                <iframe class="card card-body col-12" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5030.683593560931!2d22.640958332264212!3d41.43352852736576!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a9fe0d4c56a511%3A0xed3df354e2775225!2sPeking+Tepisi!5e0!3m2!1sen!2smk!4v1532271944802" style="border:0" allowfullscreen="" height="450" width="100%" frameborder="0"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>PizzaShop</p>
                        <p>Bulevar Makedonia</p>
                        <p>Strumica, Makedonija</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@pizzashop.com</p>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->

@endsection
