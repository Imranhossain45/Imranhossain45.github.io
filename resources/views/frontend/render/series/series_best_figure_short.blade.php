 @php $count = 0; @endphp
 @foreach ($best_figure as $index => $b_bowling)
   @if ($index == 0)
     @foreach ($b_bowling as $bowl)
       <tr class="ranking_1st_row">
         <th scope="row">{{ $index + 1 }}</th>
         <td>{{ @$bowl[1] }}</td>
         <td>{{ @$bowl[3] }}</td>
       </tr>
     @endforeach
   @else
     @foreach ($b_bowling as $bowl)
       @if ($count < 5)
         <tr>
           <th scope="row">{{ $index + 1 }}</th>
           <td>{{ @$bowl[1] }}</td>
           <td>{{ @$bowl[3] }}</td>
         </tr>
         @php $count++; @endphp
       @endif
     @endforeach
   @endif
 @endforeach
