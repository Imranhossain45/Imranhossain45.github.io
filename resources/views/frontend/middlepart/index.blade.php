<div class="col-md-2 col-sm-0">

    <!-- sidebar -->
    <div class="sidebar small-sidebar">

        @include('frontend.middlepart.trending_news')

        <div class="advertisement">
            <div class="desktop-advert">
                <span>Advertisement</span>
                <img src="{{ asset('frontend/img/addsense/160x600.jpg') }}" alt="">
            </div>
        </div>

        @include('frontend.middlepart.categories')

    </div>

</div>
