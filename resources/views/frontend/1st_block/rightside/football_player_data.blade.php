<div class="widget block color-default m-bottom-0">
  <h3 class="block-title"><span>Footballer's Info</span></h3>

  <div>
    <input type="text" name="" class="form-control player_search_input" id="footballer_search" placeholder="Searche Here...">
    <span class="player_search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
  </div>
  <div>

    <div class="table-responsive player_info_table">
      <table class="table">
        <thead>
          <th>Player Name</th>
          <th>Rating</th>
        </thead>
        <tbody>
          @for ($i = 0; $i <= 14; $i++)
            <tr>
              <td class="footballer_list">
                <span>
                  <a href="{{ route('football_player_profile') }}">
                    <img src="{{ asset('backend/images/icon/cross.png') }}" class="header_img" alt=""> MD
                  Imran
                  Hossain
                </a>
                </span>
              </td>
              <td class="text-center">8</td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
</div>

@push('script')
  <script>
    $('#footballer_search').on('keyup', function() {
      var searchText = $(this).val().toLowerCase();
      $('.footballer_list a').each(function() {
        var listItemText = $(this).text().toLowerCase();
        if (listItemText.includes(searchText)) {
          $(this).parent().parent().show();
        } else {
          $(this).parent().parent().hide(); 
        }
      });
    });
  </script>
@endpush


