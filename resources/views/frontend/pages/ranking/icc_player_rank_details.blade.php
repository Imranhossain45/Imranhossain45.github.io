@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            @if (isset($rankingType) && $rankingType === 'TESTBat')
              <h2 class="text-center">Men's TEST Batter Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'ODIBat')
              <h2 class="text-center">Men's ODI Batter Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'T20Bat')
              <h2 class="text-center">Men's T20 Batter Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'TESTBowl')
              <h2 class="text-center">Men's Test Bowler Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'ODIBowl')
              <h2 class="text-center">Men's ODI Bowler Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'T20Bowl')
              <h2 class="text-center">Men's T20 Bowler Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'TESTAR')
              <h2 class="text-center">Men's Test All Rounder Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'ODIAR')
              <h2 class="text-center">Men's ODI All Rounder Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'T20AR')
              <h2 class="text-center">Men's T20 All Rounder Ranking</h2>
            @endif
            <table class="table table-striped mt-2">
              <thead class="team_rank_th">
                <tr>
                  <th>Pos</th>
                  <th>Player</th>
                  <th>Team</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($icc_player_rank as $player)
                  <tr>
                    <th scope="row">{{ @$player->rank }}</th>
                    <td>{{ @$player->name }}</td>
                    <td class="font-weight-bold"><img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                        class="mr-2" alt="">{{ @$player->country }}
                    </td>
                    <td>{{ @$player->rating }}</td>
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
