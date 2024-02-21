@php $count = 0; @endphp
@foreach ($most_wickets as $index => $m_wickets)
  @if ($index == 0)
    @foreach ($m_wickets as $wicket)
      <tr class="ranking_1st_row">
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ @$wicket[1] }}</td>
        <td>{{ @$wicket[4] }}</td>
      </tr>
    @endforeach
  @else
    @foreach ($m_wickets as $wicket)
      @if ($count < 5)
        <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ @$wicket[1] }}</td>
          <td>{{ @$wicket[4] }}</td>
        </tr>
        @php $count++; @endphp
      @endif
    @endforeach
  @endif
@endforeach
