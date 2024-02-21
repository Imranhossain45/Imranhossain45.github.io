<div class="widget block color-default m-bottom-0">
  <h3 class="block-title"><span>Cricketer's Info</span></h3>

  <div>
    <input type="text" name="" class="form-control player_search_input" id="cricketer_search"
      placeholder="Searche Here...">
    <span class="player_search_icon"><i class="fa-solid fa-magnifying-glass"></i></span>
  </div>
  <div>

    <div class="table-responsive player_info_table">
      <table class="table">
        <thead>
          <th>Player Name</th>
        </thead>
        <tbody id="cricketPlayerData">
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
</div>
@push('script')
  <script>
    $('#cricketer_search').on('keyup', function() {
      var searchText = $(this).val().toLowerCase();
      $('.criketer_list a').each(function() {
        var listItemText = $(this).text().toLowerCase();
        if (listItemText.includes(searchText)) {
          $(this).parent().parent().show();
        } else {
          $(this).parent().parent().hide();
        }
      });
    });

    function cricketPlayerData() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('cricketPlayerData') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#cricketPlayerData").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    $(document).ready(() => {
      cricketPlayerData();
    });
  </script>
@endpush
