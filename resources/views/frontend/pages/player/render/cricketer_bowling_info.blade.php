 <table class="table table-striped mt-2 player_profile_table">
   <thead class="team_rank_th">
     <tr>
       <th scope="col">Overview</th>
       <th scope="col">Test</th>
       <th scope="col">ODI</th>
       <th scope="col">T20I</th>
       <th scope="col">IPL</th>
     </tr>
   </thead>
   <tbody>
     @foreach ($player_info_bowling as $bowling_info)
       <tr>
         <th scope="row">{{ @$bowling_info->values[0] }}</th>
         <td>{{ @$bowling_info->values[1] }}</td>
         <td>{{ @$bowling_info->values[2] }}</td>
         <td>{{ @$bowling_info->values[3] }}</td>
         <td>{{ @$bowling_info->values[4] }}</td>

       </tr>
     @endforeach

   </tbody>
 </table>
