
<table class="table table-striped mt-2 player_profile_table">
  <thead class="team_rank_th">
    <tr>
      <th scope="col">Overview</th>
      <th scope="col">Test</th>
      <th scope="col">ODI</th>
      <th scope="col">T20I</th>
      <th scope="col">IPL</th>
      {{-- <th scope="col">List A</th>
                            <th scope="col">1st Class</th> --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($player_info_batting as $batting_info)
      <tr>
        <th scope="row">{{ @$batting_info->values[0] }}</th>
        <td>{{ @$batting_info->values[1] }}</td>
        <td>{{ @$batting_info->values[2] }}</td>
        <td>{{ @$batting_info->values[3] }}</td>
        <td>{{ @$batting_info->values[4] }}</td>

      </tr>
    @endforeach

  </tbody>
</table>
