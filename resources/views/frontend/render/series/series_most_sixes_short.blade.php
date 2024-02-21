@php $count = 0; @endphp
@foreach ($most_sixes as $index => $m_sixes)
  @if ($index == 0)
    @foreach ($m_sixes as $sixes)
      <tr class="ranking_1st_row">
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ @$sixes[1] }}</td>
        <td>{{ @$sixes[5] }}</td>
      </tr>
    @endforeach
  @else
    @foreach ($m_sixes as $sixes)
      @if ($count < 5)
        <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ @$sixes[1] }}</td>
          <td>{{ @$sixes[5] }}</td>
        </tr>
        @php $count++; @endphp
      @endif
    @endforeach
  @endif
@endforeach
