@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  {{-- <section class="">
  <div class="page-title text-center" style="background: url('{{ $generalInfo->bradcrum_photo }}') no-repeat left center #d0af5f;">
      <div class="contact_tag1 text-center text-bold">Our Privacy Policy</div>
      <hr class="hr_for_all">
  </div>
</section> --}}
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="block">
            <h2>Out Desclaimer</h2>
            <div class="privacy_text text-justify">
              {!! $desclaimer->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
