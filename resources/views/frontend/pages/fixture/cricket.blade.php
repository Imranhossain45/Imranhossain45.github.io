@extends('layouts.frontend.master')
@section('content')
  <section class="block-wrapper page_sec_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">

          <div class="single-post block">

            <div class="post-title-area">

              <div class="score_topbar">
                <div>
                  <a href="{{ route('index') }}" style="color: white">Home</a>
                </div>
                <div>
                  Cricket Fixture
                </div>
              </div>
            </div><!-- Post title end -->


            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs cricket_fixture_nav_tav score_nav_tabs justify-content-between">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#home"
                    onclick="getInternationalMatch()">International</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Scorecard"
                    onclick="getLeagueMatch()">League</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Commentry" onclick="getDomesticMatch()">Domestic</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Squads" onclick="getWomenMatch()">Women</a>
                </li>

              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="block mt-4">
                    <div class="text-center">
                        <center>
                          <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </center>
                      </div>
                    <div class="row" id="international_schedule">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Scorecard">
                  <div class="block mt-4">
                     <div class="text-center">
                        <center>
                          <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </center>
                      </div>
                    <div class="row" id="league_schedule">
                     

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Commentry">
                  <div class="block mt-4">
                    <div class="text-center">
                        <center>
                          <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </center>
                      </div>
                    <div class="row" id="domestic_schedule">
                      

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Squads">
                  <div class="block mt-4">
                    <div class="text-center">
                        <center>
                          <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                          </div>
                        </center>
                      </div>
                    <div class="row" id="women_schedule">
                      

                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- Single post end -->
          <div class="gap-30"></div>



          <div class="gap-30"></div>

        </div><!-- Content Col end -->



        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>

      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- First block end -->
@endsection
@push('script')
  <script>
    function getInternationalMatch() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('international.schedule') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $("#international_schedule").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    };

    function getLeagueMatch() {
      
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('league.schedule') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          
          if (response.success) {
            $("#league_schedule").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
         
        }
      });
    };
    function getDomesticMatch() {
    
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('domestic.schedule') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
       
          if (response.success) {
            $("#domestic_schedule").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
         
        }
      });
    };

    function getWomenMatch() {
      
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('women.schedule') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $("#women_schedule").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
         
        }
      });
    };

    $(document).ready(() => {
      getInternationalMatch();
    });
  </script>
@endpush
