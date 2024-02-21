@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;
@endphp
@foreach ($scheduled_match_list_dom as $matchList)
  @foreach ($matchList->matchInfo as $match)
    @php
      $slug = Str::slug(@$match->team1->teamName . '-vs-' . @$match->team2->teamName);
      $team_one_image = SeriesRedirectController::squad_image($match->team1->imageId);
      $team_two_image = SeriesRedirectController::squad_image($match->team2->imageId);
    @endphp
    <div class="col-lg-6 mb-4">
      <div class="block" style="background: #E9C4C4">
        <a href="{{ route('match', ['leagueID' => $match->seriesId, 'matchID' => $match->matchId, 'slug' => $slug]) }}">
          <div class="fx-top-blk">
            <h4>
              <a target="_blank" rel="noopener noreferrer"
                href="{{ route('match', ['leagueID' => $match->seriesId, 'matchID' => $match->matchId, 'slug' => $slug]) }}">{{ @$matchList->seriesName }}
                - {{ @$match->team1->teamSName }} vs {{ @$match->team2->teamSName }}</a>
            </h4>
            <div class="fx-top-middle-info">
              <span>{{ @$match->matchFormat }}</span> |
              <span>{{ @$match->matchDesc }}</span>
            </div>
            <div class="fx-top-right-info">
              <p>{{ @$match->venueInfo->ground }}</p>
            </div>
          </div>

          <div class="d-flex justify-content-between">
            <div class="text-center" style="width:40%">
              <div class="">
                <img src="{{ $team_one_image ?? asset('frontend/img/Dami-Flag.png') }}" width="40" alt="">
              </div>
              <h4 class="mb-0">{{ @$match->team1->teamName }}</h4>
            </div>
            <div class="text-center" style="width:20%">
              <div class="btn btn-sm btn-info">Scheduled</div>
              <div>-vs-</div>
            </div>
            <div class="text-center" style="width:40%">
              <div class="">
                <img src="{{ $team_two_image ?? asset('frontend/img/Dami-Flag.png') }}" width="40" alt="">
              </div>
              <h4 class="mb-0">{{ @$match->team2->teamName }}</h4>

            </div>
          </div>
          <div class="text-center d-f">
            <span>Starts at
              {{ \Carbon\Carbon::createFromTimestamp(@$match->startDate / 1000)->format('F jS Y, g:i A') }}
            </span>

          </div>
          <div class="text-center">
            <a
              href="{{ route('match', ['leagueID' => $match->seriesId, 'matchID' => $match->matchId, 'slug' => $slug]) }}">View
              Match Details</a>
          </div>

        </a>
      </div>
    </div>
  @endforeach
@endforeach
