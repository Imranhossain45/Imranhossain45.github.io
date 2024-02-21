<section class="block-wrapper mt-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 left_1st_block">
        @include('frontend.advertise.add2')
        <div class="gap-30"></div>
        <div class="sidebar sidebar-right">

          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_photo')
          <div class="gap-30"></div>
          {{-- @include('frontend.1st_block.rightside.recent_series')
          <div class="gap-30"></div> --}}
          @include('frontend.1st_block.rightside.cricket_player_data')
          <div class="gap-30"></div>
          {{-- @include('frontend.1st_block.icc_team_rank')
          <div class="gap-30"></div> --}}


        </div><!-- Sidebar right end -->
      </div><!-- Sidebar Col end -->
      <div class="col-lg-6 col-md-6">
        <div class="add2_res">
          @include('frontend.advertise.add2')
        </div>
        @include('frontend.1st_block.top_news')

        <div class="gap-50"></div>
        @include('frontend.2nd_block.icc_cricket_wc')
        <div class="gap-50"></div>
        @include('frontend.2nd_block.bangladesh')


      </div><!-- Content Col end -->

      <div class="col-lg-3 col-md-3">

        <div class="sidebar sidebar-right">

          @include('frontend.advertise.add1')
          <div class="left_1st_block_right_side">
            <div class="sidebar sidebar-right">

              @include('frontend.1st_block.featured_video')
              <div class="gap-30"></div>
              @include('frontend.1st_block.featured_photo')
              <div class="gap-30"></div>


            </div><!-- Sidebar right end -->
          </div>
          @include('frontend.middlepart.trending_news')
          <div class="gap-30"></div>
          @include('frontend.1st_block.lnews')

          <div class="gap-30"></div>
         {{--  <div class="recent_series_right_side">
            @include('frontend.1st_block.rightside.recent_series')
            <div class="gap-30"></div>
            @include('frontend.1st_block.rightside.cricket_player_data')
            <div class="gap-30"></div>
            @include('frontend.1st_block.icc_team_rank')
            <div class="gap-30"></div>
          </div> --}}

          <div class="">
            {{-- @include('frontend.1st_block.rightside.football_player_data')
            <div class="gap-30"></div>
            @include('frontend.1st_block.fifa_team_rank') --}}
            <div class="gap-30"></div>
          </div>
          @include('frontend.1st_block.follow_us')




        </div><!-- Sidebar right end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- First block end -->
