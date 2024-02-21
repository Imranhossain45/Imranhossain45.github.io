 @php
   use App\Http\Controllers\Redirect\SeriesRedirectController;
   use App\Http\Controllers\Redirect\PageRedirectController;

   $header_score = $miniscore->matchScoreDetails->inningsScoreList;
   $latestPerformance = $miniscore->latestPerformance;

 @endphp
 <div class="score_area block">
   <div style="color: #bc2324">

     @if ($matchHeader->state == 'In Progress')
       <span class="match_state_live">Live</span>
     @elseif ($matchHeader->state == 'Complete')
       <span class="match_stat_complete">Complete</span>
     @else
       <span class="match_stat_schedule">Scheduled</span>
     @endif
   </div>
   <div>
     {{ $matchHeader->seriesName }} | {{ $matchHeader->matchDescription }} |
     {{ \Carbon\Carbon::createFromTimestamp($matchHeader->matchStartTimestamp / 1000)->format('d M Y g.i A') }}


   </div>
   <div class="details_team_info_block">

     @foreach ($header_score as $h_score)
       @php
         if ($h_score->batTeamName == $matchHeader->team1->shortName) {
             $h_score->batTeamName = $matchHeader->team1->name;
         } else {
             $h_score->batTeamName = $matchHeader->team2->name;
         }

         /*  $team_one_image = SeriesRedirectController::squad_image($matchHeader->team1->imageId);
 $team_two_image = SeriesRedirectController::squad_image($matchHeader->team2->imageId); */

       @endphp
       <div class="d-flex justify-content-between mb-2">

         <div class="">
           <img src="" class="header_img" alt="">
           <span class="team_name">{{ $h_score->batTeamName }}</span>
         </div>
         <div class="team_name">

           {{ $h_score->score }} / {{ $h_score->wickets }}
         </div>
       </div>
     @endforeach
     {{-- <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="" class="header_img" alt="">
                    <span class="team_name">{{ $matchHeader->team2->name }} </span>
                  </div>
                  <div class="team_name">
                    {{ $header_score[1]->score }} / {{ $header_score[1]->wickets }}
                  </div>
                </div> --}}
     <div class="mt-2">
       {{ @$miniscore->status }}
     </div>
   </div><!-- logo col end -->
 </div>
 <div class="mt-3">
   <span class="team_name">Target {{ @$miniscore->target }}</span>
   <div class="d-flex">
     Current Run Rate {{ @$miniscore->currentRunRate }} <span class="mid_dot">•</span> Required Run Rate
     {{ @$miniscore->requiredRunRate }} <span class="mid_dot">•</span>
     {{ @$latestPerformance[0]->label }}
     {{ @$latestPerformance[0]->runs }}/{{ @$latestPerformance[0]->wkts }}
     @isset($latestPerformance[1])
       <span class="mid_dot">•</span> {{ @$latestPerformance[1]->label }}
       {{ @$latestPerformance[1]->runs }}/{{ @$latestPerformance[1]->wkts }}
     @endisset
   </div>
 </div>
