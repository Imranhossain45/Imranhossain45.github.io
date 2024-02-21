@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            <h3>
              Men's Team Ranking
            </h3>
            <div class="row">


              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>Test Team Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody id="icc_test_team_rank_short">
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
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ranking_test') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>ODI Team Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody id="icc_odi_team_rank_short">
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
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ranking_odi') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>T20I Team Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody id="icc_t20_team_rank_short">
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
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ranking_t20') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>

            </div>

            <h3 class="">
              Men's Batting Ranking
            </h3>
            <div class="row">
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>Test Batting Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_test_batter_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_batter_ranking_test') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>ODI Batting Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_odi_batter_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_batter_ranking_odi') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>T20I Batting Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_t20_batter_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_batter_ranking_t20') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>

            </div>
            <h3 class="">
              Men's Bowling Ranking
            </h3>
            <div class="row">
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>Test Bowling Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_test_bowler_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_bowler_ranking_test') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block">
                  <h4>ODI Bowling Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_odi_bowler_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_bowler_ranking_odi') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block">
                  <h4>T20I Bowling Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_t20_bowler_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_bowler_ranking_t20') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>

            </div>
            <h3 class="">
              Men's All Rounder Ranking
            </h3>
            <div class="row">
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>Test All-Rounder Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_test_ar_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ar_ranking_test') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 mb-5">
                <div class="block shadow-sm">
                  <h4>ODI All-Rounder Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_odi_ar_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ar_ranking_odi') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="block shadow-sm">
                  <h4>T20I All-Rounder Ranking</h4>
                  <div class="table-responsive">
                    <table class="table table-striped mt-2">
                      <thead class="team_rank_th">
                        <tr>
                          <th>Pos</th>
                          <th>PLayer</th>
                          <th>Team</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody id="icc_t20_ar_rank_short">
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
                      </tbody>
                    </table>
                  </div>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('icc_ar_ranking_t20') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('script')
  <script>
    function icc_test_team_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_test_team_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_test_team_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });

    }

    function icc_odi_team_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_odi_team_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_odi_team_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });

    }

    function icc_t20_team_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_t20_team_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_t20_team_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_test_batter_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_test_batter_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_test_batter_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_odi_batter_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_odi_batter_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_odi_batter_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_t20_batter_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_t20_batter_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_t20_batter_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_test_bowler_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_test_bowler_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_test_bowler_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_odi_bowler_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_odi_bowler_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_odi_bowler_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_t20_bowler_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_t20_bowler_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_t20_bowler_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_test_ar_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_test_ar_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_test_ar_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_odi_ar_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_odi_ar_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_odi_ar_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function icc_t20_ar_rank_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('icc_t20_ar_rank_short') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#icc_t20_ar_rank_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }


    $(document).ready(() => {
      icc_test_team_rank_short();
      icc_odi_team_rank_short();
      icc_t20_team_rank_short();

      icc_test_batter_rank_short();
      icc_odi_batter_rank_short();
      icc_t20_batter_rank_short();

      icc_test_bowler_rank_short();
      icc_odi_bowler_rank_short();
      icc_t20_bowler_rank_short();

      icc_test_ar_rank_short();
      icc_odi_ar_rank_short();
      icc_t20_ar_rank_short();
    });
  </script>
@endpush
