@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="text-center">
            <h3>Contact Us Here</h3>
          </div>
          <div class="block">

            <form action="">
              @csrf
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="" class="font-weight-bold">Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                </div>
                <div class="form-group col-lg-6">
                  <label for="" class="font-weight-bold">Email</label>
                  <input type="email" name="email" id="" class="form-control" placeholder="Enter Email..." value="{{ old('email') }}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label for="" class="font-weight-bold">Phone</label>
                  <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone..." value="{{ old('phone') }}">
                </div>
                <div class="form-group col-lg-6">
                  <label for="" class="font-weight-bold">Subject</label>
                  <input type="text" name="subject" id="" class="form-control" placeholder="Enter Subject..." value="{{ old('subject') }}">
                </div>
              </div>
                <div class="form-group">
                  <label for="" class="font-weight-bold">Message</label>
                  <textarea name="message" class="form-control" rows="7" placeholder="Enter Your Message Here...">{{ old('message') }}</textarea>
                </div>
            </form>
          </div>

        </div>
        <div class="col-lg-3">
          <div class="gap-50"></div>
          @include('frontend.advertise.add1')
        </div>
      </div>
    </div>
  </section>
@endsection
