@foreach ($batter_rank_test as $index => $batter)
  @if ($index == 0)
    <tr class="ranking_1st_row">
      <th scope="row">
        <div>{{ @$batter->rank }}</div>
      </th>
      <td>
        <div>{{ @$batter->name }}</div>
      </td>
      <td>
       <div> {{ @$batter->country }}</div>
      </td>
      <td>
        <div>{{ @$batter->rating }}</div>
      </td>
    </tr>
  @else
    <tr>
      <th scope="row">
        <div>{{ @$batter->rank }}</div>
      </th>
      <td>
        <div>{{ @$batter->name }}</div>
      </td>
      <td>
        <div>{{ @$batter->country }}</div>
      </td>
      <td>
        <div>{{ @$batter->rating }}</div>
      </td>
    </tr>
  @endif
@endforeach
