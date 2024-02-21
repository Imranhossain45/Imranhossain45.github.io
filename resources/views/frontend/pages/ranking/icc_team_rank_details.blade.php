@extends('layouts.frontend.master')
@php
  use App\Http\Controllers\Redirect\SeriesRedirectController;

@endphp
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            @if (isset($rankingType) && $rankingType === 'TEST')
              <h2 class="text-center team_rank_title_res">Men's TEST Team Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'ODI')
              <h2 class="text-center">Men's ODI Team Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'T20')
              <h2 class="text-center">Men's T20 Team Ranking</h2>
            @else
              <h2 class="text-center">Team Ranking</h2>
            @endif
            <table class="table table-striped mt-2">
              <thead class="team_rank_th">
                <tr>
                  <th>Pos</th>
                  <th>Team</th>
                  <th>Match Played</th>
                  <th>Points</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody class="icc_team_rank_full">
                @foreach ($cricket_team_rank->rank as $team)
                  @php
                    $team_image = SeriesRedirectController::squad_image($team->imageId);
                  @endphp
                  <tr>
                    <th scope="row">{{ @$team->rank }}</th>
                    <td class="font-weight-bold"><img src="{{ @$team_image }}" width="20"
                        class="mr-2" alt="">
                      {{ @$team->name }}
                    </td>
                    <td>{{ @$team->matches }}</td>
                    <td>{{ @$team->points }}</td>
                    <td>{{ @$team->rating }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
{{-- @push('script')
  <script>
    function icc_team_rank_full() {

    }
  </script>
@endpush --}}
