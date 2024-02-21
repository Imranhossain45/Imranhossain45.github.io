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
                  Home
                </div>
                <div>
                  Live Scores
                </div>
                <div>
                  Sri Lanka Under-19s Vs United Arab Emirates Under-19s, Group B
                </div>
              </div>
            </div><!-- Post title end -->
            <div class="score_area block">
              <div style="color: #bc2324">
                Live
              </div>
              <div>
                ACC U19 Asia Cup 11-Dec-2023 | 11:30 AM| Dubai
              </div>
              <div class="details_team_info_block">

                <div class="d-flex justify-content-between mb-2">

                  <div class="">
                    <img src="{{ asset('backend/images/icon/cross.png') }}" class="header_img" alt="">
                    <span class="team_name">Sri Lanka Under-19s</span>
                  </div>
                  <div class="team_name">
                    70/1
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="{{ asset('backend/images/icon/cross.png') }}" class="header_img" alt="">
                    <span class="team_name"> United Arab Emirates Under-19s</span>
                  </div>
                  <div class="team_name">
                    70/1
                  </div>
                </div>
                <div class="mt-2">
                  United Arab Emirates Under-19s need 11 runs in 22 remaining balls
                </div>
              </div><!-- logo col end -->
            </div>
            <div class="mt-3">
              <span class="team_name">Target 221</span>
              <div class="d-flex">
                Current Run Rate 4.56 <span class="mid_dot">•</span> Required Run Rate 1 <span class="mid_dot">•</span>
                Last 5 Overs 34/2 (6.38) <span class="mid_dot">•</span> Last 10 Overs 57/3 (5.43)
              </div>
            </div>

            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs score_nav_tabs">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#home">Live</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Scorecard">Scorecard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Commentry">Commentry</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Squads">Squads</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Statistics">Statistics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Performance">Performance</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Info">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Photos">Photos</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home">
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic deserunt magni eos facere cumque quod quisquam itaque fugiat mollitia similique blanditiis excepturi, quidem iure aliquam. Itaque et perspiciatis atque minima aspernatur velit, enim at ad quidem soluta delectus! At consectetur libero nobis debitis earum laborum harum commodi, in vitae recusandae!
                </div>
                <div class="tab-pane" id="Scorecard">
                  Scorboard
                </div>
                <div class="tab-pane" id="Commentry">
                  Commentry
                </div>
                <div class="tab-pane" id="Squads">
                  Squads
                </div>
                <div class="tab-pane " id="Statistics">
                  Stattistics
                </div>
                <div class="tab-pane " id="Performance">
                  lPerformance
                </div>

                <div class="tab-pane" id="Info">
                  info
                </div>
                <div class="tab-pane container" id="Photos">
                  <h2 class="mt-4">No Photos Available Now</h2>
                </div>
              </div>

            </div>
          </div><!-- Single post end -->
          <div class="gap-30"></div>



          <div class="gap-30"></div>

        </div><!-- Content Col end -->



        <div class="col-lg-3 col-md-3">

        </div><!-- Sidebar Col end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- First block end -->
@endsection
@push('script')
    <script>
    $(document).ready(function() {
      var activeTab = sessionStorage.getItem('activeTab');

      // Function to remove active class from all nav-links
      function removeActiveClass() {
        $('.score_nav_link').removeClass('active');
      }

      if (activeTab) {
        $('.tab-pane').removeClass('active');
        $(activeTab).addClass('active');

        removeActiveClass(); // Remove active class from all nav-links
        $('a[href="' + activeTab + '"]').addClass('active'); // Add active class to the corresponding nav-link
      }

      $('.score_nav_link').on('click', function(e) {
        e.preventDefault();

        var targetTabId = $(this).attr('href');
        $('.tab-pane').removeClass('active');
        $(targetTabId).addClass('active');

        removeActiveClass(); // Remove active class from all nav-links
        $(this).addClass('active'); // Add active class to the clicked nav-link

        sessionStorage.setItem('activeTab', targetTabId);

        setTimeout(function() {
          window.location.reload();
        }, 0);
      });
    });
  </script>
@endpush
