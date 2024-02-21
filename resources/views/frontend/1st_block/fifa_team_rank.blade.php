<div class="block">
  <!-- Nav tabs -->
  <h3 class="block-title"><span>FIFA Team Rankings</span></h3>


  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="home">
      <table class="table table-striped mt-2">
        <thead class="team_rank_th">
          <tr>
            <th scope="col">Pos</th>
            <th scope="col">Team</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i <= 9; $i++)
            <tr>
              <th scope="row">1</th>
              <td><img src="{{ asset('backend/images/icon/cross.png') }}" width="20" alt="">India
              </td>
              <td>121</td>
            </tr>
          @endfor

        </tbody>
      </table>
    </div>
    <div class="ViewAll_main_div mt-4">
      <a href="{{ route('fifa_ranking') }}" class="view_all_btn">View All Ranking</a>
    </div>

  </div>

</div>
