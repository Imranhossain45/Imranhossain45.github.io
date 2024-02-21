 @foreach ($cricket_team_rank->rank as $team)
   <tr>
     <th scope="row">{{ @$team->rank }}</th>
     <td class="font-weight-bold"><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" class="mr-2"
         alt="">
       {{ @$team->name }}
     </td>
     <td>{{ @$team->matches }}</td>
     <td>{{ @$team->points }}</td>
     <td>{{ @$team->rating }}</td>
   </tr>
 @endforeach
