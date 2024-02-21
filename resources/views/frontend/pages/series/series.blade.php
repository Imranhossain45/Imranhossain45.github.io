@extends('layouts.frontend.master')
@php
  $seo_title = Str::slug($title);
  $most_runs_parameter = 'mostRuns';
  $most_wickets_parameter = 'mostWickets';
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
                  Series
                </div>
                <div>
                  {{ $title }}
                </div>
              </div>
            </div><!-- Post title end -->


            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs score_nav_tabs">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab" href="#Overview">Overview</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Scorecard">Fixtures</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Result">Result</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Squads"
                    onclick="seriesSquadData('{{ $seriesId }}')">Squads</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Statistics">Team</a>
                </li> --}}
                {{-- <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Performance">Stats</a>
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
                <div class="tab-pane active" id="Overview">
                  <div class="block">
                    <div class="row">
                      <div class="col-lg-6">
                        <h3>Next Matches</h3>
                        <div class="block box_shadow">
                          <div class="next_com_match_box">
                            {{--  @foreach ($seriesMatches as $matchDetails)
                            @foreach ($matchDetails as $matchDetailsMap)
                              @if (property_exists($matchDetailsMap, 'match') && is_array($matchDetailsMap->match))
                                @foreach ($matchDetails->matchDetailsMap->match as $match)
                                  @php
                                    $matchInfo = $match->matchInfo;
                                    $matchScore = property_exists($match, 'matchScore') ? $match->matchScore : null;
                                  @endphp

                                  @if ($matchInfo->state == 'Preview' || $matchInfo->state == 'Upcoming')
                                    <div class="row mb-4">
                                      <div class="col-lg-5">
                                        <a href="{{ route('match_upcoming') }}">
                                          <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                              <div class="mr-2">
                                                <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                  alt="">
                                              </div>
                                              <div>{{ @$matchInfo->team1->teamSName }}</div>
                                            </div>
                                            <div>-vs-</div>
                                            <div class="d-flex">
                                              <div class="mr-2">
                                                <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                  alt="">
                                              </div>
                                              <div>{{ @$matchInfo->team2->teamSName }}</div>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="fxs-para-des">
                                          <a href="">
                                            <div class="ml-2">
                                              Starts at
                                              {{ \Carbon\Carbon::createFromTimestamp(@$matchInfo->startDate / 1000)->format('F jS Y, g:i A') }}
                                            </div>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          @endforeach --}}


                            @foreach ($seriesMatches as $matchDetails)
                              @if (isset($matchDetails->matchDetailsMap->match))
                                @foreach ($matchDetails->matchDetailsMap->match as $match)
                                  @php
                                    $matchInfo = $match->matchInfo;
                                    $matchScore = property_exists($match, 'matchScore') ? $match->matchScore : null;
                                    $slug = Str::slug($matchInfo->team1->teamName . '-vs-' . $matchInfo->team2->teamName);
                                  @endphp

                                  @if ($matchInfo->state == 'Preview' || $matchInfo->state == 'Upcoming')
                                    <div class="row mb-4">
                                      <div class="col-lg-5">
                                        <a
                                          href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                          <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                              <div class="mr-2">
                                                <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                  alt="">
                                              </div>
                                              <div>{{ @$matchInfo->team1->teamSName }}</div>
                                            </div>
                                            <div>-vs-</div>
                                            <div class="d-flex">
                                              <div class="mr-2">
                                                <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                  alt="">
                                              </div>
                                              <div>{{ @$matchInfo->team2->teamSName }}</div>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="fxs-para-des">
                                          <a
                                            href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                            <div class="ml-2">
                                              Starts at
                                              {{ \Carbon\Carbon::createFromTimestamp(@$matchInfo->startDate / 1000)->format('F jS Y, g:i A') }}
                                            </div>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                  @endif
                                @endforeach
                              @endif
                            @endforeach
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6">
                        <h3>Completed Matches</h3>
                        <div class="block box_shadow">
                          <div class="next_com_match_box">
                            @foreach ($seriesMatches as $matchDetails)
                              @foreach ($matchDetails as $matchDetailsMap)
                                @if (property_exists($matchDetailsMap, 'match') && is_array($matchDetailsMap->match))
                                  @foreach ($matchDetailsMap->match as $match)
                                    @php
                                      $matchInfo = $match->matchInfo;
                                      $matchScore = property_exists($match, 'matchScore') ? $match->matchScore : null;
                                      $slug = Str::slug($matchInfo->team1->teamName . '-vs-' . $matchInfo->team2->teamName);
                                    @endphp

                                    @if ($matchInfo->state == 'Complete')
                                      <div class="row mb-4">
                                        <div class="col-lg-5">
                                          <a
                                            href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                            <div class="d-flex justify-content-between">
                                              <div class="d-flex">
                                                <div class="mr-2">
                                                  <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                    alt="">
                                                </div>
                                                <div>{{ @$matchInfo->team1->teamSName }}</div>
                                              </div>
                                              <div>-vs-</div>
                                              <div class="d-flex">
                                                <div class="mr-2">
                                                  <img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                                                    alt="">
                                                </div>
                                                <div>{{ @$matchInfo->team2->teamSName }}</div>
                                              </div>
                                            </div>
                                          </a>
                                        </div>
                                        <div class="col-lg-7">
                                          <div class="fxs-para-des">
                                            <a
                                              href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                              <div class="ml-2">
                                                {{ @$matchInfo->status }}
                                              </div>
                                            </a>
                                          </div>
                                        </div>
                                      </div>
                                    @endif
                                  @endforeach
                                @endif
                              @endforeach
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-lg-12">
                        <h3>Players on Top</h3>
                        <div class="row">
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Most Runs</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Runs</th>
                                  </tr>
                                </thead>
                                <tbody id="series_most_runs_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => $most_runs_parameter]) }}"
                                  class="view_all_btn">View All</a>

                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Most Wickets</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Wickets</th>
                                  </tr>
                                </thead>
                                <tbody id="series_most_wickets_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => $most_wickets_parameter]) }}"
                                  class="view_all_btn">View All</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Most Sixes</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Sixes</th>
                                  </tr>
                                </thead>
                                <tbody id="series_most_sixes_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => 'mostSixes']) }}"
                                  class="view_all_btn">View All</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Most Fours</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Fours</th>
                                  </tr>
                                </thead>
                                <tbody id="series_most_fours_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => 'mostFours']) }}"
                                  class="view_all_btn">View All</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Highest Score</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Runs</th>
                                  </tr>
                                </thead>
                                <tbody id="series_highest_score_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => 'highestScore']) }}"
                                  class="view_all_btn">View All</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                            <div class="block box_shadow">
                              <h4 class="text-center">Best Figure</h4>

                              <table class="table table-striped mt-2">
                                <thead class="team_rank_th">
                                  <tr>
                                    <th>Pos</th>
                                    <th>Name</th>
                                    <th>Runs</th>
                                  </tr>
                                </thead>
                                <tbody id="series_best_figure_short">
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
                                <a href="{{ route('series_details', ['seriesId' => $seriesId, 'seo_title' => $seo_title, 'category' => 'bestBowlingInnings']) }}"
                                  class="view_all_btn">View All</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Scorecard">
                  <div class="block mt-4">
                    <div class="row">
                      @foreach ($seriesMatches as $matchDetails)
                        @foreach ($matchDetails as $matchDetailsMap)
                          @if (property_exists($matchDetailsMap, 'match') && is_array($matchDetailsMap->match))
                            @foreach ($matchDetailsMap->match as $match)
                              @php
                                $matchInfo = $match->matchInfo;
                                $matchScore = property_exists($match, 'matchScore') ? $match->matchScore : null;
                                $slug = Str::slug($matchInfo->team1->teamName . '-vs-' . $matchInfo->team2->teamName);
                              @endphp

                              @if ($matchInfo->state == 'Preview')
                                <div class="col-lg-6 mb-4">
                                  <div class="block" style="background: #E9C4C4">
                                    <a
                                      href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                      <div class="fx-top-blk">
                                        <h4>
                                          <a target="_blank" rel="noopener noreferrer"
                                            href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">{{ @$matchInfo->seriesName }}
                                            - {{ @$matchInfo->team1->teamSName }} vs
                                            {{ @$matchInfo->team2->teamSName }}</a>
                                        </h4>
                                        <div class="fx-top-middle-info">
                                          <span>{{ @$matchInfo->matchFormat }}</span> |
                                          <span>{{ @$matchInfo->matchDesc }}</span>
                                        </div>
                                        <div class="fx-top-right-info">
                                          <p>{{ @$matchInfo->venueInfo->ground }}</p>
                                        </div>
                                      </div>

                                      <div class="d-flex justify-content-between">
                                        <div class="text-center" style="width:40%">
                                          <div class="">
                                            <img src="{{ asset('frontend/img/Brazil.png') }}" width="40"
                                              alt="">
                                          </div>
                                          <h4 class="mb-0">{{ @$matchInfo->team1->teamName }}</h4>
                                        </div>
                                        <div class="text-center" style="width:20%">
                                          <div class="btn btn-sm btn-info">Scheduled</div>
                                          <div>-vs-</div>
                                        </div>
                                        <div class="text-center" style="width:40%">
                                          <div class="">
                                            <img src="{{ asset('frontend/img/argentina.jpg') }}" width="40"
                                              alt="">
                                          </div>
                                          <h4 class="mb-0">{{ @$matchInfo->team2->teamName }}</h4>
                                        </div>
                                      </div>
                                      <div class="text-center mt-2">
                                        <span>Starts at
                                          {{ \Carbon\Carbon::createFromTimestamp(@$matchInfo->startDate / 1000)->format('F jS Y, g:i A') }}
                                        </span>
                                      </div>
                                      <div class="text-center">
                                        <a
                                          href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">View
                                          Match Details</a>
                                      </div>

                                    </a>
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                      @endforeach

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Result">
                  <div class="block mt-4">
                    <div class="row">
                      @foreach ($seriesMatches as $matchDetails)
                        @foreach ($matchDetails as $matchDetailsMap)
                          @if (property_exists($matchDetailsMap, 'match') && is_array($matchDetailsMap->match))
                            @foreach ($matchDetailsMap->match as $match)
                              @php
                                $matchInfo = $match->matchInfo;
                                $matchScore = property_exists($match, 'matchScore') ? $match->matchScore : null;
                                $slug = Str::slug($matchInfo->team1->teamName . '-vs-' . $matchInfo->team2->teamName);
                              @endphp

                              @if ($matchInfo->state == 'Complete')
                                <div class="col-lg-6 mb-4">
                                  <div class="block" style="background: #E9C4C4">
                                    <a
                                      href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">
                                      <div class="fx-top-blk">
                                        <h4>
                                          <a target="_blank" rel="noopener noreferrer"
                                            href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">{{ @$matchInfo->seriesName }}
                                            - {{ @$matchInfo->team1->teamSName }} vs
                                            {{ @$matchInfo->team2->teamSName }}</a>
                                        </h4>
                                        <div class="fx-top-middle-info">
                                          <span>{{ @$matchInfo->matchFormat }}</span> |
                                          <span>{{ @$matchInfo->matchDesc }}</span>
                                        </div>
                                        <div class="fx-top-right-info">
                                          <p>{{ @$matchInfo->venueInfo->ground }}</p>
                                        </div>
                                      </div>

                                      <div class="d-flex justify-content-between">
                                        <div class="text-center" style="width:40%">
                                          <div class="">
                                            <img src="{{ asset('frontend/img/Brazil.png') }}" width="40"
                                              alt="">
                                          </div>
                                          <h4 class="mb-0">{{ @$matchInfo->team1->teamName }}</h4>
                                          <h5>{{ @$matchScore->team1Score->inngs1->runs }} /
                                            {{ @$matchScore->team1Score->inngs1->wickets }}</h5>
                                        </div>
                                        <div class="text-center" style="width:20%">
                                          <div class="btn btn-sm btn-success">Completed</div>
                                          <div>-vs-</div>
                                        </div>
                                        <div class="text-center" style="width:40%">
                                          <div class="">
                                            <img src="{{ asset('frontend/img/argentina.jpg') }}" width="40"
                                              alt="">
                                          </div>
                                          <h4 class="mb-0">{{ @$matchInfo->team2->teamName }}</h4>
                                          <h5>{{ @$matchScore->team2Score->inngs1->runs }} /
                                            {{ @$matchScore->team2Score->inngs1->wickets }}</h5>
                                        </div>
                                      </div>
                                      <div class="text-center mt-2">
                                        <span>{{ @$matchInfo->status }}</span>
                                      </div>
                                      <div class="text-center">
                                        <a
                                          href="{{ route('match', ['leagueID' => $matchInfo->seriesId, 'matchID' => $matchInfo->matchId, 'slug' => $slug]) }}">View
                                          Match Details</a>
                                      </div>

                                    </a>
                                  </div>
                                </div>
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                      @endforeach

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Squads">
                  <div id="seriesSquadData"></div>
                  {{-- <ul class="nav nav-tabs justify-content-start">
                    @foreach ($series_squad as $index => $squadData)
                      @if ($index != 0)
                        <li class="nav-item">
                          <a class="nav-link active rank_nav_link score_nav_link text-center" data-toggle="tab"
                            href="">{{ @$squadData->squadType }}</a>
                        </li>
                      @endif
                    @endforeach
                  </ul> --}}
                  {{-- <div class="tab-content">
                    <div class="tab-pane">
                      <div class="tb-content-wrap inner-3">
                        <div id="seriesSquadData"></div>
                      </div>
                    </div>
                  </div> --}}
                  {{-- <div class="tab-content">
                    <div class="tab-pane active" id="{{ @$squadData->squadId }}">
                      <div class="tb-content-wrap inner-3">
                        <div class="innings-player">
                          <div class="row">
                            @foreach ($team1_player as $index => $player)
                              @if (isset($player->id))
                                <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                                    href="/player/profile/125101/dinura-kalupahana">
                                    <div class="player-blk-top-blk">
                                      <div>
                                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img"
                                          width="80" alt="">
                                        <div class="player_cat_img">
                                          @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                                            <img src="{{ asset('frontend/img/Icon/bat.png') }}" class=""
                                              width="30" alt="">
                                          @elseif ($player->role == 'Bowler')
                                            <img src="{{ asset('frontend/img/Icon/ball.png') }}" class=""
                                              width="30" alt="">
                                          @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                                            <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class=""
                                              width="30" alt="">
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
                    <div class="tab-pane" id="sIndia">
                      <div class="tb-content-wrap inner-3">
                        <div class="innings-player">
                          <div class="row">
                            @foreach ($team2_player as $index => $player)
                              @if (isset($player->id))
                                <div class="col-lg-3 col-md-3 col-sm-6 p-1 m-0"><a class="single-player-blk shadow-sm "
                                    href="/player/profile/125101/dinura-kalupahana">
                                    <div class="player-blk-top-blk">
                                      <div>
                                        <img src="{{ asset('backend/images/default_profile.png') }}" class="team_img"
                                          width="80" alt="">
                                        <div class="player_cat_img">
                                          @if ($player->role == 'Batter' || $player->role == 'WK-Batter')
                                            <img src="{{ asset('frontend/img/Icon/bat.png') }}" class=""
                                              width="30" alt="">
                                          @elseif ($player->role == 'Bowler')
                                            <img src="{{ asset('frontend/img/Icon/ball.png') }}" class=""
                                              width="30" alt="">
                                          @elseif ($player->role == 'Bowling Allrounder' || $player->role == 'Batting Allrounder')
                                            <img src="{{ asset('frontend/img/Icon/bat_ball.png') }}" class=""
                                              width="30" alt="">
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
                </div>

                <div class="tab-pane " id="Performance">

                </div>

                <div class="tab-pane" id="Info">

                </div>
                <div class="tab-pane container" id="Photos">

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
    function series_most_runs_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_most_runs_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_most_runs_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function series_most_wickets_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_most_wickets_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_most_wickets_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function series_most_sixes_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_most_sixes_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_most_sixes_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function series_most_fours_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_most_fours_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_most_fours_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function series_highest_score_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_highest_score_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_highest_score_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function series_best_figure_short() {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('series_best_figure_short') }}",
        type: "POST",
        data: {
          seriesId: '{{ $seriesId }}',
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          if (response.success) {
            $('#series_best_figure_short').html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    function seriesSquadData(seriesId) {
      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('seriesSquadData') }}",
        type: "POST",
        data: {
          seriesId: seriesId,
          '_token': '{{ csrf_token() }}',
        },
        success: function(response) {
          console.log(response);
          if (response.success) {
            $('#seriesSquadData').html(response.html);
            $('.nav_tabs_squad a:first').tab('show');
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);
        }
      });
    }

    // Initial call to load the squad data for the first series
    seriesSquadData('{{ $seriesId }}');

    $(document).ready(() => {
      series_most_runs_short();
      series_most_wickets_short();
      series_most_sixes_short();
      series_most_fours_short();
      series_highest_score_short();
      series_best_figure_short();

    });
  </script>
@endpush
