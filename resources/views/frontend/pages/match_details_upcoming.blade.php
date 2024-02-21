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
                 {{ @$scheduled_match_info->state }}
                </div>
                <div>
                 {{ @$scheduled_match_info->team1->name }} Vs {{ @$scheduled_match_info->team2->name }},  {{ @$scheduled_match_info->matchDescription }}
                </div>
              </div>
            </div><!-- Post title end -->
            <div class="score_area block">
              <div class="details_team_info_block">

                <div class="d-flex justify-content-between">
                  <div>
                    <div class="d-flex justify-content-between mb-2">

                      <div class="">
                        <img src="" class="header_img" alt="">
                        <span class="team_name">{{ @$scheduled_match_info->team1->name }}</span>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <img src="" class="header_img" alt="">
                        <span class="team_name">{{ @$scheduled_match_info->team2->name }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <h2>{{ \Carbon\Carbon::parse(@$scheduled_match_info->matchStartTimestamp / 1000)->format('g.iA') }}
                    </h2>
                    <span>{{ \Carbon\Carbon::parse(@$scheduled_match_info->matchStartTimestamp / 1000)->format('d F Y') }}</span>
                  </div>
                </div>
              </div><!-- logo col end -->
            </div>

            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs score_nav_tabs">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#home">Live</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Squads"
                    onclick="squadData('{{ $matchId }}','{{ @$scheduled_match_info->team1->id }}','{{ @$scheduled_match_info->team2->id }}','{{ @$scheduled_match_info->team1->name }}','{{ @$scheduled_match_info->team2->name }}')">Squads</a>


                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Info"
                    onclick="matchInfo('{{ $matchId }}')">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Photos">Photos</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="block mt-3">
                    <div class="mt-3 mb-2">
                      <div class="d-flex">

                        <div class="m-auto">
                          <img src="{{ asset('backend/images/default_profile.png') }}" alt="">

                        </div>

                      </div>
                      <h3 class="justify-content-center text-center">
                        Match To Start In
                      </h3>

                      <h3 id="countdown" class="text-center">
                      </h3>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-lg-4">
                      <div class="block">
                        <div>
                          <h3>Match Details</h3>
                        </div>
                        <div class="font-weight-bold mb-2">
                          <span style="color: #bc2324"><i class="fa-solid fa-calendar-days"></i> Date:</span>
                          {{ \Carbon\Carbon::parse(@$scheduled_match_info->matchStartTimestamp / 1000)->format('d F Y H:iA') }}

                        </div>
                        <div class="font-weight-bold mb-2">
                          <span style="color: #bc2324"><i class="fa-solid fa-street-view"></i></i> Vanue:</span>
                          {{ @$scheduled_match_info->venue->name }}
                        </div>
                        <div class="font-weight-bold mb-2">
                          <span style="color: #bc2324"><i class="fa-solid fa-database"></i> Toss:</span>
                          @if (isset($scheduled_match_info->tossResults->tossWinnerName))
                            {{ @$scheduled_match_info->tossResults->tossWinnerName }} elected to
                            {{ @$scheduled_match_info->tossResults->decision }}
                          @else
                            <span>Not Available</span>
                          @endif
                        </div>
                        <div class="font-weight-bold mb-2">
                          <span style="color: #bc2324"><i class="fa-regular fa-hand-point-up"></i> Umpires:</span>
                          @if (isset($scheduled_match_info->umpire1->name))
                            <span class="">
                              {{ @$scheduled_match_info->umpire1->name }}({{ @$scheduled_match_info->umpire1->country }}),
                              {{ @$scheduled_match_info->umpire2->name }}({{ @$match_info->umpire2->country }}),
                              {{ @$scheduled_match_info->umpire3->name }}({{ @$scheduled_match_info->umpire3->country }},
                              TV)</span>
                          @else
                            <span>Not Available</span>
                          @endif
                        </div>
                        <div class="font-weight-bold mb-2">
                          <span style="color: #bc2324"><i class="fa-solid fa-user-tie"></i> Match Referee:</span>
                          @if (isset($scheduled_match_info->referee->name))
                            <span class="">{{ @$scheduled_match_info->referee->name }}
                              ({{ @$scheduled_match_info->referee->country }})</span>
                          @else
                            <span>Not Available</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="block">
                        <ul class="nav nav-tabs score_nav_tabs justify-content-between">
                          <li class="nav-item score_board_nav_link">
                            <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab"
                              href="#{{ @$scheduled_match_info->team1->shortName }}">{{ @$scheduled_match_info->team1->name }}</a>
                          </li>
                          <li class="nav-item score_board_nav_link">
                            <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab"
                              href="#{{ @$scheduled_match_info->team2->shortName }}">{{ @$scheduled_match_info->team2->name }}</a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="{{ @$scheduled_match_info->team1->shortName }}">
                            <div class="tb-content-wrap inner-3">
                              <div class="innings-player">
                                <div class="row">
                                  <div class="col-lg-12 pl-1">
                                    <h2 class="mb-1">Playing XI</h2>
                                  </div>
                                  @if (isset($team1Squad))
                                    @foreach ($team1Squad as $player_xi_one)
                                      @php
                                        $slug = Str::slug($player_xi_one->fullName);
                                      @endphp
                                      <div class="col-lg-4 col-md-4 col-sm-6 p-1 m-0"><a
                                          class="single-player-blk shadow-sm "
                                          href="{{ route('cricket_player_profile', ['id' => $player_xi_one->id, 'slug' => $slug]) }}">
                                          <div class="player-blk-top-blk">
                                            <div>
                                              <img src="{{ asset('backend/images/default_profile.png') }}"
                                                class="team_img" width="80" alt="">
                                              <div class="player_cat_img">
                                                @if ($player_xi_one->role == 'Batsman' || $player_xi_one->role == 'WK-Batsman')
                                                  <img src="{{ asset('frontend/img/Icon/bat.png') }}" class=""
                                                    width="30" alt="">
                                                @elseif ($player_xi_one->role == 'Bowler')
                                                  <img src="{{ asset('frontend/img/Icon/ball.png') }}" class=""
                                                    width="30" alt="">
                                                @elseif ($player_xi_one->role == 'Bowling Allrounder' || $player_xi_one->role == 'Batting Allrounder')
                                                  <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}"
                                                    class="" width="30" alt="">
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="player-all-info">
                                            <div class="player-title">
                                              <h3>{{ @$player_xi_one->fullName }}</h3>
                                              <p><span>Batting: {{ @$player_xi_one->battingStyle }} Handed</span>
                                                @if (isset($player_xi_one->bowlingStyle))
                                                  <span>Bowling: {{ @$player_xi_one->bowlingStyle }}</span>
                                                @endif

                                              </p>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                    @endforeach
                                  @else
                                    <h1>Not Available</h1>
                                  @endif
                                </div>
                              </div>

                            </div>


                          </div>
                          <div class="tab-pane" id="{{ @$scheduled_match_info->team2->shortName }}">

                            <div class="tb-content-wrap inner-3">
                              <div class="innings-player">
                                <div class="row">
                                  <div class="col-lg-12 pl-1">
                                    <h2 class="mb-1">Playing XI</h2>
                                  </div>
                                  @if (isset($team2Squad))
                                    @foreach ($team2Squad as $player_xi_two)
                                      @php
                                        $slug = Str::slug($player_xi_two->fullName);
                                      @endphp
                                      <div class="col-lg-4 col-md-4 col-sm-6 p-1 m-0"><a
                                          class="single-player-blk shadow-sm "
                                          href="{{ route('cricket_player_profile', ['id' => $player_xi_two->id, 'slug' => $slug]) }}">
                                          <div class="player-blk-top-blk">
                                            <div>
                                              <img src="{{ asset('backend/images/default_profile.png') }}"
                                                class="team_img" width="80" alt="">
                                              <div class="player_cat_img">
                                                @if ($player_xi_two->role == 'Batsman' || $player_xi_two->role == 'WK-Batsman')
                                                  <img src="{{ asset('frontend/img/Icon/bat.png') }}" class=""
                                                    width="30" alt="">
                                                @elseif ($player_xi_two->role == 'Bowler')
                                                  <img src="{{ asset('frontend/img/Icon/ball.png') }}" class=""
                                                    width="30" alt="">
                                                @elseif ($player_xi_two->role == 'Bowling Allrounder' || $player_xi_two->role == 'Batting Allrounder')
                                                  <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}"
                                                    class="" width="30" alt="">
                                                @endif
                                              </div>
                                            </div>
                                          </div>
                                          <div class="player-all-info">
                                            <div class="player-title">
                                              <h3>{{ @$player_xi_one->fullName }}</h3>
                                              <p><span>Batting: {{ @$player_xi_one->battingStyle }} Handed</span>
                                                @if (isset($player_xi_one->bowlingStyle))
                                                  <span>Bowling: {{ @$player_xi_one->bowlingStyle }}</span>
                                                @endif

                                              </p>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                    @endforeach
                                  @else
                                    <h1>Not Available</h1>
                                  @endif
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="tab-pane squadData" id="Squads">
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

                </div>


                <div class="tab-pane matchInfo" id="Info">
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
          <div class="news_details_v_p">
            @include('frontend.1st_block.featured_video')
            <div class="gap-30"></div>
            @include('frontend.1st_block.featured_photo')
            <div class="gap-30"></div>
          </div>
          <div class="sidebar sidebar-right">

            <div class="widget text-center">
              <img class="banner img-fluid" src="{{ asset('frontend/img/banner-ads/ad-sidebar.png') }}"
                alt="" />
            </div><!-- Sidebar Ad end -->
            <div class="widget color-red">
              <h3 class="block-title"><span>Latest News</span></h3>


              <div class="list-post-block block">
                <ul class="list-post">
                  @foreach ($latest_news as $lnews)
                    <li class="clearfix">
                      <div class="post-block-style post-float clearfix ">
                        <div class="post-thumb">
                          <a href="{{ route('news_details', $lnews->slug) }}">
                            <img class="img-fluid news_details_lnews_img" src="{{ $lnews->photo }}"
                              alt="{{ $lnews->alt_text }}" />
                          </a>
                          <a class="post-cat" href="#">{{ $lnews->category->name }}</a>
                        </div><!-- Post thumb end -->

                        <div class="post-content">
                          <h2 class="post-title title-small">
                            <a href="#">{{ $lnews->title }}</a>
                          </h2>
                          {{-- <div class="post-meta">
                                                    <span class="post-date">
                                                        <i class="fa-solid fa-calendar-days">
                                                    </i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y h:i A')  }}
                                                    <a href="" style="color: #a3a3a3;padding-left:10px" class="auther_name"><i class="fa-solid fa-user"></i>
                                                        {{ $news->auther }}</a></span>
                                                </div> --}}
                        </div><!-- Post content end -->
                      </div><!-- Post block style end -->
                    </li><!-- Li 1 end -->
                    <hr>
                  @endforeach
                  <div class="ViewAll_main_div">
                    <a href="{{ route('all_news') }}" class="view_all_btn">View All</a>
                  </div>
                </ul><!-- List post end -->
              </div><!-- List post block end -->

            </div><!-- Popular news widget end -->
            @include('frontend.1st_block.follow_us')

            <div class="widget text-center">
              <img class="banner img-fluid" src="images/banner-ads/ad-sidebar.png" alt="" />
            </div><!-- Sidebar Ad end -->



          </div><!-- Sidebar right end -->
        </div><!-- Sidebar Col end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- First block end -->
