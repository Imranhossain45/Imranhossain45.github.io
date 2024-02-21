@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;
@endphp
<ul class="nav nav-tabs score_nav_tabs justify-content-between">
  <li class="nav-item score_board_nav_link">
    <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#sBangladesh">{{ $teamOneName }}</a>
  </li>
  <li class="nav-item score_board_nav_link">
    <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#sIndia">{{ $teamTwoName }}</a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="sBangladesh">
    <div class="tb-content-wrap inner-3">
      <div class="innings-player">
        <div class="row">
          @if (isset($squad_team_one))
            <div class="col-lg-12 pl-1">
              <h2 class="mb-1">Playing XI</h2>
            </div>
            @php
              $player_xi = 'playing XI';
            @endphp

            @foreach ($squad_team_one->$player_xi as $player_xi_one)
              @php
                $slug = Str::slug($player_xi_one->fullName);
                $player_image = SeriesRedirectController::squad_image($player_xi_one->faceImageId);
              @endphp
              <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                  href="{{ route('cricket_player_profile', ['id' => $player_xi_one->id, 'slug' => $slug]) }}">
                  <div class="player-blk-top-blk">
                    <div>
                      <img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                        alt="">
                      <div class="player_cat_img">
                        @if ($player_xi_one->role == 'Batsman' || $player_xi_one->role == 'WK-Batsman')
                          <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowler')
                          <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowling Allrounder' || $player_xi_one->role == 'Batting Allrounder')
                          <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                            alt="">
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
          @endif
        </div>
      </div>
      <div class="innings-player">
        <div class="row" style="padding-bottom: 15px;">
          @if (isset($squad_team_one))
            <div class="col-lg-12 pl-1">
              <h2 class="mb-1">Squad Bench</h2>
            </div>

            @foreach ($squad_team_one->bench as $player_xi_one)
              @php
                $slug = Str::slug($player_xi_one->fullName);
                 $player_image = SeriesRedirectController::squad_image($player_xi_one->faceImageId);
              @endphp
              <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                  href="{{ route('cricket_player_profile', ['id' => $player_xi_one->id, 'slug' => $slug]) }}">
                  <div class="player-blk-top-blk">
                    <div>
                      <img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                        alt="">
                      <div class="player_cat_img">
                        @if ($player_xi_one->role == 'Batsman' || $player_xi_one->role == 'WK-Batsman')
                          <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowler')
                          <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowling Allrounder' || $player_xi_one->role == 'Batting Allrounder')
                          <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                            alt="">
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
          @endif
        </div>
      </div>
    </div>


  </div>
  <div class="tab-pane" id="sIndia">

    <div class="tb-content-wrap inner-3">
      <div class="innings-player">
        <div class="row">
          @if (isset($squad_team_two))
            <div class="col-lg-12 pl-1">
              <h2 class="mb-1">Playing XI</h2>
            </div>
            @php
              $player_xi = 'playing XI';
            @endphp

            @foreach ($squad_team_two->$player_xi as $player_xi_one)
              @php
                $slug = Str::slug($player_xi_one->fullName);
                 $player_image = SeriesRedirectController::squad_image($player_xi_one->faceImageId);
              @endphp
              <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                  href="{{ route('cricket_player_profile', ['id' => $player_xi_one->id, 'slug' => $slug]) }}">
                  <div class="player-blk-top-blk">
                    <div>
                      <img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                        alt="">
                      <div class="player_cat_img">
                        @if ($player_xi_one->role == 'Batsman' || $player_xi_one->role == 'WK-Batsman')
                          <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowler')
                          <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowling Allrounder' || $player_xi_one->role == 'Batting Allrounder')
                          <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                            alt="">
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
          @endif
        </div>
      </div>
      <div class="innings-player">
        <div class="row" style="padding-bottom: 15px;">
          @if (isset($squad_team_two))
            <div class="col-lg-12 pl-1">
              <h2 class="mb-1">Squad Bench</h2>
            </div>

            @foreach ($squad_team_two->bench as $player_xi_one)
              @php
                $slug = Str::slug($player_xi_one->fullName);
                $player_image = SeriesRedirectController::squad_image($player_xi_one->faceImageId);
              @endphp
              <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                  href="{{ route('cricket_player_profile', ['id' => $player_xi_one->id, 'slug' => $slug]) }}">
                  <div class="player-blk-top-blk">
                    <div>
                      <img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                        alt="">
                      <div class="player_cat_img">
                        @if ($player_xi_one->role == 'Batsman' || $player_xi_one->role == 'WK-Batsman')
                          <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowler')
                          <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player_xi_one->role == 'Bowling Allrounder' || $player_xi_one->role == 'Batting Allrounder')
                          <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                            alt="">
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
