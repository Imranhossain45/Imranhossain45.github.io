@if (isset($category) && $category === 'mostRuns')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>Matches</th>
        <th>Innings</th>
        <th>Runs</th>
        <th>S/R</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $m_runs)
        @if ($index == 0)
          @foreach ($m_runs as $runs)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$runs[1] }}</td>
              <td>{{ @$runs[2] }}</td>
              <td>{{ @$runs[3] }}</td>
              <td>{{ @$runs[4] }}</td>
              <td>{{ @$runs[5] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($m_runs as $runs)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$runs[1] }}</td>
              <td>{{ @$runs[2] }}</td>
              <td>{{ @$runs[3] }}</td>
              <td>{{ @$runs[4] }}</td>
              <td>{{ @$runs[5] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@elseif(isset($category) && $category === 'mostWickets')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>Matches</th>
        <th>Overs</th>
        <th>Wickets</th>
        <th>Average</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $m_wickets)
        @if ($index == 0)
          @foreach ($m_wickets as $wicket)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$wicket[1] }}</td>
              <td>{{ @$wicket[2] }}</td>
              <td>{{ @$wicket[3] }}</td>
              <td>{{ @$wicket[4] }}</td>
              <td>{{ @$wicket[5] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($m_wickets as $wicket)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$wicket[1] }}</td>
              <td>{{ @$wicket[2] }}</td>
              <td>{{ @$wicket[3] }}</td>
              <td>{{ @$wicket[4] }}</td>
              <td>{{ @$wicket[5] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@elseif(isset($category) && $category === 'mostSixes')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>Matches</th>
        <th>Innings</th>
        <th>Runs</th>
        <th>Sixes</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $m_sixes)
        @if ($index == 0)
          @foreach ($m_sixes as $six)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$six[1] }}</td>
              <td>{{ @$six[2] }}</td>
              <td>{{ @$six[3] }}</td>
              <td>{{ @$six[4] }}</td>
              <td>{{ @$six[5] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($m_sixes as $six)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$six[1] }}</td>
              <td>{{ @$six[2] }}</td>
              <td>{{ @$six[3] }}</td>
              <td>{{ @$six[4] }}</td>
              <td>{{ @$six[5] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@elseif(isset($category) && $category === 'mostFours')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>Matches</th>
        <th>Innings</th>
        <th>Runs</th>
        <th>Fours</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $m_fours)
        @if ($index == 0)
          @foreach ($m_fours as $four)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$four[1] }}</td>
              <td>{{ @$four[2] }}</td>
              <td>{{ @$four[3] }}</td>
              <td>{{ @$four[4] }}</td>
              <td>{{ @$four[5] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($m_fours as $four)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$four[1] }}</td>
              <td>{{ @$four[2] }}</td>
              <td>{{ @$four[3] }}</td>
              <td>{{ @$four[4] }}</td>
              <td>{{ @$four[5] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@elseif(isset($category) && $category === 'highestScore')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>HS</th>
        <th>Balls</th>
        <th>S/R</th>
        <th>VS</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $h_score)
        @if ($index == 0)
          @foreach ($h_score as $score)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$score[1] }}</td>
              <td>{{ @$score[2] }}</td>
              <td>{{ @$score[3] }}</td>
              <td>{{ @$score[4] }}</td>
              <td>{{ @$score[5] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($h_score as $score)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$score[1] }}</td>
              <td>{{ @$score[2] }}</td>
              <td>{{ @$score[3] }}</td>
              <td>{{ @$score[4] }}</td>
              <td>{{ @$score[5] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@elseif (isset($category) && $category === 'bestBowlingInnings')
  <table class="table table-striped mt-2">
    <thead class="team_rank_th">
      <tr>
        <th>Position</th>
        <th>Name</th>
        <th>VS</th>
        <th>BBI</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($series_stat_data as $index => $best_bowling)
        @if ($index == 0)
          @foreach ($best_bowling as $bowling)
            <tr class="ranking_1st_row">
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$bowling[1] }}</td>
              <td>{{ @$bowling[2] }}</td>
              <td>{{ @$bowling[3] }}</td>
            </tr>
          @endforeach
        @else
          @foreach ($best_bowling as $bowling)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td>{{ @$bowling[1] }}</td>
              <td>{{ @$bowling[2] }}</td>
              <td>{{ @$bowling[3] }}</td>
            </tr>
          @endforeach
        @endif
      @endforeach
    </tbody>
  </table>
@endif