@endsection

@push('script')
  <script>
    function updateCountdown() {
      var timestampInMilliseconds = {{ @$scheduled_match_info->matchStartTimestamp }};
      var timestampInSeconds = timestampInMilliseconds / 1000;

      var currentTime = Math.floor(new Date().getTime() / 1000);
      var remainingTime = Math.max(0, timestampInSeconds - currentTime);

      var days = Math.floor(remainingTime / (60 * 60 * 24));
      var hours = Math.floor((remainingTime % (60 * 60 * 24)) / (60 * 60));
      var minutes = Math.floor((remainingTime % (60 * 60)) / 60);
      var seconds = remainingTime % 60;

      var countdownElement = document.getElementById('countdown');
      countdownElement.innerHTML = '<span style="color: #bc2324">' + days + '</span> Days ' +
        '<span style="color: #bc2324">' + ('0' + hours).slice(-2) + '</span> Hours ' +
        '<span style="color: #bc2324">' + ('0' + minutes).slice(-2) + '</span> Minutes ' +
        '<span style="color: #bc2324">' + ('0' + seconds).slice(-2) + '</span> Seconds';
    }

    // Update the countdown every second
    setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
  </script>
  <script>
    function squadData(matchId, teamOneId, teamTwoID, teamOneName, teamTwoName) {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('squadData') }}",
        type: 'POST',
        data: {
          matchId: matchId,
          teamOneId: teamOneId,
          teamTwoID: teamTwoID,
          teamOneName: teamOneName,
          teamTwoName: teamTwoName,
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {

          if (response.success) {
            $(".squadData").html(response.html);
            initSlider();
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    function matchInfo(matchId) {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('matchInfo') }}",
        type: 'POST',
        data: {
          matchId: matchId,
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $(".matchInfo").html(response.html);
            initSlider();
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };
  </script>
@endpush
