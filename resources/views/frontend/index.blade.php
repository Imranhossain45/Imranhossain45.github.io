@extends('layouts.frontend.master', ['title' => $metaData->title ?? env('APP_NAME'), 'description' => $metaData->description ?? env('APP_NAME')])
@section('content')
  {{-- @include('frontend.banner') --}}
  @include('frontend.1st_block.index')
  @include('frontend.2nd_block.index')
  @include('frontend.3rd_block.index')

{{--   <div class="row">
    @foreach ($test_league_api_result as $api_data)
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <table class="w-100">
              <tr>
                <td style="width:50%">Event Date Start</td>
                <td>{{ $api_data->event_date_start }}</td>
              </tr>
              <tr>
                <td>Event Date End</td>
                <td>{{ $api_data->event_date_stop }}</td>
              </tr>
              <tr>
                <td>Event Time</td>
                <td>{{ $api_data->event_time }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    @endforeach
  </div> --}}

  <!-- Modal -->
  @if ($generalInfo->event_photo != null)
    <div class="modal fade capitec_popup_modal" id="sportsbdevent" tabindex="-1" role="dialog"
      aria-labelledby="sportsbdeventLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 1000px">
        <div class="modal-content capitec_popup_modal_content">
          {{-- <div class="modal-header" style="border-bottom: none">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
          <div class="modal-body">
            <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <img src="{{ @$generalInfo->event_photo }}" width="100%" alt="">

          </div>
        </div>
      </div>
    </div>
  @endif
@endsection
@push('script')
  <script>
    $(document).ready(function() {
      // Trigger the modal to open on page load
      $('#sportsbdevent').modal('show');
    });
  </script>
@endpush
