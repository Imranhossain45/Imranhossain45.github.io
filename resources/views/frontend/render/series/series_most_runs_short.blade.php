@if (isset($most_runs))
  @php $count = 0; @endphp
  @foreach ($most_runs as $index => $m_runs)
    @if ($index == 0)
      @foreach ($m_runs as $runs)
        <tr class="ranking_1st_row">
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ @$runs[1] }}</td>
          <td>{{ @$runs[4] }}</td>
        </tr>
      @endforeach
    @else
      @foreach ($m_runs as $runs)
        @if ($count < 5)
          <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>{{ @$runs[1] }}</td>
            <td>{{ @$runs[4] }}</td>
          </tr>
          @php $count++; @endphp
        @endif
      @endforeach
    @endif
  @endforeach
@else
  <h2>Not Available</h2>
@endif
