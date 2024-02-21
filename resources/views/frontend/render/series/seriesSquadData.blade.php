@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;

@endphp

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
<div class="tab-content">
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
                  @php
                     $player_image = SeriesRedirectController::squad_image($player->imageId);
                     $slug = Str::slug(@$player->name);
                  @endphp
                    <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                        href="{{ route('cricket_player_profile',['id'=>$player->id,'slug'=>$slug]) }}">
                        <div class="player-blk-top-blk">
                          <div>
                            <img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="team_img player_img" 
                              alt="">
                            <div class="player_cat_img">
                              @if (isset($player->role))
                                @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                                  <img src="{{ asset('frontend/img/Icon/bat.png') }}" class="player_cat_img_icon" width="25" height="25"
                                    alt="">
                                @elseif ($player->role == 'Bowler')
                                  <img src="{{ asset('frontend/img/Icon/ball.png') }}" class="player_cat_img_icon" width="25" height="25"
                                    alt="">
                                @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                                  <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class="player_cat_img_icon" width="25" height="25"
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
</div>


