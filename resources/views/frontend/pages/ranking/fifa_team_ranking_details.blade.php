@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            @if (isset($rankingType) && $rankingType === 'team')
              <h2 class="text-center team_rank_title_res">FIFA Team Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'striker')
              <h2 class="text-center">FIFA Striker Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'midf')
              <h2 class="text-center">FIFA Mid Fielder Ranking</h2>
            @elseif(isset($rankingType) && $rankingType === 'goalk')
              <h2 class="text-center">FIFA Goal Keeper Ranking</h2>
            @endif
            <table class="table table-striped mt-2">
              <thead class="team_rank_th">
                <tr>
                  <th>Pos</th>
                  <th>Team</th>
                  <th>Points</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                @for ($i = 0; $i <= 19; $i++)
                  <tr>
                    <th scope="row">1</th>
                    <td class="font-weight-bold"><img src="{{ asset('backend/images/icon/cross.png') }}" width="20"
                        class="mr-2" alt="">Bangladesh
                    </td>
                    <td>923</td>
                    <td>121</td>
                  </tr>
                @endfor
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
