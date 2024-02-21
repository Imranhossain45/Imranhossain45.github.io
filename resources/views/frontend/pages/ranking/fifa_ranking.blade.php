@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="block player_block_pad">
            <h3 class="text-center">
              FIFA Ranking
            </h3>
            <div class="row">


              <div class="col-lg-3 mb-5">
                <div class="block">
                  <h4>Fifa Team Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i <= 5; $i++)
                        @if ($i == 0)
                          <tr class="ranking_1st_row">
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @else
                          <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">WI
                            </td>
                            <td>121</td>
                          </tr>
                        @endif
                      @endfor
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('fifa_ranking_team') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 mb-5">
                <div class="block">
                  <h4>Striker Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                       @for ($i = 0; $i <= 5; $i++)
                        @if ($i == 0)
                          <tr class="ranking_1st_row">
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @else
                          <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @endif
                      @endfor
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('fifa_ranking_striker') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="block">
                  <h4>Mid Fielder Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i <= 5; $i++)
                        @if ($i == 0)
                          <tr class="ranking_1st_row">
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @else
                          <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @endif
                      @endfor
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('fifa_ranking_mid_fielder') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 mb-5">
                <div class="block">
                  <h4>Goal Keeper Ranking</h4>
                  <table class="table table-striped mt-2">
                    <thead class="team_rank_th">
                      <tr>
                        <th>Pos</th>
                        <th>Team</th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i <= 5; $i++)
                        @if ($i == 0)
                          <tr class="ranking_1st_row">
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @else
                          <tr>
                            <th scope="row">1</th>
                            <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">UAE
                            </td>
                            <td>121</td>
                          </tr>
                        @endif
                      @endfor
                    </tbody>
                  </table>
                  <div class="ViewAll_main_div mt-4">
                    <a href="{{ route('fifa_ranking_goal_keeper') }}" class="view_all_btn">View All</a>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
       
      </div>
    </div>
  </section>
@endsection
