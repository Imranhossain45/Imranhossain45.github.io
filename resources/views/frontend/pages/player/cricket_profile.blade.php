@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            <div>
              <div class="player_title">
                {{ @$player_info->name }}, Records, Awards, Biography & More
              </div>
              <div class="player_short_des mt-2">
                @php

                  $bioContent = @$player_info->bio;

                  $pattern = '/^(.*?[.!?])\s(.*?[.!?])/s';
                  if (preg_match($pattern, @$bioContent, $matches)) {
                      $firstTwoSentences = trim($matches[1] . ' ' . $matches[2]);
                  }
                @endphp
                {!! @$firstTwoSentences !!}
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-4">
                <div class="block box_shadow">
                  <div class="text-center">
                    <img src="{{ @$player_info->image }}" alt="">
                  </div>
                  <div class="mt-4">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Nationality</td>
                          <td>{{ @$player_info->intlTeam }}</td>
                        </tr>
                        <tr>
                          <td>Role</td>
                          <td>{{ @$player_info->role }}</td>
                        </tr>
                        <tr>
                          <td>Born</td>
                          <td>{{ @$player_info->DoBFormat }}</td>
                        </tr>
                        <tr>
                          <td>Age</td>

                          @php
                            $dobString = $player_info->DoBFormat;

                            // Convert the DoB string to a DateTime object
                            $dobDateTime = DateTime::createFromFormat('F d, Y', $dobString);

                            if ($dobDateTime) {
                                // Get the current date
                                $currentDate = new DateTime();

                                // Calculate the difference
                                $ageInterval = $currentDate->diff($dobDateTime);

                                // Format the output
                                $formattedAge = $ageInterval->y . ' Years, ' . $ageInterval->m . ' Months, ' . $ageInterval->d . ' Days';
                            }
                          @endphp
                          <td>{{ @$formattedAge }}</td>
                        </tr>
                        <tr>
                          <td>Batting Style</td>
                          <td>{{ @$player_info->bat }}</td>
                        </tr>
                        <tr>
                          <td>Bowling Style</td>
                          <td>{{ @$player_info->bowl }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="gap-30"></div>
              </div>
              <div class="col-lg-8">
                <ul class="nav nav-tabs">
                  <li class="nav-item profile_nav_width">
                    <a class="nav-link active rank_nav_link" data-toggle="tab" href="#batting">Batting</a>
                  </li>
                  <li class="nav-item profile_nav_width">
                    <a class="nav-link rank_nav_link" data-toggle="tab" href="#bowling"
                      onclick="cricketPlayerinfoBowling('{{ $id }}')">Bowling</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="batting">
                    <div class="table-responsive" id="cricketPlayerinfoBatting">
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
                    </div>
                  </div>
                  <div class="tab-pane" id="bowling">
                    <div class="table-responsive" id="cricketPlayerinfoBowling">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">

                <div class="mt-2">
                  {!! @$player_info->bio !!}
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
          @include('frontend.1st_block.lnews')
          <div class="gap-30"></div>
        </div>
      </div>

    </div>
  </section>
@endsection
@push('script')
  <script>
    function cricketPlayerinfoBatting() {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('cricketPlayerinfoBatting') }}",
        type: 'POST',
        data: {
          id: '{{ $id }}',
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#cricketPlayerinfoBatting").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };

    function cricketPlayerinfoBowling(id) {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('cricketPlayerinfoBowling') }}",
        type: 'POST',
        data: {
          id: id,
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {

          if (response.success) {
            $("#cricketPlayerinfoBowling").html(response.html);
          }
        },
        complete: function() {
          $(".lds-spinner").fadeOut(300);

        }
      });
    };
    $(document).ready(() => {
      cricketPlayerinfoBatting();
    });
  </script>
@endpush
