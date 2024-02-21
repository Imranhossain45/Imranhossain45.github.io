@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;
  
@endphp
@if ($matchType == 'live')
  @foreach ($cricket_api_live as $match)
    @php

      $data = $match->matchInfo;
      $matchEndDate = property_exists($data, 'endDate') ? $data->endDate : null;
      $matchEndDate = \Carbon\Carbon::parse($matchEndDate / 1000);
      $timeDifference = now()->diffInHours($matchEndDate);
      $score = property_exists($match, 'matchScore') ? $match->matchScore : null;
      $slug = Str::slug($data->team1->teamName . '-vs-' . $data->team2->teamName);
      /* $team_one_image = SeriesRedirectController::squad_image($data->team1->imageId);
 $team_two_image = SeriesRedirectController::squad_image($data->team2->imageId); */
    @endphp
    @if ($data->state == 'In Progress')
      <div class="item">

        <div class="block">
          <a href="{{ route('match', ['leagueID' => $data->seriesId, 'matchID' => $data->matchId, 'slug' => $slug]) }}">
            <div class="text-nowrap overflow-hidden">
              @if ($data->state == 'In Progress')
                <span class="match_state_live">LIVE</span>
              @elseif ($data->state == 'Complete')
                <span class="match_stat_complete">Completed</span>
              @else
                <span class="match_stat_schedule">Scheduled</span>
              @endif
              <span class="score_top">{{ @$data->matchFormat }}</span>
              <span class="score_top" style="overflow: hidden">{{ @$data->matchDesc }}</span>
              <span class="score_top" style="overflow: hidden">{{ @$data->team1->teamSName }} v
                {{ @$data->team2->teamSName }}</span>
            </div>

            <div class="d-flex justify-content-between">
              <div class="">
                <img src="" id="img-{{ @$data->team1->imageId }}" class="header_img"
                  alt="">
                <span class="font-weight-bold">{{ $data->team1->teamName }}</span>
              </div>
              <div class="font-weight-bold">

                @if ($score)
                  {{ @$score->team1Score->inngs1->runs }} /
                  @if (isset($score->team1Score->inngs1->wickets))
                    {{ @$score->team1Score->inngs1->wickets }}
                  @else
                    0
                  @endif
                @endif
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="">
                <img src="{{ @$team_two_image }}" id="img-{{ @$data->team2->imageId }}" class="header_img"
                  alt="">
                <span class="font-weight-bold">{{ @$data->team2->teamName }}</span>
              </div>
              <div class="font-weight-bold">
                @if ($score && property_exists($score, 'team2Score') && property_exists($score->team2Score, 'inngs1'))
                  {{ @$score->team2Score->inngs1->runs }} /
                  @if (isset($score->team2Score->inngs1->wickets))
                    {{ @$score->team2Score->inngs1->wickets }}
                  @else
                    0
                  @endif
                @endif
              </div>
            </div>
          </a>
          <div class="">
            {{ @$match->matchInfo->status }}
          </div>
          <div class="d-flex">
            <a href="#" style="text-decoration: underline;margin-right:10px">Live</a>
            <a href="#" style="text-decoration: underline;margin-right:10px">Commentary</a>
            {{-- <a href="#" style="text-decoration: underline;margin-right:10px">Statistics</a> --}}
            <a href="#" style="text-decoration: underline;margin-right:10px">Info</a>
          </div>
        </div>


      </div>
    @endif
  @endforeach
@endif

@if ($matchType == 'complete')
  @foreach ($cricket_api_recent as $match)
    @php
      $data = $match->matchInfo;
      $matchEndDate = property_exists($data, 'endDate') ? $data->endDate : null;
      $matchEndDate = \Carbon\Carbon::parse($matchEndDate / 1000);
      $timeDifference = now()->diffInHours($matchEndDate);
      $score = property_exists($match, 'matchScore') ? $match->matchScore : null;
      $slug = Str::slug($data->team1->teamName . '-vs-' . $data->team2->teamName);
      /* $team_one_image = SeriesRedirectController::squad_image($data->team1->imageId);
 $team_two_image = SeriesRedirectController::squad_image($data->team2->imageId); */
    @endphp
    @if ($timeDifference <= 4)
      <div class="item">

        <div class="block">
          <a
            href="{{ route('match', ['leagueID' => $data->seriesId, 'matchID' => $data->matchId, 'slug' => $slug]) }}">
            <div class="text-nowrap" style="overflow: hidden">
              @if ($data->state == 'In Progress')
                <span class="match_state_live">LIVE</span>
              @elseif ($data->state == 'Complete')
                <span class="match_stat_complete">COMPLETED</span>
              @else
                <span class="match_stat_schedule">SCHEDULED</span>
              @endif
              <span class="score_top">{{ @$data->matchFormat }}</span>
              <span class="score_top">{{ @$data->matchDesc }}</span>
              <span class="score_top">{{ @$data->team1->teamSName }} v {{ @$data->team2->teamSName }}</span>
            </div>

            <div class="d-flex justify-content-between">
              <div class="">
                <img src="{{ @$team_one_image }}" id="img-{{ @$data->team1->imageId }}" class="header_img" alt="">
                <span class="font-weight-bold">{{ $data->team1->teamName }}</span>
              </div>
              <div class="font-weight-bold">

                @if ($score)
                  {{ @$score->team1Score->inngs1->runs }} / {{ @$score->team1Score->inngs1->wickets }}
                @endif
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="">
                <img src="{{ @$team_two_image }}" id="img-{{ @$data->team2->imageId }}" class="header_img" alt="">
                <span class="font-weight-bold">{{ @$data->team2->teamName }}</span>
              </div>
              <div class="font-weight-bold">
                @if ($score && property_exists($score, 'team2Score') && property_exists($score->team2Score, 'inngs1'))
                  {{ @$score->team2Score->inngs1->runs }} / {{ @$score->team2Score->inngs1->wickets }}
                @endif
              </div>
            </div>
          </a>
          <div class="">
            {{ @$match->matchInfo->status }}
          </div>
          <div class="d-flex">
            <a href="#" style="text-decoration: underline;margin-right:10px">Commentary</a>
            {{-- <a href="#" style="text-decoration: underline;margin-right:10px">Statistics</a> --}}
            <a href="#" style="text-decoration: underline;margin-right:10px">Info</a>
          </div>
        </div>


      </div>
    @endif
  @endforeach
