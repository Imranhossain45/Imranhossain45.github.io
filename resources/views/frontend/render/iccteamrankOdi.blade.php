 @php
   use App\Http\Controllers\Redirect\SeriesRedirectController;
 @endphp
 @foreach ($cricket_team_odi as $team)
   @php
     $team_image = SeriesRedirectController::squad_image($team->imageId);
   @endphp
   <tr>
     <th scope="row">{{ @$team->rank }}</th>
     <td>
       <img src="{{ $team_image ?? asset('backend/images/icon/cross.png') }}" width="20" alt="">
       {{ @$team->name }}
     </td>
     <td>{{ @$team->rating }}</td>
   </tr>
 @endforeach
