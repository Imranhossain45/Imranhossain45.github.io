<div class="col-md-3 col-sm-4">

    <!-- sidebar -->
    <div class="sidebar large-sidebar">

        <div class="widget search-widget">
            <form role="search" class="search-form">
                <input type="text" id="search" name="search" placeholder="Search here">
                <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        @include('frontend.rightpart.feture_video')
        @include('frontend.rightpart.feature_photo')
        
       

        <div class="advertisement">
            <div class="desktop-advert">
                <span>Advertisement</span>
                <img src="{{ asset('frontend/img/addsense/250x250.jpg') }}" alt="">
            </div>
            <div class="tablet-advert">
                <span>Advertisement</span>
                <img src="{{ asset('frontend/img/addsense/200x200.jpg') }}" alt="">
            </div>
            <div class="mobile-advert">
                <span>Advertisement</span>
                <img src="{{ asset('frontend/img/addsense/300x250.jpg') }}" alt="">
            </div>
        </div>

        @include('frontend.rightpart.cricket_team_rank')
        @include('frontend.rightpart.stay_connected')
        
       

    </div>
    <!-- End sidebar -->

</div>
