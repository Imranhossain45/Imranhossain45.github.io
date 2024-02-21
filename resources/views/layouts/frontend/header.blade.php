{{-- @php
  use App\Http\Controllers\HomeController;
  $cricket_api = HomeController::cricket_data_recent();
  $cricket_api_live = HomeController::cricket_data_live();
  foreach ($cricket_api_live as $match) {
      $data = $match->matchInfo;
      $matchEndDate = $data->endDate;
      $matchEndDate = \Carbon\Carbon::parse($matchEndDate / 1000);
      dd($matchEndDate);
  }
@endphp --}}



{{-- <div id="top-bar" class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="text-white text-center score_top_title">Cricket</div>
      </div><!--/ Top bar left end -->
      <div class="col-md-6">
        <div class="text-white text-center score_top_title">Fotball</div>
      </div><!--/ Top bar left end -->


    </div><!--/ Content row end -->
  </div><!--/ Container end -->
</div><!--/ Topbar end --> --}}

<!-- Header start -->
<header id="header" class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 cricket_score_res mt-3 mb-3">
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
        <div class="owl-carousel owl-theme topbar_score_slider" id="headerCricketScoreData">

        </div>

      </div>
      {{--  <div class="col-lg-6">
      <div class="text-white text-center score_top_title score_top_title_res">Football</div>
      <div class="">
        <ul class="header-bar-match-series-menu d-flex align-items-center">
          <div class="owl-carousel owl-theme topbar_match_slider">
            @for ($i = 0; $i <= 10; $i++)
              <div class="item">
                <li><a class="active">Matches (17)</a></li>
              </div>
            @endfor
          </div>
        </ul>
      </div>
      <div class="owl-carousel owl-theme topbar_score_slider">


        @foreach ($football_api as $f_data)
          <div class="item">
            <a href="{{ route('match_football') }}">
              <div class="block header_scroll_block">

                <div class="d-flex justify-content-between">
                  <div class="mb-2">

                    <div class="text-center">
                      <img src="{{ $f_data->home_team_logo }}" class="footbal_header_img" alt="">
                    </div>
                    <div class="font-weight-bold">
                      {{ $f_data->event_home_team }}
                    </div>
                  </div>
                  @if ($f_data->event_halftime_result)
                    <div class="mt-3">
                      <span class="football_score"> {{ $f_data->event_halftime_result }}</span>

                      <div>Half Time</div>
                    </div>
                  @else
                    <div class="mt-3">
                      <span class="football_score"> {{ $f_data->event_final_result }}</span>

                      <div>Half Time</div>
                    </div>
                  @endif
                  <div class="">
                    <div class="text-center">
                      <img src="{{ $f_data->away_team_logo }}" class="footbal_header_img" alt="">
                    </div>
                    <div class="font-weight-bold">
                      {{ $f_data->event_away_team }}
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    @foreach ($f_data->goalscorers as $goal)
                      <div class="mr-2">
                        {{ $goal->home_scorer }} <span>
                          @if ($goal->home_scorer)
                            {{ $goal->time }}
                          @endif
                        </span>
                      </div>
                    @endforeach
                  </div>
                  <div>
                    @foreach ($f_data->goalscorers as $goal)
                      <div class="mr-2">
                        {{ $goal->away_scorer }} <span>
                          @if ($goal->away_scorer)
                            {{ $goal->time }}
                          @endif
                        </span>
                      </div>
                    @endforeach
                  </div>
                </div>

              </div><!-- logo col end -->
            </a>
          </div>
        @endforeach
      </div>
      </div> --}}




    </div>
  </div>
</header>

