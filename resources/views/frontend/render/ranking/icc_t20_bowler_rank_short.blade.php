@foreach ($bowler_rank_T as $index => $batter)
  @if ($index == 0)
    <tr class="ranking_1st_row">
      <th scope="row">{{ @$batter->rank }}</th>
      <td>{{ @$batter->name }}</td>
      <td>
        {{ @$batter->country }}
      </td>
      <td>{{ @$batter->rating }}</td>
    </tr>
  @else
    <tr>
      <th scope="row">{{ @$batter->rank }}</th>
      <td>{{ @$batter->name }}</td>
      <td>
        {{ @$batter->country }}
      </td>
      <td>{{ @$batter->rating }}</td>
    </tr>
  @endif
@endforeach
