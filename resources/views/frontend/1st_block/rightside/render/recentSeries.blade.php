@foreach ($recent_series_int->series as $r_series)
          @php
            $seo_title = Str::slug(@$r_series->name);
            $endTimestampSeconds = $r_series->endDt / 1000;
            $endCarbon = \Carbon\Carbon::createFromTimestamp($endTimestampSeconds);
          @endphp
          @if ($endCarbon >= now())
            <tr>
              <td class="series_td_width">
                <a href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ \Carbon\Carbon::createFromTimestamp($r_series->startDt / 1000)->format('d M') }}
                  - {{ \Carbon\Carbon::createFromTimestamp($r_series->endDt / 1000)->format('d M') }}
                </a>
              </td>
              <td><a
                  href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ @$r_series->name }}</a>
              </td>
            </tr>
          @endif
        @endforeach

        @foreach ($recent_series_leg->series as $r_series)
          @php
            $seo_title = Str::slug(@$r_series->name);
            $endTimestampSeconds = $r_series->endDt / 1000;
            $endCarbon = \Carbon\Carbon::createFromTimestamp($endTimestampSeconds);
          @endphp
          @if ($endCarbon >= now())
            <tr>
              <td class="series_td_width">
                <a href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ \Carbon\Carbon::createFromTimestamp($r_series->startDt / 1000)->format('d M') }}
                  - {{ \Carbon\Carbon::createFromTimestamp($r_series->endDt / 1000)->format('d M') }}
                </a>
              </td>
              <td><a
                  href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ @$r_series->name }}</a>
              </td>
            </tr>
          @endif
        @endforeach
        @foreach ($recent_series_leg_one->series as $r_series)
          @php
            $seo_title = Str::slug(@$r_series->name);
            $endTimestampSeconds = $r_series->endDt / 1000;
            $endCarbon = \Carbon\Carbon::createFromTimestamp($endTimestampSeconds);
          @endphp
          @if ($endCarbon >= now())
            <tr>
              <td class="series_td_width">
                <a href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ \Carbon\Carbon::createFromTimestamp($r_series->startDt / 1000)->format('d M') }}
                  - {{ \Carbon\Carbon::createFromTimestamp($r_series->endDt / 1000)->format('d M') }}
                </a>
              </td>
              <td><a
                  href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ @$r_series->name }}</a>
              </td>
            </tr>
          @endif
        @endforeach
        @foreach ($recent_series_dom->series as $r_series)
          @php
            $seo_title = Str::slug(@$r_series->name);
            $endTimestampSeconds = $r_series->endDt / 1000;
            $endCarbon = \Carbon\Carbon::createFromTimestamp($endTimestampSeconds);
          @endphp
          @if ($endCarbon >= now())
            <tr>
              <td class="series_td_width">
                <a href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ \Carbon\Carbon::createFromTimestamp($r_series->startDt / 1000)->format('d M') }}
                  - {{ \Carbon\Carbon::createFromTimestamp($r_series->endDt / 1000)->format('d M') }}
                </a>
              </td>
              <td><a
                  href="{{ route('recent_series', ['seriesId' => $r_series->id, 'seo_title' => $seo_title]) }}">{{ @$r_series->name }}</a>
              </td>
            </tr>
          @endif
        @endforeach