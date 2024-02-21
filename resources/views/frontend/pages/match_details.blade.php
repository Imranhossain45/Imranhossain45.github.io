@extends('layouts.frontend.master')
@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;
  use App\Http\Controllers\Redirect\PageRedirectController;

  $header_score = $miniscore->matchScoreDetails->inningsScoreList;
  $latestPerformance = $miniscore->latestPerformance;

@endphp
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
                </div>
              </div>
            </div><!-- Post title end -->
            <div class="score_area block">
              <div style="color: #bc2324">

                @if ($matchHeader->state == 'In Progress')
                  <span class="match_state_live">Live</span>
                @elseif ($matchHeader->state == 'Complete')
                  <span class="match_stat_complete">Complete</span>
                @else
                  <span class="match_stat_schedule">Scheduled</span>
                @endif
              </div>
              <div>
                {{ $matchHeader->seriesName }} | {{ $matchHeader->matchDescription }} |
                {{ \Carbon\Carbon::createFromTimestamp($matchHeader->matchStartTimestamp / 1000)->format('d M Y g.i A') }}


              </div>
              <div class="details_team_info_block">

                @foreach ($header_score as $h_score)
                  @php
                    if ($h_score->batTeamName == $matchHeader->team1->shortName) {
                        $h_score->batTeamName = $matchHeader->team1->name;
                    } else {
                        $h_score->batTeamName = $matchHeader->team2->name;
                    }

                    /*  $team_one_image = SeriesRedirectController::squad_image($matchHeader->team1->imageId);
                    $team_two_image = SeriesRedirectController::squad_image($matchHeader->team2->imageId); */

                  @endphp
                  <div class="d-flex justify-content-between mb-2">

                    <div class="">
                      <img src="" class="header_img" alt="">
                      <span class="team_name">{{ $h_score->batTeamName }}</span>
                    </div>
                    <div class="team_name">

                      {{ $h_score->score }} / {{ $h_score->wickets }}
                    </div>
                  </div>
                @endforeach
                {{-- <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="" class="header_img" alt="">
                    <span class="team_name">{{ $matchHeader->team2->name }} </span>
                  </div>
                  <div class="team_name">
                    {{ $header_score[1]->score }} / {{ $header_score[1]->wickets }}
                  </div>
                </div> --}}
                <div class="mt-2">
                  {{ @$miniscore->status }}
                </div>
              </div><!-- logo col end -->
            </div>
            <div class="mt-3">
              <span class="team_name">Target {{ @$miniscore->target }}</span>
              <div class="d-flex">
                Current Run Rate {{ @$miniscore->currentRunRate }} <span class="mid_dot">•</span> Required Run Rate
                {{ @$miniscore->requiredRunRate }} <span class="mid_dot">•</span>
                {{ @$latestPerformance[0]->label }}
                {{ @$latestPerformance[0]->runs }}/{{ @$latestPerformance[0]->wkts }}
                @isset($latestPerformance[1])
                  <span class="mid_dot">•</span> {{ @$latestPerformance[1]->label }}
                  {{ @$latestPerformance[1]->runs }}/{{ @$latestPerformance[1]->wkts }}
                @endisset
              </div>
            </div>

            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs score_nav_tabs">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#home">Live</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Scorecard"
                    onclick="scorecard_value('{{ $matchId }}')">Scorecard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Commentry">Commentry</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Squads"
                    onclick="squadData('{{ $matchId }}','{{ $teamOneID }}','{{ $teamTwoID }}','{{ $teamOneName }}','{{ $teamTwoName }}')">Squads</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Info"
                    onclick="matchInfo('{{ $matchId }}')">Info</a>
                </li>
                {{--  <li class="nav-item">
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
                </li> --}}
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  {{-- <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th scope="col">Pos</th>
                        <th scope="col">Team</th>
                        <th scope="col">Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i <= 9; $i++)
                        <tr>
                          <th scope="row">1</th>
                          <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                          </td>
                          <td>121</td>
                        </tr>
                      @endfor

                    </tbody>
                  </table> --}}
                  <div class="strike-table-wrap  live table-responsive score_card_table">
                    <table class="table strike-table">
                      <thead>
                        <tr>
                          <th>Batsmen</th>
                          <th class="text-center"></th>
                          <th class="text-center">R</th>
                          <th class="text-center">B</th>
                          <th class="text-center">4s</th>
                          <th class="text-center">6s</th>
                          <th class="text-center">SR</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php

                          $batsmanStriker = $miniscore->batsmanStriker;
                          $batsmanNonStriker = $miniscore->batsmanNonStriker;

                          $bowlerStriker = $miniscore->bowlerStriker;
                          $bowlerNonStriker = $miniscore->bowlerNonStriker;

                          $recent = $miniscore->recentOvsStats;

                          $batsmanStriker_info = PageRedirectController::player_info($batsmanStriker->batId);
                          $batsmanStriker_image = $batsmanStriker_info->image;

                          /* $batsmanStriker_imageId = $batsmanStriker_info->faceImageId;
 $batsmanStriker_image = SeriesRedirectController::squad_image($batsmanStriker_imageId); */

                          $batsmanNonStriker_info = PageRedirectController::player_info($batsmanNonStriker->batId);
                          $batsmanNonStriker_image = $batsmanNonStriker_info->image;

                          /*  $batsmanNonStriker_imageId = $batsmanNonStriker_info->faceImageId;
 $batsmanStriker_image = SeriesRedirectController::squad_image($batsmanNonStriker_imageId); */

                          $bowlerStriker_info = PageRedirectController::player_info($bowlerStriker->bowlId);
                          $bowlerStriker_image = $bowlerStriker_info->image;

                          $bowlerNonStriker_info = PageRedirectController::player_info($bowlerNonStriker->bowlId);
                          $bowlerNonStriker_image = $bowlerNonStriker_info->image;

                        @endphp
                        <tr>
                          <td>
                            <div class="d-flex align-items-center player_out_block">
                              <a class="player-name-img"
                                href="{{ route('cricket_player_profile', ['id' => $batsmanStriker->batId, 'slug' => Str::slug($batsmanStriker->batName)]) }}">
                                <span class="player-name"><img src="{{ $batsmanStriker_image }}" class="team_img mr-2"
                                    width="20" alt="">{{ $batsmanStriker->batName }}</span></a>
                              <span class="how-out how_out_res"></span>
                            </div>
                          </td>
                          <td class="how_out_res_td"><span class="how-out d-xs-none"></span>
                          </td>
                          <td class="text-center"><strong>{{ $batsmanStriker->batRuns }}</strong></td>
                          <td class="text-center">{{ $batsmanStriker->batBalls }}</td>
                          <td class="text-center">{{ $batsmanStriker->batFours }}</td>
                          <td class="text-center">{{ $batsmanStriker->batSixes }}</td>
                          <td class="text-center">{{ $batsmanStriker->batStrikeRate }}</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center player_out_block">
                              {{-- {{ route('cricket_player_profile',['id'=>$batsmanNonStriker->batId,'slug'=>Str::slug(@$batsmanNonStriker->batName)]) }} --}}
                              <a class="player-name-img" href="">
                                <span class="player-name">
                                  <img src="{{ $batsmanNonStriker_image }}" class="team_img mr-2" width="20"
                                    alt="">{{ $batsmanNonStriker->batName }}</span></a>
                              <span class="how-out how_out_res"></span>
                            </div>
                          </td>
                          <td class="how_out_res_td"><span class="how-out d-xs-none"></span>
                          </td>
                          <td class="text-center"><strong>{{ $batsmanNonStriker->batRuns }}</strong></td>
                          <td class="text-center">{{ $batsmanNonStriker->batBalls }}</td>
                          <td class="text-center">{{ $batsmanNonStriker->batFours }}</td>
                          <td class="text-center">{{ $batsmanNonStriker->batSixes }}</td>
                          <td class="text-center">{{ $batsmanNonStriker->batStrikeRate }}</td>
                        </tr>
                        <tr>
                          <td colspan="7">
                            <div class="current-partnership">
                              <div class="partnership-single-info"><strong>Current Partnership:
                                </strong><strong>{{ $miniscore->partnerShip->runs }}({{ $miniscore->partnerShip->balls }})</strong>
                              </div>
                              <div class="partnership-single-info"><strong> <span class="separator-line">|</span> Last
                                  Wicket: </strong><strong>
                                  <a class="player-name-img" href="#"><span
                                      class="player-name">{{ @$miniscore->lastWicket }}</span></a>
                                </strong>


                                {{-- <strong> 1 (3)</strong></div>


                              <div class="partnership-single-info"><strong> <span class="separator-line">|</span> Fall
                                  of Wicket: </strong><strong>213/8 (47.2 ov)</strong></div> --}}
                              </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="strike-table-wrap live table-responsive score_card_table">
                    <table class="table strike-table">
                      <thead>
                        <tr>
                          <th>Bowlers</th>
                          <th class="text-center">O</th>
                          <th class="text-center">M</th>
                          <th class="text-center">R</th>
                          <th class="text-center">W</th>
                          <th class="text-center">ER</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <a class="player-name-img"
                              href="{{ route('cricket_player_profile', ['id' => $bowlerStriker->bowlId, 'slug' => Str::slug($bowlerStriker->bowlName)]) }}">
                              <span class="player-name">
                                <img src="{{ $bowlerStriker_image }}" class="team_img mr-2"
                                  width="20">{{ $bowlerStriker->bowlName }}</span></a>
                          </td>
                          <td class="text-center">{{ $bowlerStriker->bowlOvs }}</td>
                          <td class="text-center">{{ $bowlerStriker->bowlMaidens }}</td>
                          <td class="text-center">{{ $bowlerStriker->bowlRuns }}</td>
                          <td class="text-center"><strong>{{ $bowlerStriker->bowlWkts }}</strong></td>
                          <td class="text-center">{{ $bowlerStriker->bowlEcon }}</td>
                        </tr>
                        <tr>
                          <td>
                            <a class="player-name-img"
                              href="{{ route('cricket_player_profile', ['id' => $bowlerNonStriker->bowlId, 'slug' => Str::slug($bowlerNonStriker->bowlName)]) }}">
                              <span class="player-name">
                                <img src="{{ $bowlerNonStriker_image }}" class="team_img mr-2" width="20"
                                  alt="">{{ $bowlerNonStriker->bowlName }}</span></a>
                          </td>
                          <td class="text-center">{{ $bowlerNonStriker->bowlOvs }}</td>
                          <td class="text-center">{{ $bowlerNonStriker->bowlMaidens }}</td>
                          <td class="text-center">{{ $bowlerNonStriker->bowlRuns }}</td>
                          <td class="text-center"><strong>{{ $bowlerNonStriker->bowlWkts }}</strong></td>
                          <td class="text-center">{{ $bowlerNonStriker->bowlEcon }}</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                  <div class="similar-blk mb-20">
                    <h3 class="tertiary-title">Recent</h3>
                    <div class="over-wrap">
                      <div class="over-wrap">
                        <div class="over-wrap">


                          @foreach (explode('|', $recent) as $ballStats)
                            @foreach (explode(' ', trim($ballStats)) as $run)
                              @if ($run == 'L1')
                                <span class="ball-of-overend"></span>
                              @else
                                @php
                                  $class = $run === 'w' ? 'red-bg' : ($run === '0' ? '' : 'green-bg');
                                @endphp

                                <span class="ball-of-over {{ $class }}">{{ $run }}</span>
                              @endif
                            @endforeach
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="commentary-list-area mt-3">
                    <div class="similar-blk ">
                      <h3 class="tertiary-title mb-10">Live Commentary</h3>
                    </div>
                    <div class="similar-blk ">
                      {{--  @if (isset($cricket_api_data))
                        @php $endOfOver = false; @endphp
                        @foreach ($cricket_api_data->comments->Live as $comment)
                          @if ($endOfOver)
                            <div>
                              <div>
                                <div class="hybried-title mb-10">
                                  <div class="h-left-roudn">
                                    <span class="end-of-over">End of Over</span>
                                    <span class="round-ou">
                                      <span class="round-in">{{ $comment->overs }}</span>
                                    </span>
                                  </div>
                                  <div class="h-right-content">
                                    <div class="top-bar">
                                      <p>{{ $comment->innings }} {{ $comment->runs }}</p>
                                      <ul class="h-current-statistics">
                                        <li>Runs: {{ $comment->runs }}</li>
                                      </ul>
                                    </div>
                                    <div class="bottom-bar">
                                      <div class="btm-bar-left-p">
                                        <!-- Include player details -->
                                        <p></p>
                                        <p></p>
                                      </div>
                                      <div class="btm-bar-right-p">
                                        <!-- Include bowler details -->
                                        <p></p>
                                        <p></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @php $endOfOver = false; @endphp
                          @else
                            <div>
                              <div class="commentry-common-wrap">
                                <div class="single-comentry gray-bgg light-green-bgg">
                                  <div class="left-trans-over">{{ $comment->overs }} <span
                                      class="over-oval @if ($comment->ended === 'No') {{ $comment->runs === 'w' ? 'red-bg' : ($comment->runs === '0' ? ' ' : 'green-bg') }} @endif">
                                      {{ $comment->runs }}
                                    </span></div>
                                  <p>{{ $comment->post }}</p>
                                </div>
                              </div>
                            </div>
                            @if ($comment->ended === 'Yes')
                              @php $endOfOver = true; @endphp
                            @endif
                          @endif
                        @endforeach
                      @endif --}}

                      @foreach ($commentary as $index => $comment)
                        <div>
                          <div class="commentry-common-wrap">
                            <div class="single-comentry gray-bgg light-green-bgg">
                              @isset($comment->overNumber)
                                <div class="left-trans-over">{{ @$comment->overNumber }} {{-- <span
                                      class="over-oval @if ($comment->ended === 'No') {{ $comment->runs === 'w' ? 'red-bg' : ($comment->runs === '0' ? ' ' : 'green-bg') }} @endif">
                                      {{ $comment->runs }}
                                    </span> --}}</div>
                              @endisset


                              @isset($comment->commentaryFormats->bold)
                                @foreach ($comment->commentaryFormats->bold->formatValue as $fvalue)
                                  @php
                                    $fvalueData = $fvalue;
                                  @endphp
                                @endforeach
                              @endisset
                              <p>

                                @isset($fvalueData)
                                  @php
                                    $string = ['B0$', '\n', 'B1$'];
                                    $replace = [$fvalueData, '<br>', $fvalueData];
                                  @endphp
                                  {!! str_replace($string, $replace, @$comment->commText) !!}
                                @else
                                  {{ @$comment->commText }}
                                @endisset


                              </p>
                            </div>
                          </div>
                        </div>
                      @endforeach
                      {{-- <div>
                        <div></div>
                        <div class="hybried-title mb-10">
                          <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                              class="round-ou"><span class="round-in">45</span></span></div>
                          <div class="h-right-content">
                            <div class="top-bar">
                              <p>United Arab Emirates Under-19s 202/6</p>
                              <ul class="h-current-statistics">
                                <li>Runs: 9</li>
                              </ul>
                            </div>
                            <div class="bottom-bar">
                              <div class="btm-bar-left-p">
                                <p>Ammar Badami : 11 (10)</p>
                                <p>Aayan Khan : 29 (43)</p>
                              </div>
                              <div class="btm-bar-right-p">
                                <p>Garuka Sanketh : 10-0-35-3</p>
                                <p>Vihas Thevmika : 9-1-46-1</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="tab-pane scorecard_value" id="Scorecard">
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
                <div class="tab-pane" id="Commentry">
                  <ul class="nav nav-tabs score_nav_tabs justify-content-between">
                    <li class="nav-item score_board_nav_link">
                      <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab"
                        href="#cBangladesh">{{ @$matchHeader->team1->name }}</a>
                    </li>
                    <li class="nav-item score_board_nav_link">
                      <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab"
                        href="#cIndia">{{ @$matchHeader->team2->name }}</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="cBangladesh">
                      <div class="tb-content-wrap inner-1">
                        <div class="commentary-area mt-20">
                          <div class="row">
                            {{-- <div class="col-lg-2">
                              <div class="commentary-filter-area">
                                <div class="single-commentary-filter-box mb-20">
                                  <h3>Highlights</h3>
                                  <ul class="m-d-flex">
                                    <li class="all active"><a>All</a></li>
                                    <li class="all false"><a>Fours</a></li>
                                    <li class="all false"><a>Sixes</a></li>
                                    <li class="all false"><a>Wickets</a></li>
                                  </ul>
                                </div>
                                <div class="row commentary-batsmen-bowler-filter">
                                  <div class="col-6 col-lg-12 single-commentary-filter-box mb-20">
                                    <h3>Batsmen</h3>
                                    <ul class="batsman_res">
                                      <li class="all false"><a>Pulindu Perera</a></li>
                                      <li class="all false"><a>Hirun Kapurubandara</a></li>
                                      <li class="all false"><a>Sineth Jayawardene</a></li>
                                      <li class="all false"><a>Rusanda Gamage</a></li>
                                      <li class="all false"><a>Dinura Kalupahana</a></li>
                                      <li class="all false"><a>Sharujan Shanmuganathan</a></li>
                                      <li class="all false"><a>Vihas Thevmika</a></li>
                                      <li class="all false"><a>Malsha Tharupathi</a></li>
                                      <li class="all false"><a>Vishva Lahiru</a></li>
                                      <li class="all false"><a>Duvindu Ranatunga</a></li>
                                    </ul>
                                    <div class="filter-select-wrapper batsman_wrapprer_res">
                                      <select class="form-control">
                                        <option>Pulindu Perera</option>
                                        <option>Hirun Kapurubandara</option>
                                        <option>Sineth Jayawardene</option>
                                        <option>Rusanda Gamage</option>
                                        <option>Dinura Kalupahana</option>
                                        <option>Sharujan Shanmuganathan</option>
                                        <option>Vihas Thevmika</option>
                                        <option>Malsha Tharupathi</option>
                                        <option>Vishva Lahiru</option>
                                        <option>Duvindu Ranatunga</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-6 col-lg-12 single-commentary-filter-box mb-20">
                                    <h3>Bowlers</h3>
                                    <ul class="batsman_res">
                                      <li class="all false"><a>Omid Rahman</a></li>
                                      <li class="all false"><a>Ayman Ahamed</a></li>
                                      <li class="all false"><a>Dhruv Parashar</a></li>
                                      <li class="all false"><a>Aayan Khan</a></li>
                                      <li class="all false"><a>Hardik Pai</a></li>
                                    </ul>
                                    <div class="filter-select-wrapper batsman_wrapprer_res">
                                      <select class="form-control">
                                        <option>Omid Rahman</option>
                                        <option>Ayman Ahamed</option>
                                        <option>Dhruv Parashar</option>
                                        <option>Aayan Khan</option>
                                        <option>Hardik Pai</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> --}}
                            <div class="">
                              <div class="commentary-list-area">
                                <div class="similar-blk ">
                                  @foreach ($commentary as $index => $comment)
                                    <div>
                                      <div class="commentry-common-wrap">
                                        <div class="single-comentry gray-bgg light-green-bgg">
                                          @isset($comment->overNumber)
                                            <div class="left-trans-over">{{ @$comment->overNumber }} {{-- <span
                                      class="over-oval @if ($comment->ended === 'No') {{ $comment->runs === 'w' ? 'red-bg' : ($comment->runs === '0' ? ' ' : 'green-bg') }} @endif">
                                      {{ $comment->runs }}
                                    </span> --}}
                                            </div>
                                          @endisset


                                          @isset($comment->commentaryFormats->bold)
                                            @foreach ($comment->commentaryFormats->bold->formatValue as $fvalue)
                                              @php
                                                $fvalueData = $fvalue;
                                              @endphp
                                            @endforeach
                                          @endisset
                                          <p>

                                            @isset($fvalueData)
                                              @php
                                                $string = ['B0$', '\n', 'B1$'];
                                                $replace = [$fvalueData, '<br>', $fvalueData];
                                              @endphp
                                              {!! str_replace($string, $replace, @$comment->commText) !!}
                                            @else
                                              {{ @$comment->commText }}
                                            @endisset


                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="tab-pane" id="cIndia">
                      <div class="tb-content-wrap inner-1">
                        <div class="commentary-area mt-20">
                          <div class="row">
                            {{-- <div class="col-lg-2">
                              <div class="commentary-filter-area">
                                <div class="single-commentary-filter-box mb-20">
                                  <h3>Highlights</h3>
                                  <ul class="m-d-flex">
                                    <li class="all active"><a>All</a></li>
                                    <li class="all false"><a>Fours</a></li>
                                    <li class="all false"><a>Sixes</a></li>
                                    <li class="all false"><a>Wickets</a></li>
                                  </ul>
                                </div>
                                <div class="row commentary-batsmen-bowler-filter">
                                  <div class="col-6 col-lg-12 single-commentary-filter-box mb-20">
                                    <h3>Batsmen</h3>
                                    <ul class="">
                                      <li class="all false"><a>Pulindu Perera</a></li>
                                      <li class="all false"><a>Hirun Kapurubandara</a></li>
                                      <li class="all false"><a>Sineth Jayawardene</a></li>
                                      <li class="all false"><a>Rusanda Gamage</a></li>
                                      <li class="all false"><a>Dinura Kalupahana</a></li>
                                      <li class="all false"><a>Sharujan Shanmuganathan</a></li>
                                      <li class="all false"><a>Vihas Thevmika</a></li>
                                      <li class="all false"><a>Malsha Tharupathi</a></li>
                                      <li class="all false"><a>Vishva Lahiru</a></li>
                                      <li class="all false"><a>Duvindu Ranatunga</a></li>
                                    </ul>
                                    <div class="filter-select-wrapper d-sm-block">
                                      <select class="form-control">
                                        <option>Pulindu Perera</option>
                                        <option>Hirun Kapurubandara</option>
                                        <option>Sineth Jayawardene</option>
                                        <option>Rusanda Gamage</option>
                                        <option>Dinura Kalupahana</option>
                                        <option>Sharujan Shanmuganathan</option>
                                        <option>Vihas Thevmika</option>
                                        <option>Malsha Tharupathi</option>
                                        <option>Vishva Lahiru</option>
                                        <option>Duvindu Ranatunga</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-6 col-lg-12 single-commentary-filter-box mb-20">
                                    <h3>Bowlers</h3>
                                    <ul class="m-d-none">
                                      <li class="all false"><a>Omid Rahman</a></li>
                                      <li class="all false"><a>Ayman Ahamed</a></li>
                                      <li class="all false"><a>Dhruv Parashar</a></li>
                                      <li class="all false"><a>Aayan Khan</a></li>
                                      <li class="all false"><a>Hardik Pai</a></li>
                                    </ul>
                                    <div class="filter-select-wrapper m-d-block">
                                      <select class="form-control">
                                        <option>Omid Rahman</option>
                                        <option>Ayman Ahamed</option>
                                        <option>Dhruv Parashar</option>
                                        <option>Aayan Khan</option>
                                        <option>Hardik Pai</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> --}}
                            <div class="col-lg-12">
                              <div class="commentary-list-area">
                                <div class="similar-blk ">
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">50</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 220/9</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Duvindu Ranatunga : 1 (1)</p>
                                            <p>Dinura Kalupahana : 56 (87)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 10-0-53-1</p>
                                            <p>Omid Rahman : 10-0-48-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">49.6 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Duvindu Ranatunga runout (A Sharma / H Pai), Ayman Ahamed to Duvindu Ranatunga,
                                          1 run, runout (A Sharma / H Pai),</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">49.5 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Vishva Lahiru c D Parashar b A Ahamed, Ayman Ahamed to Vishva Lahiru, no run, c
                                          D Parashar b A Ahamed,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">49.4 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Ayman Ahamed to Vishva Lahiru, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">49.3 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">49.2 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">49.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">49</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 212/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 6</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 53 (84)</p>
                                            <p>Vishva Lahiru : 22 (28)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 10-0-48-2</p>
                                            <p>Ayman Ahamed : 9-0-45-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.6 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.5 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.4 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.3 <span class="over-oval  ">2</span></div>
                                        <p> Omid Rahman to Vishva Lahiru, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.2 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">48.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">48</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 206/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 7</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vishva Lahiru : 18 (24)</p>
                                            <p>Dinura Kalupahana : 51 (82)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 9-0-45-0</p>
                                            <p>Dhruv Parashar : 10-0-43-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.6 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.5 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.4 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.3 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.2 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">47.1 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">47</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 199/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 6</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 49 (80)</p>
                                            <p>Vishva Lahiru : 13 (20)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 10-0-43-1</p>
                                            <p>Ayman Ahamed : 8-0-38-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">46.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">46.5 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">46.4 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">46.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">46.2 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">46.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">46</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 193/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 6</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 44 (76)</p>
                                            <p>Vishva Lahiru : 12 (18)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 8-0-38-0</p>
                                            <p>Dhruv Parashar : 9-0-37-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.6 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.5 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.4 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">45.1 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">45</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 187/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 3</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 39 (71)</p>
                                            <p>Vishva Lahiru : 11 (17)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 9-0-37-1</p>
                                            <p>Ayman Ahamed : 7-0-32-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.5 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.4 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.3 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.2 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">44.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">44</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 184/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vishva Lahiru : 10 (14)</p>
                                            <p>Dinura Kalupahana : 37 (68)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 7-0-32-0</p>
                                            <p>Dhruv Parashar : 8-0-34-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.6 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.5 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.4 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.2 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">43.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">43</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 182/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 36 (66)</p>
                                            <p>Vishva Lahiru : 9 (10)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 8-0-34-1</p>
                                            <p>Aayan Khan : 10-1-38-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.6 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.4 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.3 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.2 <span class="over-oval  ">3</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 3 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">42.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">42</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 174/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 32 (63)</p>
                                            <p>Vishva Lahiru : 5 (7)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 10-1-38-2</p>
                                            <p>Dhruv Parashar : 7-0-26-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.4 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Vishva Lahiru, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.2 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">41.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">41</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 172/7</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vishva Lahiru : 4 (5)</p>
                                            <p>Dinura Kalupahana : 31 (59)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 7-0-26-1</p>
                                            <p>Aayan Khan : 9-1-36-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">40.6 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">40.5 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">40.4 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">40.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">40.2 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vishva Lahiru, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">40.1 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Malsha Tharupathi c Akshat Rai b D Parashar, Dhruv Parashar to Malsha
                                          Tharupathi, no run, c Akshat Rai b D Parashar,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">40</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 168/6</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 31 (59)</p>
                                            <p>Malsha Tharupathi : 9 (7)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 9-1-36-2</p>
                                            <p>Ayman Ahamed : 6-0-30-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.6 <span class="over-oval  ">2</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.5 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Malsha Tharupathi, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Malsha Tharupathi, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.3 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.2 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">39.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">39</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 164/6</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 5</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 28 (55)</p>
                                            <p>Malsha Tharupathi : 8 (5)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 6-0-30-0</p>
                                            <p>Omid Rahman : 9-0-42-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.6 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.5 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.4 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Malsha Tharupathi, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.3 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.2 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Malsha Tharupathi, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">38.1 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">38</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 159/6</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 25 (51)</p>
                                            <p>Malsha Tharupathi : 6 (3)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 9-0-42-2</p>
                                            <p>Ayman Ahamed : 5-0-25-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">37.6 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">37.5 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Malsha Tharupathi, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">37.4 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">37.3 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Malsha Tharupathi, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">37.2 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Omid Rahman to Malsha Tharupathi, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">37.1 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Vihas Thevmika lbw b O Rahman, Omid Rahman to Vihas Thevmika, no run, lbw b O
                                          Rahman,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">37</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 151/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 23 (49)</p>
                                            <p>Vihas Thevmika : 8 (20)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 5-0-25-0</p>
                                            <p>Omid Rahman : 8-0-34-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.6 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.5 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.4 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">36.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">36</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 149/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vihas Thevmika : 8 (20)</p>
                                            <p>Dinura Kalupahana : 21 (43)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 8-0-34-1</p>
                                            <p>Hardik Pai : 10-1-30-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.6 <span class="over-oval  ">2</span></div>
                                        <p> Omid Rahman to Vihas Thevmika, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.5 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.4 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.3 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.2 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">35.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">35</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 145/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 20 (39)</p>
                                            <p>Vihas Thevmika : 5 (18)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 10-1-30-1</p>
                                            <p>Dhruv Parashar : 6-0-22-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.5 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.4 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.2 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">34.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">34</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 143/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 5</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 19 (36)</p>
                                            <p>Vihas Thevmika : 4 (15)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 6-0-22-0</p>
                                            <p>Hardik Pai : 9-1-28-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.6 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.4 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.3 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.2 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">33.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">33</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 138/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 5</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vihas Thevmika : 2 (13)</p>
                                            <p>Dinura Kalupahana : 16 (32)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 9-1-28-1</p>
                                            <p>Dhruv Parashar : 5-0-17-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">32.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">32.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">32.4 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">32.3 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Hardik Pai to Dinura Kalupahana, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">32.2 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">32.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">32</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 133/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 5</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vihas Thevmika : 2 (11)</p>
                                            <p>Dinura Kalupahana : 11 (28)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 5-0-17-0</p>
                                            <p>Hardik Pai : 8-1-23-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.4 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.3 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.2 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">31.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">31</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 128/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 0</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vihas Thevmika : 1 (9)</p>
                                            <p>Dinura Kalupahana : 7 (24)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 8-1-23-1</p>
                                            <p>Aayan Khan : 8-1-32-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.4 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.2 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">30.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">30</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 128/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 7 (24)</p>
                                            <p>Vihas Thevmika : 1 (3)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 8-1-32-2</p>
                                            <p>Hardik Pai : 7-0-23-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.6 <span class="over-oval  ">4lb</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 4 leg bye,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.2 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">29.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">29</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 124/5</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Vihas Thevmika : 1 (3)</p>
                                            <p>Dinura Kalupahana : 7 (18)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 7-0-23-1</p>
                                            <p>Aayan Khan : 7-0-32-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">28.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">28.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">28.4 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">28.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">28.2 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Vihas Thevmika, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">28.1 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Sharujan Shanmuganathan c A Sharma b H Pai, Hardik Pai to Sharujan
                                          Shanmuganathan, no run, c A Sharma b H Pai,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">28</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 122/4</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 6 (16)</p>
                                            <p>Sharujan Shanmuganathan : 3 (4)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 7-0-32-2</p>
                                            <p>Hardik Pai : 6-0-21-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.5 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Sharujan Shanmuganathan, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.4 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.2 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">27.1 <span class="over-oval  ">2</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">27</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 118/4</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 3</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sharujan Shanmuganathan : 2 (3)</p>
                                            <p>Dinura Kalupahana : 3 (11)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 6-0-21-0</p>
                                            <p>Aayan Khan : 6-0-28-2</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sharujan Shanmuganathan, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.5 <span class="over-oval  ">2</span></div>
                                        <p> Hardik Pai to Sharujan Shanmuganathan, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.4 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.2 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">26.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">26</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 115/4</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 1</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sharujan Shanmuganathan : 0 (1)</p>
                                            <p>Dinura Kalupahana : 2 (7)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 6-0-28-2</p>
                                            <p>Hardik Pai : 5-0-18-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">25.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sharujan Shanmuganathan, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">25.5 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Rusanda Gamage c O Rahman b A Khan, Aayan Khan to Rusanda Gamage, no run, c O
                                          Rahman b A Khan,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">25.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">25.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">25.2 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">25.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">25</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 114/3</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Dinura Kalupahana : 1 (5)</p>
                                            <p>Rusanda Gamage : 26 (36)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 5-0-18-0</p>
                                            <p>Omid Rahman : 7-0-30-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.6 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.4 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.2 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Dinura Kalupahana, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">24.1 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">24</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 112/3</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 49 (65)</p>
                                            <p>Rusanda Gamage : 25 (35)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 7-0-30-1</p>
                                            <p>Hardik Pai : 4-0-16-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">23.6 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Sineth Jayawardene runout (A Sharma / H Pai), Omid Rahman to Sineth
                                          Jayawardene, no run, runout (A Sharma / H Pai),</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">23.5 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">23.4 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">23.3 <span class="over-oval  ">1lb</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 leg bye,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">23.2 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">23.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">23</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 108/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 23 (33)</p>
                                            <p>Sineth Jayawardene : 48 (61)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 4-0-16-0</p>
                                            <p>Omid Rahman : 6-0-27-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">22.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">22.5 <span class="over-oval  ">2</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">22.4 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Hardik Pai to Rusanda Gamage, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">22.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">22.2 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">22.1 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">22</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 100/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 47 (60)</p>
                                            <p>Rusanda Gamage : 16 (28)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 6-0-27-1</p>
                                            <p>Hardik Pai : 3-0-8-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.6 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.5 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.4 <span class="over-oval  ">2</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.3 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.2 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">21.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">21</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 96/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 3</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 44 (56)</p>
                                            <p>Rusanda Gamage : 15 (26)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 3-0-8-0</p>
                                            <p>Omid Rahman : 5-0-23-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.6 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.5 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.4 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.2 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">20.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">20</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 93/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 14 (23)</p>
                                            <p>Sineth Jayawardene : 42 (53)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 5-0-23-1</p>
                                            <p>Hardik Pai : 2-0-5-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.6 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.5 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.4 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.3 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.2 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">19.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">19</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 91/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 3</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 41 (50)</p>
                                            <p>Rusanda Gamage : 13 (20)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 2-0-5-0</p>
                                            <p>Aayan Khan : 5-0-27-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.4 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.3 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.2 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">18.1 <span class="over-oval  ">1</span></div>
                                        <p> Hardik Pai to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">18</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 88/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 9</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 40 (47)</p>
                                            <p>Rusanda Gamage : 11 (17)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 5-0-27-1</p>
                                            <p>Hardik Pai : 1-0-2-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">17.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">17.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">17.4 <span class="over-oval  ">2</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">17.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">17.2 <span class="over-oval green-bg ">6</span>
                                        </div>
                                        <p> Aayan Khan to Sineth Jayawardene, Six,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">17.1 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">17</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 79/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 32 (42)</p>
                                            <p>Rusanda Gamage : 10 (16)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Hardik Pai : 1-0-2-0</p>
                                            <p>Aayan Khan : 4-0-18-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.6 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.5 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.4 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.3 <span class="over-oval  ">2</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.2 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">16.1 <span class="over-oval  ">0</span></div>
                                        <p> Hardik Pai to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">16</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 77/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 13</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 30 (36)</p>
                                            <p>Rusanda Gamage : 10 (16)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 4-0-18-1</p>
                                            <p>Dhruv Parashar : 4-0-12-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">15.6 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">15.5 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">15.4 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Aayan Khan to Rusanda Gamage, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">15.3 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">15.2 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">15.1 <span class="over-oval green-bg ">6</span>
                                        </div>
                                        <p> Aayan Khan to Sineth Jayawardene, Six,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">15</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 64/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 6</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 5 (13)</p>
                                            <p>Sineth Jayawardene : 22 (33)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 4-0-12-0</p>
                                            <p>Aayan Khan : 3-0-5-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">14.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">14.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">14.4 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">14.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">14.2 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">14.1 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">14</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 58/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 4 (11)</p>
                                            <p>Sineth Jayawardene : 17 (29)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 3-0-5-1</p>
                                            <p>Dhruv Parashar : 3-0-6-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.6 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.3 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.2 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">13.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">13</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 56/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 3 (8)</p>
                                            <p>Sineth Jayawardene : 16 (26)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 3-0-6-0</p>
                                            <p>Aayan Khan : 2-0-3-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.4 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.2 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">12.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">12</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 54/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 15 (23)</p>
                                            <p>Rusanda Gamage : 2 (5)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 2-0-3-1</p>
                                            <p>Dhruv Parashar : 2-0-4-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.3 <span class="over-oval  ">2</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.2 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">11.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">11</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 52/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 3</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 2 (5)</p>
                                            <p>Sineth Jayawardene : 13 (17)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 2-0-4-0</p>
                                            <p>Aayan Khan : 1-0-1-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.6 <span class="over-oval  ">2</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.5 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.4 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.2 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">10.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">10</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 49/2</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 1</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Rusanda Gamage : 0 (3)</p>
                                            <p>Sineth Jayawardene : 12 (13)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Aayan Khan : 1-0-1-1</p>
                                            <p>Dhruv Parashar : 1-0-1-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">9.6 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">9.5 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">9.4 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Rusanda Gamage, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">9.3 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Pulindu Perera c D Parashar b A Khan, Aayan Khan to Pulindu Perera, no run, c D
                                          Parashar b A Khan,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">9.2 <span class="over-oval  ">1</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">9.1 <span class="over-oval  ">0</span></div>
                                        <p> Aayan Khan to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">9</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 48/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 1</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 24 (33)</p>
                                            <p>Sineth Jayawardene : 11 (11)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Dhruv Parashar : 1-0-1-0</p>
                                            <p>Ayman Ahamed : 4-0-23-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.6 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.5 <span class="over-oval  ">1</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.4 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.3 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.2 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">8.1 <span class="over-oval  ">0</span></div>
                                        <p> Dhruv Parashar to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">8</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 47/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 24 (32)</p>
                                            <p>Sineth Jayawardene : 10 (6)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 4-0-23-0</p>
                                            <p>Omid Rahman : 4-0-21-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">7.6 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Ayman Ahamed to Pulindu Perera, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">7.5 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">7.4 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Ayman Ahamed to Pulindu Perera, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">7.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">7.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">7.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">7</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 39/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 10 (6)</p>
                                            <p>Pulindu Perera : 16 (26)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 4-0-21-1</p>
                                            <p>Ayman Ahamed : 3-0-15-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">6.6 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Omid Rahman to Sineth Jayawardene, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">6.5 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">6.4 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">6.3 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">6.2 <span class="over-oval  ">2</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">6.1 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">6</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 31/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 5</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 13 (22)</p>
                                            <p>Sineth Jayawardene : 5 (4)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 3-0-15-0</p>
                                            <p>Omid Rahman : 3-0-13-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.6 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.6 <span class="over-oval  ">1wd</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.5 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.4 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.3 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">5.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">5</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 26/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 8</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Sineth Jayawardene : 5 (4)</p>
                                            <p>Pulindu Perera : 9 (16)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 3-0-13-1</p>
                                            <p>Ayman Ahamed : 2-0-10-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">4.6 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">4.5 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">4.4 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">4.3 <span class="over-oval  ">2</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">4.2 <span class="over-oval  ">1</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">4.1 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Omid Rahman to Sineth Jayawardene, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">4</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 18/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 11</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 6 (13)</p>
                                            <p>Sineth Jayawardene : 0 (1)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 2-0-10-0</p>
                                            <p>Omid Rahman : 2-0-5-1</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.6 <span class="over-oval  ">2</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, 2 runs,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.5 <span class="over-oval  ">2lb</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, 2 leg bye,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg light-green-bgg ">
                                        <div class="left-trans-over">3.4 <span class="over-oval green-bg ">4</span>
                                        </div>
                                        <p> Ayman Ahamed to Pulindu Perera, Four,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">3.1 <span class="over-oval  ">3wd</span></div>
                                        <p> Ayman Ahamed to Sineth Jayawardene, 3 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div></div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">3</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 7/1</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 4</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 0 (7)</p>
                                            <p>Sineth Jayawardene : 0 (1)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 2-0-5-1</p>
                                            <p>Ayman Ahamed : 1-0-1-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.6 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.5 <span class="over-oval  ">1lb</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 leg bye,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.5 <span class="over-oval  ">1wd</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.5 <span class="over-oval  ">1wd</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.5 <span class="over-oval  ">1wd</span></div>
                                        <p> Omid Rahman to Sineth Jayawardene, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  light-red-bgg">
                                        <div class="left-trans-over">2.4 <span class="over-oval  red-bg">w</span>
                                        </div>
                                        <p>Hirun Kapurubandara b O Rahman, Omid Rahman to Hirun Kapurubandara, no run, b O
                                          Rahman,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.3 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.2 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">2.1 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">2</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 3/0</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 1</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Hirun Kapurubandara : 1 (6)</p>
                                            <p>Pulindu Perera : 0 (6)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Ayman Ahamed : 1-0-1-0</p>
                                            <p>Omid Rahman : 1-0-2-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.6 <span class="over-oval  ">1</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, 1 run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.5 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.4 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.3 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.2 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">1.1 <span class="over-oval  ">0</span></div>
                                        <p> Ayman Ahamed to Hirun Kapurubandara, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="hybried-title mb-10">
                                      <div class="h-left-roudn"><span class="end-of-over">End of Over</span><span
                                          class="round-ou"><span class="round-in">1</span></span></div>
                                      <div class="h-right-content">
                                        <div class="top-bar">
                                          <p>Sri Lanka Under-19s 2/0</p>
                                          <ul class="h-current-statistics">
                                            <li>Runs: 2</li>
                                          </ul>
                                        </div>
                                        <div class="bottom-bar">
                                          <div class="btm-bar-left-p">
                                            <p>Pulindu Perera : 0 (6)</p>
                                            <p>Hirun Kapurubandara : 0 (0)</p>
                                          </div>
                                          <div class="btm-bar-right-p">
                                            <p>Omid Rahman : 1-0-2-0</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.6 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.6 <span class="over-oval  ">1wd</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.5 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.4 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.3 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.3 <span class="over-oval  ">1wd</span></div>
                                        <p> Omid Rahman to Pulindu Perera, 1 wide,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.2 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div>
                                    <div class="commentry-common-wrap">
                                      <div class="single-comentry gray-bgg  ">
                                        <div class="left-trans-over">0.1 <span class="over-oval  ">0</span></div>
                                        <p> Omid Rahman to Pulindu Perera, no run,</p>
                                      </div>
                                    </div>
                                  </div>
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
                <div class="tab-pane " id="Statistics">
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th scope="col">Pos</th>
                        <th scope="col">Team</th>
                        <th scope="col">Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i <= 9; $i++)
                        <tr>
                          <th scope="row">1</th>
                          <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                              alt="">
                            New
                            Zeeland
                          </td>
                          <td>121</td>
                        </tr>
                      @endfor

                    </tbody>
                  </table>
                </div>
                <div class="tab-pane " id="Performance">
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th scope="col">Pos</th>
                        <th scope="col">Team</th>
                        <th scope="col">Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i <= 9; $i++)
                        <tr>
                          <th scope="row">1</th>
                          <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                              alt="">
                            New
                            Zeeland
                          </td>
                          <td>121</td>
                        </tr>
                      @endfor

                    </tbody>
                  </table>
                </div>


                <div class="tab-pane container" id="Photos">
                  <h1 class="mt-4">No Photos Available</h1>
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
    function scorecard_value(matchId) {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('scorecard_value') }}",
        type: 'POST',
        data: {
          matchId: matchId,
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $(".scorecard_value").html(response.html);
            initSlider();
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

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
          '_token': '{{ csrf_token() }}'
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