@endif
@if ($matchType == 'schedule')
  @foreach ($cricket_api_upcoming as $match)
    @php
      $data = $match->matchInfo;
      $matchEndDate = property_exists($data, 'startDate') ? $data->startDate : null;
      $matchEndDate = \Carbon\Carbon::parse($matchEndDate / 1000);
      $timeDifference = now()->diffInHours($matchEndDate);
      $score = property_exists($match, 'matchScore') ? $match->matchScore : null;
      $slug = Str::slug($data->team1->teamName . '-vs-' . $data->team2->teamName);
      /*  $team_one_image = SeriesRedirectController::squad_image($data->team1->imageId);
      $team_two_image = SeriesRedirectController::squad_image($data->team2->imageId); */
    @endphp
    @if ($timeDifference <= 24)
      <div class="item">
        <div class="block">
          <a
            href="{{ route('match', ['leagueID' => $data->seriesId, 'matchID' => $data->matchId, 'slug' => $slug]) }}">
            <div class="text-nowrap" style="overflow: hidden">
              @if ($data->state == 'In Progress')
                <span class="match_state_live">LIVE</span>
              @elseif ($data->state == 'Complete')
                <span class="match_stat_complete">COMPLETED</span>
              @else
                <span class="match_stat_schedule">SCHEDULED</span>
              @endif
              <span class="score_top">{{ @$data->matchFormat }}</span>
              <span class="score_top">{{ @$data->matchDesc }}</span>
              <span class="score_top">{{ @$data->team1->teamSName }} v {{ @$data->team2->teamSName }}</span>
            </div>

            <div class="d-flex justify-content-between">
              <div class="">
                <img src="{{ @$team_one_image }}" id="img-{{ @$data->team1->imageId }}" class="header_img" alt="">
                <span class="font-weight-bold">{{ $data->team1->teamName }}</span>
              </div>
              <div class="font-weight-bold">

                @if ($score)
                  {{ @$score->team1Score->inngs1->runs }} / {{ @$score->team1Score->inngs1->wickets }}
                @endif
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div class="">
                <img src="{{ @$team_two_image }}" id="img-{{ @$data->team2->imageId }}" class="header_img" alt="">
                <span class="font-weight-bold">{{ @$data->team2->teamName }}</span>
              </div>
              <div class="font-weight-bold">
                @if ($score && property_exists($score, 'team2Score') && property_exists($score->team2Score, 'inngs1'))
                  {{ @$score->team2Score->inngs1->runs }} / {{ @$score->team2Score->inngs1->wickets }}
                @endif
              </div>
            </div>
            @php
              $currentTime = \Carbon\Carbon::now();
              $matchStartTime = \Carbon\Carbon::createFromTimestamp($match->matchInfo->startDate / 1000);
              $timeDifference = $currentTime->diff($matchStartTime);
            @endphp
          </a>

          <div class="">
            Match Starts at
            {{ \Carbon\Carbon::createFromTimestamp($match->matchInfo->startDate / 1000)->format('d F Y g:iA') }}

          </div>
          <div class="d-flex justify-content-between">
            <a href="#" style="text-decoration: underline;margin-right:10px">Info</a>
            <div class="remainingTime"
              data-start-time="{{ \Carbon\Carbon::createFromTimestamp($match->matchInfo->startDate / 1000)->toDateString() }} {{ \Carbon\Carbon::createFromTimestamp($match->matchInfo->startDate / 1000)->format('H:i:s') }}">
              Remaining time: 0D 00H 00M 00S
            </div>
          </div>
        </div>


      </div>
    @endif
  @endforeach

@endif
@if ($matchType == 'schedule')
  <script>
    // Update the remaining time for each item
    document.querySelectorAll(".remainingTime").forEach(function(element) {
      // Set the target date and time for each item
      var targetTime = new Date(element.getAttribute('data-start-time')).getTime();

      // Update the remaining time every second for each item
      var x = setInterval(function() {
        var now = new Date().getTime();
        var timeDifference = targetTime - now;

        var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        // Display the remaining time for each item
        element.innerHTML = `
    Remaining time: 
    <span class="mr-2"><span class='day_count'>${days}</span>
    <span class='day_count_simble'> D  </span></span>
    <span class="mr-2"><span class='day_count'>${hours}</span>
    <span class='day_count_simble'> H  </span></span>
    <span class="mr-2"><span class='day_count'>${minutes}</span>
    <span class='day_count_simble'> M  </span></span>
   <span class='day_count'>${seconds}</span>
    <span class='day_count_simble'> S</span>
`;

        // If the countdown is over for each item, display a message
        if (timeDifference < 0) {
          clearInterval(x);
          element.innerHTML = "Match has started!";
        }
      }, 1000);
    });
  </script>
@endif
