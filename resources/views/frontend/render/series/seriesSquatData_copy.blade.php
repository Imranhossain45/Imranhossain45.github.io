@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;

@endphp

{{-- <div class="innings-player">
  <div class="row">
    @foreach ($squadData as $index => $squadPlayer)
      @foreach ($squadPlayer as $player)
        @if (isset($player->id))
          <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
              href="/player/profile/125101/dinura-kalupahana">
              <div class="player-blk-top-blk">
                <div>
                  <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                    alt="">
                  <div class="player_cat_img">
                    @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                      <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30" alt="">
                    @elseif ($player->role == 'Bowler')
                      <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30" alt="">
                    @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                      <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                        alt="">
                    @endif
                  </div>
                </div>
              </div>
              <div class="player-all-info">
                <div class="player-title">
                  <h3>{{ @$player->name }}</h3>
                  <p><span>Batting: {{ @$player->battingStyle }}</span><span>Bowling:
                      {{ @$player->bowlingStyle }}</span></p>
                </div>
              </div>
            </a>
          </div>
        @endif
      @endforeach
    @endforeach
  </div>
</div> --}}
<ul class="nav nav-tabs nav_tabs_squad justify-content-start">
  @foreach ($series_squads as $index => $series_squad)
    @if (isset($series_squad->squadId))
      <li class="nav-item">
      <a class="nav-link rank_nav_link score_nav_link text-center" data-toggle="tab"
        href="#squad_{{ @$series_squad->squadId }}">
        {{ @$series_squad->squadType }}
      </a>
    </li>
    @endif
  @endforeach
</ul>
@foreach ($series_squads as $index => $series_squad)
  @if (isset($series_squad->squadId))
    <div class="tab-pane" id="squad_{{ @$series_squad->squadId }}">
      <div class="tb-content-wrap inner-3">
        <div class="innings-player">
          @php
            $squadId = $series_squad->squadId ?? null;
            $squadData = SeriesRedirectController::single_squad_data($seriesId, $squadId);
          @endphp
          <div class="row">
            @foreach ($squadData as $index => $squadPlayer)
              @foreach ($squadPlayer as $player)
                @if (isset($player->id))
                  <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                      href="/player/profile/125101/dinura-kalupahana">
                      <div class="player-blk-top-blk">
                        <div>
                          <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                            alt="">
                          <div class="player_cat_img">
                            @if (isset($player->role))
                              @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                                <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                                  alt="">
                              @elseif ($player->role == 'Bowler')
                                <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                                  alt="">
                              @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                                <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                                  alt="">
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="player-all-info">
                        <div class="player-title">
                          <h3>{{ @$player->name }}</h3>
                          <p><span>Batting: {{ @$player->battingStyle }}</span><span>Bowling:
                              {{ @$player->bowlingStyle }}</span></p>
                        </div>
                      </div>
                    </a>
                  </div>
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endif
@endforeach

{{-- <div class="tab-pane active" id="{{ @$squadId }}">
  <div class="tb-content-wrap inner-3">
    <div class="innings-player">
      <div class="row">
        @foreach ($squadData as $index => $squadPlayer)
          @foreach ($squadPlayer as $player)
            @if (isset($player->id))
              <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                  href="/player/profile/125101/dinura-kalupahana">
                  <div class="player-blk-top-blk">
                    <div>
                      <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                        alt="">
                      <div class="player_cat_img">
                        @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                          <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player->role == 'Bowler')
                          <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                            alt="">
                        @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                          <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                            alt="">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="player-all-info">
                    <div class="player-title">
                      <h3>{{ @$player->name }}</h3>
                      <p><span>Batting: {{ @$player->battingStyle }}</span><span>Bowling:
                          {{ @$player->bowlingStyle }}</span></p>
                    </div>
                  </div>
                </a>
              </div>
            @endif
          @endforeach
        @endforeach
      </div>
    </div>
  </div>


</div> --}}
{{-- <div class="tab-pane" id="sIndia">
  <div class="tb-content-wrap inner-3">
    <div class="innings-player">
      <div class="row">
        @foreach ($team2_player as $index => $player)
          @if (isset($player->id))
            <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                href="/player/profile/125101/dinura-kalupahana">
                <div class="player-blk-top-blk">
                  <div>
                    <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img" width="80"
                      alt="">
                    <div class="player_cat_img">
                      @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                        <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="" width="30"
                          alt="">
                      @elseif ($player->role == 'Bowler')
                        <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="" width="30"
                          alt="">
                      @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                        <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="" width="30"
                          alt="">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="player-all-info">
                  <div class="player-title">
                    <h3>{{ @$player->name }}</h3>
                    <p><span>Batting: {{ @$player->battingStyle }}</span><span>Bowling:
                        {{ @$player->bowlingStyle }}</span></p>
                  </div>
                </div>
              </a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>


</div>
</div> --}}
