@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;
  use App\Http\Controllers\Redirect\PageRedirectController;
  $bat_team_detailsOne = $matchScoreCardFirst->batTeamDetails;
  $bat_team_detailsOne = json_decode(json_encode($bat_team_detailsOne), true);

  // Custom sorting function to extract and compare the numeric part of the keys
  uksort($bat_team_detailsOne['batsmenData'], function ($a, $b) {
      $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
      $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

      return $aNumeric - $bNumeric;
  });

  $bowl_team_detailsOne = $matchScoreCardFirst->bowlTeamDetails;
  $bowl_team_detailsOne = json_decode(json_encode($bowl_team_detailsOne), true);

  // Custom sorting function to extract and compare the numeric part of the keys
  uksort($bowl_team_detailsOne['bowlersData'], function ($a, $b) {
      $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
      $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

      return $aNumeric - $bNumeric;
  });

  $extra_team_detailsOne = $matchScoreCardFirst->extrasData;
  $score_team_detailsOne = $matchScoreCardFirst->scoreDetails;
  $wickets_team_detailsOne = $matchScoreCardFirst->wicketsData;

  // Convert the object to an array
  $wickets_team_detailsOne = json_decode(json_encode($wickets_team_detailsOne), true);

  // Sort the array based on wktNbr
  usort($wickets_team_detailsOne, function ($a, $b) {
      return $a['wktNbr'] - $b['wktNbr'];
  });

  if (isset($matchScoreCardSecond)) {
      $bat_team_detailsTwo = $matchScoreCardSecond->batTeamDetails;
      $bat_team_detailsTwo = json_decode(json_encode($bat_team_detailsTwo), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bat_team_detailsTwo['batsmenData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });
      $bowl_team_detailsTwo = $matchScoreCardSecond->bowlTeamDetails;
      $bowl_team_detailsTwo = json_decode(json_encode($bowl_team_detailsTwo), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bowl_team_detailsTwo['bowlersData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });

      $extra_team_detailsTwo = $matchScoreCardSecond->extrasData;
      $score_team_detailsTwo = $matchScoreCardSecond->scoreDetails;
      $wickets_team_detailsTwo = $matchScoreCardSecond->wicketsData;

      // Convert the object to an array
      $wickets_team_detailsTwo = json_decode(json_encode($wickets_team_detailsTwo), true);

      // Sort the array based on wktNbr
      usort($wickets_team_detailsTwo, function ($a, $b) {
          return $a['wktNbr'] - $b['wktNbr'];
      });
  }
  if (isset($matchScoreCardThird)) {
      $bat_team_detailsThree = $matchScoreCardThird->batTeamDetails;
      $bat_team_detailsThree = json_decode(json_encode($bat_team_detailsThree), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bat_team_detailsThree['batsmenData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });
      $bowl_team_detailsThree = $matchScoreCardThird->bowlTeamDetails;
      $bowl_team_detailsThree = json_decode(json_encode($bowl_team_detailsThree), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bowl_team_detailsThree['bowlersData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });

      $extra_team_detailsThree = $matchScoreCardThird->extrasData;
      $score_team_detailsThree = $matchScoreCardThird->scoreDetails;
      $wickets_team_detailsThree = $matchScoreCardThird->wicketsData;

      // Convert the object to an array
      $wickets_team_detailsThree = json_decode(json_encode($wickets_team_detailsThree), true);

      // Sort the array based on wktNbr
      usort($wickets_team_detailsThree, function ($a, $b) {
          return $a['wktNbr'] - $b['wktNbr'];
      });
  }
  if (isset($matchScoreCardFourth)) {
      $bat_team_detailsFour = $matchScoreCardFourth->batTeamDetails;
      $bat_team_detailsFour = json_decode(json_encode($bat_team_detailsFour), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bat_team_detailsFour['batsmenData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });
      $bowl_team_detailsFour = $matchScoreCardFourth->bowlTeamDetails;
      $bowl_team_detailsFour = json_decode(json_encode($bowl_team_detailsFour), true);

      // Custom sorting function to extract and compare the numeric part of the keys
      uksort($bowl_team_detailsFour['bowlersData'], function ($a, $b) {
          $aNumeric = filter_var($a, FILTER_SANITIZE_NUMBER_INT);
          $bNumeric = filter_var($b, FILTER_SANITIZE_NUMBER_INT);

          return $aNumeric - $bNumeric;
      });

      $extra_team_detailsFour = $matchScoreCardFourth->extrasData;
      $score_team_detailsFour = $matchScoreCardFourth->scoreDetails;
      $wickets_team_detailsFour = $matchScoreCardFourth->wicketsData;

      // Convert the object to an array
      $wickets_team_detailsFour = json_decode(json_encode($wickets_team_detailsFour), true);

      // Sort the array based on wktNbr
      usort($wickets_team_detailsFour, function ($a, $b) {
          return $a['wktNbr'] - $b['wktNbr'];
      });
  }
  if ($matchScoreCardFirst->inningsId == 1) {
      if (isset($matchScoreCardThird) && $matchScoreCardThird->inningsId == 3) {
          $team1_first_innings = '1st Innings';
      } else {
          $team1_first_innings = 'Innings';
      }
  }
  if ($matchScoreCardSecond->inningsId == 2) {
      if (isset($matchScoreCardFourth) && $matchScoreCardFourth->inningsId == 4) {
          $team2_first_innings = '1st Innings';
      } else {
          $team2_first_innings = 'Innings';
      }
  }
  if (isset($matchScoreCardThird) && $matchScoreCardThird->inningsId == 3) {
      $team1_2nd_innings = '2nd Innings';
  }
  if (isset($matchScoreCardFourth) && $matchScoreCardFourth->inningsId == 4) {
      $team2_2nd_innings = '2nd Innings';
  }
@endphp
<ul class="nav nav-tabs score_nav_tabs justify-content-between">
  <li class="nav-item score_board_nav_link">
    <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab"
      href="#{{ @$bat_team_detailsOne['batTeamShortName'] }}{{ $matchScoreCardFirst->inningsId }}">{{ @$bat_team_detailsOne['batTeamName'] }}
      {{ $team1_first_innings }}</a>
  </li>
  <li class="nav-item score_board_nav_link">
    <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab"
      href="#{{ @$bat_team_detailsTwo['batTeamShortName'] }}{{ $matchScoreCardSecond->inningsId }}">{{ @$bat_team_detailsTwo['batTeamName'] }}
      {{ $team2_first_innings }}</a>
  </li>
  @if (isset($matchScoreCardThird))
    <li class="nav-item score_board_nav_link">
      <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab"
        href="#{{ @$bat_team_detailsThree['batTeamShortName'] }}{{ $matchScoreCardThird->inningsId }}">{{ @$bat_team_detailsThree['batTeamName'] }}
        {{ $team1_2nd_innings }}</a>
    </li>
  @endif
  @if (isset($matchScoreCardFourth))
    <li class="nav-item score_board_nav_link">
      <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab"
        href="#{{ @$bat_team_detailsFour['batTeamShortName'] }}{{ $matchScoreCardFourth->inningsId }}">{{ @$bat_team_detailsTwo['batTeamName'] }}
        {{ $team2_2nd_innings }}</a>
    </li>
  @endif

</ul>
<div class="tab-content">
  <div class="tab-pane active"
    id="{{ @$bat_team_detailsOne['batTeamShortName'] }}{{ $matchScoreCardFirst->inningsId }}">
    <div class="strike-table-wrap under-scorecard false table-responsive score_card_table">
      <table class="table strike-table">
        <thead>
          <tr>
            <th>Batsmen</th>
            <th class="text-center how_out_res_td"></th>
            <th class="text-center">R</th>
            <th class="text-center">B</th>
            <th class="text-center">4s</th>
            <th class="text-center">6s</th>
            <th class="text-center">SR</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($bat_team_detailsOne['batsmenData'] as $batter_data)
            @php
              $slug = Str::slug($batter_data['batName']);
              $batter_data_info = PageRedirectController::player_info($batter_data->batId);
              $batter_image = $batter_data_info->image;
            @endphp
            <tr>
              <td>
                <div class="d-flex align-items-center player_out_block">
                  <a class="player-name-img"
                    href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                    <span class="player-name"><img src="{{ @$batter_image }}" class="team_img mr-2" width="20"
                        alt="">
                      {{ @$batter_data['batName'] }}
                    </span></a>
                  <span class="how-out how_out_res">{{ @$batter_data['outDesc'] }}</span>
                </div>
              </td>
              <td class="how_out_res_td"><span class="how-out d-xs-none">{{ @$batter_data['outDesc'] }}</span>
              </td>
              <td class="text-center"><strong>{{ @$batter_data['runs'] }}</strong></td>
              <td class="text-center">{{ @$batter_data['balls'] }}</td>
              <td class="text-center">{{ @$batter_data['fours'] }}</td>
              <td class="text-center">{{ @$batter_data['sixes'] }}</td>
              <td class="text-center">{{ @$batter_data['strikeRate'] }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="2"><strong>Extras</strong></td>
            <td colspan="5" class="text-nowrap"><span><strong>{{ @$extra_team_detailsOne->total }}</strong><span
                  class="ml-2">(nb
                  {{ @$extra_team_detailsOne->noBalls }}, w {{ @$extra_team_detailsOne->wides }}, b
                  {{ @$extra_team_detailsOne->byes }}, lb {{ @$extra_team_detailsOne->legByes }},p
                  {{ @$extra_team_detailsOne->penalty }})</span></span></td>
          </tr>
          <tr class="total-table-count">
            <td colspan="2"><strong>Total</strong></td>
            <td colspan="5" class="text-nowrap">
              <div><strong>{{ @$score_team_detailsOne->runs }}/{{ @$score_team_detailsOne->wickets }}</strong>
                ({{ @$score_team_detailsOne->overs }} Overs) </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    @php
      foreach ($wickets_team_detailsOne as $wicketData) {
      }
    @endphp
    @if ($wicketData['wktNbr'] != '')
      <div class="similar-blk mb-20">
        <h3 class="tertiary-title">Fall of wickets</h3>
        <div class="fall-wicket-wrap">
          <div class="fall-wicket-wrap-inner">
            @foreach ($wickets_team_detailsOne as $wicketData)
              <div class="fall-item">
                <span class="fall-run">{{ @$wicketData['wktNbr'] }}/{{ @$wicketData['wktRuns'] }}</span>
                <p>{{ @$wicketData['batName'] }} at {{ @$wicketData['wktOver'] }} over</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
    @php
      foreach ($bat_team_detailsOne['batsmenData'] as $batter_data) {
      }
    @endphp
    @if ($batter_data['outDesc'] == '')
      <div class="similar-blk mb-20">
        <h3 class="tertiary-title">Next Batsmen</h3>
        <div class="fall-wicket-wrap">
          <div class="fall-wicket-wrap-inner did-not-bat">
            @foreach ($bat_team_detailsOne['batsmenData'] as $batter_data)
              @php
                $slug = Str::slug($batter_data['batName']);
                $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                $batter_image = $batter_data_info->image;
              @endphp
              @if ($batter_data['outDesc'] == '')
                <a class="player-item shadow-sm"
                  href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                  <div class="player-image position-relative">
                    <span><img src="{{ $batter_image ?? asset('backend/images/default_profile.png') }}"
                        class="team_img mr-2" width="20" alt=""></span>
                  </div>
                  <div class="player-name">{{ @$batter_data['batName'] }}</div>
                </a>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    @endif
    <div class="strike-table-wrap false table-responsive score_card_table">
      <table class="table strike-table">
        <thead>
          <tr>
            <th>Bowlers</th>
            <th class="text-center">O</th>
            <th class="text-center">M</th>
            <th class="text-center">R</th>
            <th class="text-center">W</th>
            <th class="text-center">NB</th>
            <th class="text-center">ER</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bowl_team_detailsOne['bowlersData'] as $bowler_data)
            @php
              $slug = Str::slug($bowler_data['bowlName']);
              $bowler_data_info = PageRedirectController::player_info($bowler_data->bowlerId);
              $bowler_image = $bowler_data_info->image;
            @endphp
            <tr>
              <td>
                <div class="d-flex align-items-center player_out_block">
                  <a class="player-name-img"
                    href="{{ route('cricket_player_profile', ['id' => $bowler_data['bowlerId'], 'slug' => $slug]) }}">
                    <span class="player-name"><img src="{{ $bowler_image }}" class="team_img mr-2" width="20"
                        alt="">
                      {{ @$bowler_data['bowlName'] }}
                    </span></a>
                </div>
              </td>
              <td class="text-center"><strong>{{ @$bowler_data['overs'] }}</strong></td>
              <td class="text-center">{{ @$bowler_data['maidens'] }}</td>
              <td class="text-center">{{ @$bowler_data['runs'] }}</td>
              <td class="text-center">{{ @$bowler_data['wickets'] }}</td>
              <td class="text-center">{{ @$bowler_data['no_balls'] }}</td>
              <td class="text-center">{{ @$bowler_data['economy'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>


  </div>
  <div class="tab-pane" id="{{ @$bat_team_detailsTwo['batTeamShortName'] }}{{ $matchScoreCardSecond->inningsId }}">
    @if (isset($matchScoreCardSecond))
      <div class="strike-table-wrap under-scorecard false table-responsive score_card_table">
        <table class="table strike-table">
          <thead>
            <tr>
              <th>Batsmen</th>
              <th class="text-center how_out_res_td"></th>
              <th class="text-center">R</th>
              <th class="text-center">B</th>
              <th class="text-center">4s</th>
              <th class="text-center">6s</th>
              <th class="text-center">SR</th>
            </tr>
          </thead>
          <tbody>
            @if (isset($bat_team_detailsTwo))
              @foreach ($bat_team_detailsTwo['batsmenData'] as $batter_data)
                @php
                  $slug = Str::slug($batter_data['batName']);
                  $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                  $batter_image = $batter_data_info->image;
                @endphp
                <tr>
                  <td>
                    <div class="d-flex align-items-center player_out_block">
                      <a class="player-name-img"
                        href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                        <span class="player-name"><img src="{{ $batter_image }}" class="team_img mr-2"
                            width="20" alt="">
                          {{ @$batter_data['batName'] }}
                        </span></a>
                      <span class="how-out how_out_res">{{ @$batter_data['outDesc'] }}</span>
                    </div>
                  </td>
                  <td class="how_out_res_td"><span class="how-out d-xs-none">{{ @$batter_data['outDesc'] }}</span>
                  </td>
                  <td class="text-center"><strong>{{ @$batter_data['runs'] }}</strong></td>
                  <td class="text-center">{{ @$batter_data['balls'] }}</td>
                  <td class="text-center">{{ @$batter_data['sours'] }}</td>
                  <td class="text-center">{{ @$batter_data['sixes'] }}</td>
                  <td class="text-center">{{ @$batter_data['strikeRate'] }}</td>
                </tr>
              @endforeach
            @endif
            <tr>
              <td colspan="2"><strong>Extras</strong></td>
              <td colspan="5" class="text-nowrap"><span><strong>{{ @$extra_team_detailsTwo->total }}</strong><span
                    class="ml-2">(nb
                    {{ @$extra_team_detailsTwo->noBalls }}, w {{ @$extra_team_detailsTwo->wides }}, b
                    {{ @$extra_team_detailsTwo->byes }}, lb {{ @$extra_team_detailsTwo->legByes }},p
                    {{ @$extra_team_detailsTwo->penalty }})</span></span></td>
            </tr>
            <tr class="total-table-count">
              <td colspan="2"><strong>Total</strong></td>
              <td colspan="5" class="text-nowrap">
                <div><strong>{{ @$score_team_detailsTwo->runs }}/{{ @$score_team_detailsTwo->wickets }}</strong>
                  ({{ @$score_team_detailsTwo->overs }} Overs) </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      @php

        foreach ($wickets_team_detailsTwo as $wicketData) {
        }

      @endphp
      @if ($wicketData['wktNbr'] != '')
        <div class="similar-blk mb-20">
          <h3 class="tertiary-title">Fall of wickets</h3>
          <div class="fall-wicket-wrap">
            <div class="fall-wicket-wrap-inner">
              @if (isset($wickets_team_detailsTwo))
                @foreach ($wickets_team_detailsTwo as $wicketData)
                  <div class="fall-item"><span
                      class="fall-run">{{ @$wicketData['wktNbr'] }}/{{ @$wicketData['wktRuns'] }}</span>
                    <p>{{ @$wicketData['batName'] }} at {{ @$wicketData['wktOver'] }} over</p>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      @endif
      @php

        foreach ($bat_team_detailsTwo['batsmenData'] as $batter_data) {
        }

      @endphp
      @if ($batter_data['outDesc'] == '')
        <div class="similar-blk mb-20">
          <h3 class="tertiary-title">Next Batsmen</h3>
          <div class="fall-wicket-wrap">
            @if (isset($bat_team_detailsTwo))
              @foreach ($bat_team_detailsTwo['batsmenData'] as $batter_data)
                @php
                  $slug = Str::slug($batter_data['batName']);
                  $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                  $batter_image = $batter_data_info->image;
                @endphp
                @if ($batter_data['outDesc'] == '')
                  <div class="fall-wicket-wrap-inner did-not-bat">
                    <a class="player-item shadow-sm"
                      href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                      <div class="player-image position-relative">
                        <span><img src="{{ $batter_image ?? asset('backend/images/default_profile.png') }}"
                            class="team_img mr-2" width="20" alt=""></span>
                      </div>
                      <div class="player-name">{{ @$batter_data['batName'] }}</div>
                    </a>
                  </div>
                @endif
              @endforeach
            @endif
          </div>
        </div>
      @endif
      <div class="strike-table-wrap false">
        <table class="table strike-table">
          <thead>
            <tr>
              <th>Bowlers</th>
              <th class="text-center">O</th>
              <th class="text-center">M</th>
              <th class="text-center">R</th>
              <th class="text-center">W</th>
              <th class="text-center">NB</th>
              <th class="text-center">ER</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bowl_team_detailsTwo['bowlersData'] as $bowler_data)
              @php
                $slug = Str::slug($bowler_data['bowlName']);
                $bowler_data_info = PageRedirectController::player_info($bowler_data->bowlerId);
                $bowler_image = $bowler_data_info->image;
              @endphp
              <tr>
                <td>
                  <div class="d-flex align-items-center player_out_block">
                    <a class="player-name-img"
                      href="{{ route('cricket_player_profile', ['id' => $bowler_data['bowlerId'], 'slug' => $slug]) }}">
                      <span class="player-name"><img src="{{ $bowler_image }}" class="team_img mr-2" width="20"
                          alt="">
                        {{ @$bowler_data['bowlName'] }}
                      </span></a>
                  </div>
                </td>
                <td class="text-center"><strong>{{ @$bowler_data['overs'] }}</strong></td>
                <td class="text-center">{{ @$bowler_data['maidens'] }}</td>
                <td class="text-center">{{ @$bowler_data['runs'] }}</td>
                <td class="text-center">{{ @$bowler_data['wickets'] }}</td>
                <td class="text-center">{{ @$bowler_data['no_balls'] }}</td>
                <td class="text-center">{{ @$bowler_data['economy'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>


    @endif
  </div>
  @if (isset($matchScoreCardThird))
    <div class="tab-pane"
      id="{{ @$bat_team_detailsThree['batTeamShortName'] }}{{ $matchScoreCardThird->inningsId }}">
      @if (isset($matchScoreCardThird))
        <div class="strike-table-wrap under-scorecard false table-responsive score_card_table">
          <table class="table strike-table">
            <thead>
              <tr>
                <th>Batsmen</th>
                <th class="text-center how_out_res_td"></th>
                <th class="text-center">R</th>
                <th class="text-center">B</th>
                <th class="text-center">4s</th>
                <th class="text-center">6s</th>
                <th class="text-center">SR</th>
              </tr>
            </thead>
            <tbody>
              @if (isset($bat_team_detailsThree))
                @foreach ($bat_team_detailsThree['batsmenData'] as $batter_data)
                  @php
                    $slug = Str::slug($batter_data['batName']);
                    $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                    $batter_image = $batter_data_info->image;
                  @endphp
                  <tr>
                    <td>
                      <div class="d-flex align-items-center player_out_block">
                        <a class="player-name-img"
                          href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                          <span class="player-name"><img src="{{ $batter_image }}" class="team_img mr-2"
                              width="20" alt="">
                            {{ @$batter_data['batName'] }}
                          </span></a>
                        <span class="how-out how_out_res">{{ @$batter_data['outDesc'] }}</span>
                      </div>
                    </td>
                    <td class="how_out_res_td"><span class="how-out d-xs-none">{{ @$batter_data['outDesc'] }}</span>
                    </td>
                    <td class="text-center"><strong>{{ @$batter_data['runs'] }}</strong></td>
                    <td class="text-center">{{ @$batter_data['balls'] }}</td>
                    <td class="text-center">{{ @$batter_data['sours'] }}</td>
                    <td class="text-center">{{ @$batter_data['sixes'] }}</td>
                    <td class="text-center">{{ @$batter_data['strikeRate'] }}</td>
                  </tr>
                @endforeach
              @endif
              <tr>
                <td colspan="2"><strong>Extras</strong></td>
                <td colspan="5" class="text-nowrap">
                  <span><strong>{{ @$extra_team_detailsThree->total }}</strong><span class="ml-2">(nb
                      {{ @$extra_team_detailsThree->noBalls }}, w {{ @$extra_team_detailsThree->wides }}, b
                      {{ @$extra_team_detailsThree->byes }}, lb {{ @$extra_team_detailsThree->legByes }},p
                      {{ @$extra_team_detailsThree->penalty }})</span></span>
                </td>
              </tr>
              <tr class="total-table-count">
                <td colspan="2"><strong>Total</strong></td>
                <td colspan="5" class="text-nowrap">
                  <div>
                    <strong>{{ @$score_team_detailsThree->runs }}/{{ @$score_team_detailsThree->wickets }}</strong>
                    ({{ @$score_team_detailsThree->overs }} Overs)
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        @php

          foreach ($wickets_team_detailsThree as $wicketData) {
          }

        @endphp
        @if ($wicketData['wktNbr'] != '')
          <div class="similar-blk mb-20">
            <h3 class="tertiary-title">Fall of wickets</h3>
            <div class="fall-wicket-wrap">
              <div class="fall-wicket-wrap-inner">
                @if (isset($wickets_team_detailsThree))
                  @foreach ($wickets_team_detailsThree as $wicketData)
                    <div class="fall-item"><span
                        class="fall-run">{{ @$wicketData['wktNbr'] }}/{{ @$wicketData['wktRuns'] }}</span>
                      <p>{{ @$wicketData['batName'] }} at {{ @$wicketData['wktOver'] }} over</p>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        @endif
        @php

          foreach ($bat_team_detailsThree['batsmenData'] as $batter_data) {
          }

        @endphp
        @if ($batter_data['outDesc'] == '')
          <div class="similar-blk mb-20">
            <h3 class="tertiary-title">Next Batsmen</h3>
            <div class="fall-wicket-wrap">
              @if (isset($bat_team_detailsThree))
                @foreach ($bat_team_detailsThree['batsmenData'] as $batter_data)
                  @php
                    $slug = Str::slug($batter_data['batName']);
                    $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                    $batter_image = $batter_data_info->image;
                  @endphp
                  @if ($batter_data['outDesc'] == '')
                    <div class="fall-wicket-wrap-inner did-not-bat">
                      <a class="player-item shadow-sm"
                        href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                        <div class="player-image position-relative">
                          <span><img src="{{ $batter_image ?? asset('backend/images/default_profile.png') }}"
                              class="team_img mr-2" width="20" alt=""></span>
                        </div>
                        <div class="player-name">{{ @$batter_data['batName'] }}</div>
                      </a>
                    </div>
                  @endif
                @endforeach
              @endif
            </div>
          </div>
        @endif
        <div class="strike-table-wrap false">
          <table class="table strike-table">
            <thead>
              <tr>
                <th>Bowlers</th>
                <th class="text-center">O</th>
                <th class="text-center">M</th>
                <th class="text-center">R</th>
                <th class="text-center">W</th>
                <th class="text-center">NB</th>
                <th class="text-center">ER</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bowl_team_detailsThree['bowlersData'] as $bowler_data)
                @php
                  $slug = Str::slug($bowler_data['bowlName']);
                  $bowler_data_info = PageRedirectController::player_info($bowler_data->bowlerId);
                  $bowler_image = $bowler_data_info->image;
                @endphp
                <tr>
                  <td>
                    <div class="d-flex align-items-center player_out_block">
                      <a class="player-name-img"
                        href="{{ route('cricket_player_profile', ['id' => $bowler_data['bowlerId'], 'slug' => $slug]) }}">
                        <span class="player-name"><img src="{{ $bowler_image }}" class="team_img mr-2"
                            width="20" alt="">
                          {{ @$bowler_data['bowlName'] }}
                        </span></a>
                    </div>
                  </td>
                  <td class="text-center"><strong>{{ @$bowler_data['overs'] }}</strong></td>
                  <td class="text-center">{{ @$bowler_data['maidens'] }}</td>
                  <td class="text-center">{{ @$bowler_data['runs'] }}</td>
                  <td class="text-center">{{ @$bowler_data['wickets'] }}</td>
                  <td class="text-center">{{ @$bowler_data['no_balls'] }}</td>
                  <td class="text-center">{{ @$bowler_data['economy'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      @endif
    </div>
  @endif
  @if (isset($matchScoreCardFourth))
    <div class="tab-pane"
      id="{{ @$bat_team_detailsFour['batTeamShortName'] }}{{ $matchScoreCardFourth->inningsId }}">
      @if (isset($matchScoreCardFourth))
        <div class="strike-table-wrap under-scorecard false table-responsive score_card_table">
          <table class="table strike-table">
            <thead>
              <tr>
                <th>Batsmen</th>
                <th class="text-center how_out_res_td"></th>
                <th class="text-center">R</th>
                <th class="text-center">B</th>
                <th class="text-center">4s</th>
                <th class="text-center">6s</th>
                <th class="text-center">SR</th>
              </tr>
            </thead>
            <tbody>
              @if (isset($bat_team_detailsFour))
                @foreach ($bat_team_detailsFour['batsmenData'] as $batter_data)
                  @php
                    $slug = Str::slug($batter_data['batName']);
                    $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                    $batter_image = $batter_data_info->image;
                  @endphp
                  <tr>
                    <td>
                      <div class="d-flex align-items-center player_out_block">
                        <a class="player-name-img"
                          href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                          <span class="player-name"><img
                              src="{{ @$batter_image ?? asset('backend/images/default_profile.png') }}"
                              class="team_img mr-2" width="20" alt="">
                            {{ @$batter_data['batName'] }}
                          </span></a>
                        <span class="how-out how_out_res">{{ @$batter_data['outDesc'] }}</span>
                      </div>
                    </td>
                    <td class="how_out_res_td"><span class="how-out d-xs-none">{{ @$batter_data['outDesc'] }}</span>
                    </td>
                    <td class="text-center"><strong>{{ @$batter_data['runs'] }}</strong></td>
                    <td class="text-center">{{ @$batter_data['balls'] }}</td>
                    <td class="text-center">{{ @$batter_data['sours'] }}</td>
                    <td class="text-center">{{ @$batter_data['sixes'] }}</td>
                    <td class="text-center">{{ @$batter_data['strikeRate'] }}</td>
                  </tr>
                @endforeach
              @endif
              <tr>
                <td colspan="2"><strong>Extras</strong></td>
                <td colspan="5" class="text-nowrap">
                  <span><strong>{{ @$extra_team_detailsFour->total }}</strong><span class="ml-2">(nb
                      {{ @$extra_team_detailsFour->noBalls }}, w {{ @$extra_team_detailsFour->wides }}, b
                      {{ @$extra_team_detailsFour->byes }}, lb {{ @$extra_team_detailsFour->legByes }},p
                      {{ @$extra_team_detailsFour->penalty }})</span></span>
                </td>
              </tr>
              <tr class="total-table-count">
                <td colspan="2"><strong>Total</strong></td>
                <td colspan="5" class="text-nowrap">
                  <div><strong>{{ @$score_team_detailsFour->runs }}/{{ @$score_team_detailsFour->wickets }}</strong>
                    ({{ @$score_team_detailsFour->overs }} Overs) </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        @php

          foreach ($wickets_team_detailsFour as $wicketData) {
          }

        @endphp
        @if ($wicketData['wktNbr'] != '')
          <div class="similar-blk mb-20">
            <h3 class="tertiary-title">Fall of wickets</h3>
            <div class="fall-wicket-wrap">
              <div class="fall-wicket-wrap-inner">
                @if (isset($wickets_team_detailsFour))
                  @foreach ($wickets_team_detailsFour as $wicketData)
                    <div class="fall-item"><span
                        class="fall-run">{{ @$wicketData['wktNbr'] }}/{{ @$wicketData['wktRuns'] }}</span>
                      <p>{{ @$wicketData['batName'] }} at {{ @$wicketData['wktOver'] }} over</p>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        @endif
        @php

          foreach ($bat_team_detailsFour['batsmenData'] as $batter_data) {
          }

        @endphp
        @if ($batter_data['outDesc'] == '')
          <div class="similar-blk mb-20">
            <h3 class="tertiary-title">Next Batsmen</h3>
            <div class="fall-wicket-wrap">
              @if (isset($bat_team_detailsFour))
                @foreach ($bat_team_detailsFour['batsmenData'] as $batter_data)
                  @php
                    $slug = Str::slug($batter_data['batName']);
                    $batter_data_info = PageRedirectController::player_info($batter_data->batId);
                    $batter_image = $batter_data_info->image;
                  @endphp
                  @if ($batter_data['outDesc'] == '')
                    <div class="fall-wicket-wrap-inner did-not-bat">
                      <a class="player-item shadow-sm"
                        href="{{ route('cricket_player_profile', ['id' => $batter_data['batId'], 'slug' => $slug]) }}">
                        <div class="player-image position-relative">
                          <span><img src="{{ $batter_image ?? asset('backend/images/default_profile.png') }}" class="team_img mr-2" width="20" alt=""></span>
                        </div>
                        <div class="player-name">{{ @$batter_data['batName'] }}</div>
                      </a>
                    </div>
                  @endif
                @endforeach
              @endif
            </div>
          </div>
        @endif
        <div class="strike-table-wrap false">
          <table class="table strike-table">
            <thead>
              <tr>
                <th>Bowlers</th>
                <th class="text-center">O</th>
                <th class="text-center">M</th>
                <th class="text-center">R</th>
                <th class="text-center">W</th>
                <th class="text-center">NB</th>
                <th class="text-center">ER</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bowl_team_detailsFour['bowlersData'] as $bowler_data)
                @php
                  $slug = Str::slug($bowler_data['bowlName']);
                  $bowler_data_info = PageRedirectController::player_info($bowler_data->bowlerId);
                  $bowler_image = $bowler_data_info->image;
                @endphp
                <tr>
                  <td>
                    <div class="d-flex align-items-center player_out_block">
                      <a class="player-name-img"
                        href="{{ route('cricket_player_profile', ['id' => $bowler_data['bowlerId'], 'slug' => $slug]) }}">
                        <span class="player-name"><img src="{{ @$bowler_image ?? asset('backend/images/default_profile.png') }}" class="tram_img mr-2"
                            width="20" alt="">
                          {{ @$bowler_data['bowlName'] }}
                        </span></a>
                    </div>
                  </td>
                  <td class="text-center"><strong>{{ @$bowler_data['overs'] }}</strong></td>
                  <td class="text-center">{{ @$bowler_data['maidens'] }}</td>
                  <td class="text-center">{{ @$bowler_data['runs'] }}</td>
                  <td class="text-center">{{ @$bowler_data['wickets'] }}</td>
                  <td class="text-center">{{ @$bowler_data['no_balls'] }}</td>
                  <td class="text-center">{{ @$bowler_data['economy'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      @endif
    </div>
  @endif
</div>
