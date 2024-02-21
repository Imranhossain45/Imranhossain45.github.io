<div class="widget block color-default m-bottom-0">
  <h3 class="block-title"><span>Recent Series</span></h3>

  <div class="">
    <table class="table">
      <thead class="series_th">
        <tr>
          <th>Date</th>
          <th>Series Name</th>
        </tr>
      </thead>
      <tbody id="recentSeriesData">
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

</div><!-- Trending news end -->

@push('script')
  <script>
  

    function recentSeriesData() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('recentSeriesData') }}",
        type: 'POST',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#recentSeriesData").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    $(document).ready(() => {
      recentSeriesData();
    });
  </script>
@endpush
