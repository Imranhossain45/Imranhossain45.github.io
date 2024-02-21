 @foreach ($cricket_team_odi as $index => $team)
   @if ($index == 0)
     <tr class="ranking_1st_row">
       <th scope="row">{{ @$team->rank }}</th>
       <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">{{ @$team->name }}
       </td>
       <td>{{ @$team->rating }}</td>
     </tr>
   @else
     <tr>
       <th scope="row">{{ @$team->rank }}</th>
       <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">
         {{ @$team->name }}
       </td>
       <td>{{ @$team->rating }}</td>
     </tr>
   @endif
 @endforeach
