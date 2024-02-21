<footer id="footer" class="footer">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <form action="{{ route('subscriber.store') }}" method="POST">
          @csrf
          <div class="d-flex subscribe_section">
            <div class="col-lg-5 col-sm-12 col-12">
              <div class="subscribe_text">
                Subscribe to Our Newsletter
              </div>
            </div>
            
            <div class="col-lg-5 col-sm-12 col-12">
              <input type="email" name="email" class="form-control subscribe_input" id=""
                placeholder="Enter Your Email">
            </div>
            <div class="col-lg-2 col-sm-12 col-12">
              <button type="submit" class="subscribe_btn">Subscribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="footer-main">

    <div class="container">

      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Cricket Leagues</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">
              <li class="clearfix">
                <a href="{{ route('bpl') }}"> Bangladesh Premier League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('ipl') }}"> Indian Premier League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('psl') }}"> Pakistan Super League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('bbl') }}"> Big Bash League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('cpl') }}"> Caribbean Premier League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('lpl') }}"> Lanka Premier League</a>
              </li>

            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Football Leagues</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">
              <li class="clearfix">
                <a href="{{ route('epl') }}"> English Premier League</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('la_liga') }}"> La Liga</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('serie_a') }}"> Serie A</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('b_liga') }}"> Bundesliga</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('leg_1') }}"> Ligue 1</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('m_leg') }}"> Major League Soccer</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('s_pro') }}"> Saudi Pro League</a>
              </li>

            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Quick Links</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">
              <li class="clearfix">
                <a href="{{ route('fixture_cricket') }}"> Cricket Score</a>
              </li><!-- Li 1 end -->
              <li class="clearfix">
                <a href="#"> Football Score</a>
              </li><!-- Li 1 end -->
              <li class="clearfix">
                <a href="{{ route('all_news') }}"> News</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('all_article') }}"> Articles</a>
              </li>

            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Legal</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">

              <li class="clearfix">
                <a href="{{ route('terms_condition') }}"> Terms & Conditions</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('dmca') }}"> DMCA</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('desclaimer') }}">Desclaimer</a>
              </li>
              <li class="clearfix">
                <a href="{{ route('privacy') }}">Privacy Policy</a>
              </li>

            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Post Gallary</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">
              <li class="clearfix">
                <a href="{{ route('all_video_gallery') }}"> Video Gallery</a>
              </li><!-- Li 1 end -->
              <li class="clearfix">
                <a href="{{ route('all_photo_gallery') }}"> Photo Gallery</a>
              </li><!-- Li 1 end -->

            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->
        <div class="col-lg-2 col-md-2 col-sm-6 col-6 footer-widget">
          <h3 class="widget-title">Explore Sports247</h3>
          <div class="footer_list_post_block">
            <ul class="list-post">
              <li class="clearfix">
                <a href="{{ route('about_us') }}"> About Us</a>
              </li><!-- Li 1 end -->
              <li class="clearfix">
                <a href="{{ route('contact_us') }}"> Contact Us</a>
              </li><!-- Li 1 end -->
              <li class="clearfix">
                <a href="mailto:{{ $generalInfo->email }}"> {{ $generalInfo->email }}</a>
              </li><!-- Li 1 end -->
              <li class="clearfix footer_social">
                <a href="{{ $generalInfo->facebook }}" target="_blank"> <i class="fa-brands fa-facebook"></i></a>
                <a href="{{ $generalInfo->instagram }}" target="_blank"> <i class="fa-brands fa-instagram"></i></a>
                <a href="{{ $generalInfo->twitter }}" target="_blank"> <i class="fa-brands fa-x-twitter"></i></a>
                <a href="{{ $generalInfo->linkedin }}" target="_blank"> <i class="fa-brands fa-linkedin"></i></a>
                <a href="{{ $generalInfo->youtube }}" target="_blank"> <i class="fa-brands fa-youtube"></i></a>
                <a href="{{ $generalInfo->tiktok }}" target="_blank"> <i class="fa-brands fa-tiktok"></i></a>
              </li><!-- Li 1 end -->


            </ul><!-- List post end -->
          </div><!-- List post block end -->

        </div><!-- Col end -->





      </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Footer main end -->
  <div class="copyright">
    <div class="container">
      <div class="row justify-content-start">
        <div class="col-sm-12 col-md-6">
          <div class="copyright-info text-left">
            <span>{{ $generalInfo->copyright_text }}. 
              {{-- Designed and Developed By <a
                href="https://www.facebook.com/mdimran.h.sagor/" target="_blank"><span class="company_name">Md Imran
                  Hossain</span></a></span> --}}
          </div>
        </div>


      </div><!-- Row end -->

      <div id="back-to-top" class="back-to-top">
        <button class="btn btn-primary" title="Back to Top">
          <i class="fa fa-angle-up"></i>
        </button>
      </div>

    </div><!-- Container end -->
  </div><!-- Copyright end -->
</footer><!-- Footer end -->
