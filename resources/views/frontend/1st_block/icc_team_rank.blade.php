<div class="block">
  <!-- Nav tabs -->
  <h3 class="block-title"><span>ICC Team Rankings</span></h3>
  <ul class="nav nav-tabs ">
    <li class="nav-item team_rank_nav">
      <a class="nav-link active rank_nav_link" data-toggle="tab" href="#T20">T20</a>
    </li>
    <li class="nav-item team_rank_nav">
      <a class="nav-link rank_nav_link" data-toggle="tab" href="#ODI" onclick="iccTeamRankOdiData()">ODI</a>
    </li>
    <li class="nav-item team_rank_nav">
      <a class="nav-link rank_nav_link" data-toggle="tab" href="#TEST" onclick="iccTeamRankTestData()">TEST</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="T20">
      <table class="table table-striped mt-2">
        <thead class="team_rank_th">
          <tr>
            <th scope="col">Pos</th>
            <th scope="col">Team</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody id="iccTeamRankT">
          <div class="text-center">
            <center>
              <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
            </center>
          </div>

        </tbody>
      </table>
    </div>
    <div class="tab-pane " id="ODI">
      <table class="table table-striped mt-2">
        <thead class="team_rank_th">
          <tr>
            <th scope="col">Pos</th>
            <th scope="col">Team</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody id="iccTeamRankOdi">
          <div class="text-center">
            <center>
              <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
            </center>
          </div>

        </tbody>
      </table>
    </div>
    <div class="tab-pane " id="TEST">
      <table class="table table-striped mt-2">
        <thead class="team_rank_th">
          <tr>
            <th scope="col">Pos</th>
            <th scope="col">Team</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody id="iccTeamRankTest">
          <div class="text-center">
            <center>
              <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </div>
            </center>
          </div>


        </tbody>
      </table>
    </div>
  </div>
  <div class="ViewAll_main_div mt-4">
    <a href="{{ route('icc_ranking') }}" class="view_all_btn">View All Ranking</a>
  </div>

</div>

@push('script')
  <script>
    function iccTeamRankT20Data() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('iccTeamRankT20Data') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#iccTeamRankT").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    function iccTeamRankOdiData() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('iccTeamRankOdiData') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $("#iccTeamRankOdi").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    function iccTeamRankTestData() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('iccTeamRankTestData') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#iccTeamRankTest").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    $(document).ready(() => {
      iccTeamRankT20Data();
    });
  </script>
@endpush
