@php $count = 0; @endphp
@foreach ($most_fours as $index => $m_fours)
  @if ($index == 0)
    @foreach ($m_fours as $four)
      <tr class="ranking_1st_row">
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ @$four[1] }}</td>
        <td>{{ @$four[5] }}</td>
      </tr>
    @endforeach
  @else
    @foreach ($m_fours as $four)
      @if ($count < 5)
        <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ @$four[1] }}</td>
          <td>{{ @$four[5] }}</td>
        </tr>
        @php $count++; @endphp
      @endif
    @endforeach
  @endif
@endforeach
