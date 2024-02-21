 @php
   use App\Http\Controllers\Redirect\SeriesRedirectController;

 @endphp

 @foreach ($player_json_data as $player)
   @php
     $player_slug = Str::slug(@$player->name);
   @endphp
   @if (isset($player->id))
     @php
       /* $player_image = SeriesRedirectController::squad_image($player->imageId); */
       $slug = Str::slug(@$player->name);
     @endphp
     <tr>
       <td class="criketer_list">
         <a href="{{ route('cricket_player_profile', ['id' => $player->id, 'slug' => $player_slug]) }}">
           <span><img src="{{ $player_image ?? asset('backend/images/default_profile.png') }}" class="header_img"
               alt="">
             {{ @$player->name }}</span>
         </a>
       </td>
     </tr>
   @endif
 @endforeach