<div class="main-nav clearfix">
  {{--  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-lg col">
        <div class="site-nav-inner float-left">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
          </button>
          <a href="{{ route('index') }}" class="logo_img_a">
            <img src="{{ $generalInfo->logo }}" class="logo_img" alt=""
              style="margin-left: -40px">
          </a>
          <!-- End of Navbar toggler -->

          <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav" id="menubar">
              <li>
                <a href="{{ route('index') }}" class="logo_img_li">
                  <img src="{{ asset('frontend/img/logo/logo.png') }}" class="logo_img" alt=""
                    style="margin-left: -40px">
                </a>
              </li>
              <li>
                <a href="{{ route('index') }}" class="menu-link active">Home</a>
              </li>

              <li>
                <a href="{{ route('all_news') }}" class="menu-link">News</a>
              </li>

              @foreach ($categories as $index => $category)
                @if ($index == 0 || $index == 1)
                  <li>
                    <a href="{{ route('category', $category->slug) }}" class="menu-link">{{ $category->name }}</a>
                  </li>
                @endif
              @endforeach
              <li>
                <a href="{{ route('bpl') }}" class="menu-link">BPL</a>
              </li>

              <li>
                <a href="{{ route('ipl') }}" class="menu-link">IPL</a>
              </li>
              <li>
                <a href="{{ route('icc_cricket_world_cup') }}" class="menu-link">Icc World Cup</a>
              </li>
              <li>
                <a href="{{ route('uefa') }}" class="menu-link">UEFA</a>
              </li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link" data-toggle="dropdown">Live Score <i
                    class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li class=""><a href="{{ route('fixture_cricket') }}">Cricket</a></li>
                  <li><a href="#">Football</a></li>
                </ul>
              </li>
              <li>
                <a href="https://bn.sports247bd.com/" class="">বাংলা</a>
              </li>

            </ul><!--/ Nav ul end -->
          </div><!--/ Collapse end -->
          

        </div><!-- Site Navbar inner end -->
      </nav><!--/ Navigation end -->

      <div class="nav-search">
        <span id="search" style="color: white"><i class="fa fa-search"></i></span>
      </div><!-- Search end -->

      <div class="search-block" style="display: none;">
        <input type="text" id="searchInput" class="form-control" placeholder="Type what you want and enter">
        <span class="search-close">&times;</span>
        <ul class="suggestions"></ul>
      </div><!-- Site search end -->

    </div><!--/ Row end -->
  </div><!--/ Container end --> --}}
  <div class="container">
    <div class="row">
      <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <!-- Offcanvas Navigation -->
        <div class="offcanvas-collapse offcanvas_collapse_fixed" id="navbarResponsive">
          <button class="btn btn-close offcanvas_close d-none" type="button" data-toggle="offcanvas"
            data-target="#navbarResponsive">&times;</button> <!-- Close button -->
          <ul class="nav navbar-nav" id="menubar">
            <li>
              <a href="{{ route('index') }}" class="logo_img_li">
                <img src="{{ asset('frontend/img/logo/logo.png') }}" class="logo_img" alt=""
                  style="margin-left: -40px">
              </a>
            </li>
            <li>
              <a href="{{ route('index') }}" class="menu-link active">Home</a>
            </li>
            <li>
              <a href="{{ route('all_news') }}" class="menu-link">News</a>
            </li>

            @foreach ($categories as $index => $category)
              @if ($index == 0 || $index == 1)
                <li>
                  <a href="{{ route('category', $category->slug) }}" class="menu-link">{{ $category->name }}</a>
                </li>
              @endif
            @endforeach
            <li>
              <a href="{{ route('bpl') }}" class="menu-link">BPL</a>
            </li>

            <li>
              <a href="{{ route('ipl') }}" class="menu-link">IPL</a>
            </li>
            <li>
              <a href="{{ route('icc_cricket_world_cup') }}" class="menu-link">Icc World Cup</a>
            </li>
            <li>
              <a href="{{ route('uefa') }}" class="menu-link">UEFA</a>
            </li>
            <li class="nav-item dropdown active">
              <a href="#" class="nav-link" data-toggle="dropdown">Live Score <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li class=""><a href="{{ route('fixture_cricket') }}">Cricket</a></li>
                <li><a href="#">Football</a></li>
              </ul>
            </li>
            <li>
              <a href="https://bn.sports247bd.com/" class="">বাংলা</a>
            </li>
            <div class="header_social">
              <div class="mt-5 text-white ml-3">Follow Us:</div>
              <li class="clearfix footer_social d-flex">
                <a href="{{ $generalInfo->facebook }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-facebook"></i></a>
                <a href="{{ $generalInfo->instagram }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-instagram"></i></a>
                <a href="{{ $generalInfo->twitter }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-x-twitter"></i></a>
                <a href="{{ $generalInfo->linkedin }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-linkedin"></i></a>
                <a href="{{ $generalInfo->youtube }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-youtube"></i></a>
                <a href="{{ $generalInfo->tiktok }}" target="_blank" style="padding: 0 0 10px 15px !important;"> <i
                    class="fa-brands fa-tiktok"></i></a>
              </li><!-- Li 1 end -->
            </div>

          </ul><!--/ Nav ul end -->

        </div>

        <!-- Your existing logo and search block go here -->
        <a href="{{ route('index') }}" class="logo_img_a">
          <img src="{{ $generalInfo->logo }}" class="logo_img" alt="" style="margin-left: -40px">
        </a>
        <div class="nav-search">
          <span id="search" style="color: white"><i class="fa fa-search"></i></span>
        </div>
        <div class="search-block" style="display: none;">
          <input type="text" id="searchInput" class="form-control" placeholder="Type what you want and enter">
          <span class="search-close">&times;</span>
          <ul class="suggestions"></ul>
        </div>
      </nav>
    </div>
  </div>


