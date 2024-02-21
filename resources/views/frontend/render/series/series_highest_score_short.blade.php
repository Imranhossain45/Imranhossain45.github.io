@php $count = 0; @endphp
@foreach ($heghiest_score as $index => $m_score)
  @if ($index == 0)
    @foreach ($m_score as $score)
      <tr class="ranking_1st_row">
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ @$score[1] }}</td>
        <td>{{ @$score[2] }}</td>
      </tr>
    @endforeach
  @else
    @foreach ($m_score as $score)
      @if ($count < 5)
        <tr>
          <th scope="row">{{ $index + 1 }}</th>
          <td>{{ @$score[1] }}</td>
          <td>{{ @$score[2] }}</td>
        </tr>
        @php $count++; @endphp
      @endif
    @endforeach
  @endif
@endforeach