</div><!-- Menu wrapper end -->
@push('script')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var navbarCollapse = document.getElementById('navbarResponsive');
      var navbarToggler = document.querySelector('.navbar-toggler');

      function toggleNavbar() {
        if (window.scrollY > 50) {
          navbarCollapse.classList.add('navbar-fixed');
        } else {
          navbarCollapse.classList.remove('navbar-fixed');
        }
      }

      window.addEventListener('scroll', function() {
        toggleNavbar();
      });

      navbarToggler.addEventListener('click', function(event) {
        event.stopPropagation();
        navbarCollapse.classList.toggle('show');
      });

      document.addEventListener('click', function(event) {
        if (!navbarCollapse.contains(event.target) && !navbarToggler.contains(event.target)) {
          navbarCollapse.classList.remove('show');
        }
      });

      navbarCollapse.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
  </script>





  <script>
    $(document).ready(function() {
      $('.offcanvas_close').on('click', function() {
        $('.offcanvas_collapse_fixed').removeClass('show');
      });
      $('.navbar-toggler-icon').on('click', function() {
        $('.offcanvas_close').removeClass('d-none');
      });
      var navbar = $('.main-nav');
      var banner_area = $('.banner_area');
      var sticky = navbar.offset().top;

      $(window).scroll(function() {
        if ($(window).scrollTop() >= sticky) {
          navbar.addClass('sticky');
          banner_area.addClass('mt_60');
        } else {
          navbar.removeClass('sticky');
          banner_area.removeClass('mt_60');
        }
      });
    });
  </script>

  <script>
    // Function to add 'active' class to the menu item
    function setActiveMenuItem() {
      var currentPageUrl = window.location.href; // Get the current URL of the page

      // Get all menu links
      var menuLinks = document.querySelectorAll('.nav .menu-link');

      // Remove 'active' class from all menu items
      menuLinks.forEach(function(link) {
        link.classList.remove('active');
      });

      // Loop through each menu link and compare its href attribute with the current page URL
      menuLinks.forEach(function(link) {
        if (link.href === currentPageUrl) {
          link.classList.add('active'); // Add 'active' class to the matching menu item
        }
      });
    }

    // Call the function when the DOM content is fully loaded
    document.addEventListener('DOMContentLoaded', setActiveMenuItem);
  </script>

  <script>
    //search suggetion
    $(document).on('keyup', '#searchInput', function(e) {
      const search = $('#searchInput').val();
      var url = "{{ route('search') }}";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'GET',
        url: url,
        data: {
          search: search,
        },
        success: (data) => {
          $('.suggestions').html(data);
        }
      })
    });
  </script>
  <script>
    function initSlider() {
      $(".topbar_score_slider").owlCarousel({
        loop: false,
        autoplay: false,
        autoplayHoverPause: true,
        nav: true,
        margin: 30,
        dots: false,
        mouseDrag: false,
        slideSpeed: 500,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        items: 4,
        responsive: {
          0: {
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: 2000,
            slideSpeed: 100,
            loop: true,
          },
          480: {
            items: 1,
            nav: false,
            autoplay: true,
            autoplayTimeout: false,
            slideSpeed: 1000,
            loop: true,
          },
          600: {
            items: 2,
            autoplay: false,
          },
          1000: {
            items: 4,
            autoplay: false,
          }
        }
      });
    }
    var team_images;

    function headerCricketScoreData(matchType) {

      $(".lds-spinner").fadeIn(300);
      $.ajax({
        url: "{{ route('headerCricketScoreData') }}",
        type: 'POST',
        data: {
          matchType: matchType,
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            if (matchType == 'live') {
              $("#headerCricketScoreData").html(response.html);
              setTimeout(() => {
                headerCricketScoreData('complete');
              }, 3000);
            } else if (matchType == 'complete') {
              $("#headerCricketScoreData").append(response.html);
              setTimeout(() => {
                headerCricketScoreData('schedule');
              }, 3000);
            } else {
              $("#headerCricketScoreData").append(response.html);
              $(".lds-spinner").fadeOut(300);
              initSlider();
            }
            if (response.progressImages) {
              console.log(response.progressImages);
              progressImages = response.progressImages;
              let index = 0;

              function processProperty() {
                if (index < progressImages.length) {
                  let team1_img = progressImages[index].team1_img;
                  let team2_img = progressImages[index].team2_img;
                  console.log('Team 1 image ID:', team1_img);
                  console.log('Team 2 image ID:', team2_img);
                  index++;
                  var imageApi = getTeamImages(team1_img, team2_img);
                  setTimeout(processProperty, 3000);

                }
              }
              setTimeout(processProperty, 15000);

            }
            if (response.completeImages) {
              console.log(response.completeImages)
              completeImages = response.completeImages;
              let indexx = 0;

              function completeProperty() {
                if (indexx < completeImages.length) {
                  let team1_img = completeImages[indexx].team1_img;
                  let team2_img = completeImages[indexx].team2_img;
                  console.log('Team 1 image ID:', team1_img);
                  console.log('Team 2 image ID:', team2_img);
                  indexx++;
                  var imageApi = getTeamImages(team1_img, team2_img);
                  setTimeout(completeProperty, 5000);

                }
              }
              setTimeout(completeProperty, 20000);

            }
            if (response.scheduleImages) {
              console.log(response.scheduleImages)
              scheduleImages = response.scheduleImages;
              let indexxx = 0;

              function scheduleProperty() {
                if (indexxx < scheduleImages.length) {
                  let team1_img = scheduleImages[indexxx].team1_img;
                  let team2_img = scheduleImages[indexxx].team2_img;
                  console.log('Team 1 image ID:', team1_img);
                  console.log('Team 2 image ID:', team2_img);
                  indexxx++;
                  var imageApi = getTeamImages(team1_img, team2_img);
                  setTimeout(scheduleProperty, 7000);

                }
              }
              setTimeout(scheduleProperty, 25000);

            }

          }

        },
        complete: function() {

        }
      });
    };

    function getTeamImages(teamOne, teamTwo) {
      console.log('Teams1:' + teamOne, 'Team2:' + teamTwo)
      $.ajax({
        url: "{{ route('api.get.image') }}",
        type: 'POST',
        data: {
          teamOne: teamOne,
          teamTwo: teamTwo,
          '_token': '{{ csrf_token() }}'
        },
        success: function(response) {
          if (response.success) {
            $('#img-' + teamOne).attr('src', response.teamOne);
            $('#img-' + teamTwo).attr('src', response.teamTwo);
          }

        },
        complete: function() {

        }
      });
    }

    $(document).ready(() => {
      headerCricketScoreData('live');
    });
  </script>
@endpush
