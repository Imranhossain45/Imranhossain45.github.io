@extends('layouts.frontend.master')
@section('content')
  <section class="block-wrapper page_sec_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">

          <div class="single-post block">

            <div class="post-title-area">

              <div class="score_topbar">
                <div>
                  <a href="{{ route('index') }}" style="color: white">Home</a>
                </div>
                <div>
                  Cricket Fixture
                </div>
              </div>
            </div><!-- Post title end -->


            <div class="mt-3">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs football_fixture_nav_tav score_nav_tabs justify-content-between">
                <li class="nav-item">
                  <a class="nav-link active rank_nav_link score_nav_link" data-toggle="tab"
                    href="#home">International</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link rank_nav_link score_nav_link" data-toggle="tab" href="#Scorecard">League</a>
                </li>


              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="block mt-4">
                    <div class="row">
                      @for ($i = 0; $i <= 10; $i++)
                        <div class="col-lg-6 mb-4">
                          <div class="block" style="background: #E9C4C4">
                            <a href="{{ route('match_upcoming') }}">
                              <div class="fx-top-blk">
                                <h4>
                                  <a target="_blank" rel="noopener noreferrer" href="">Afghanistan tour of
                                    United Arab Emirates - UAE vs AFG</a>
                                </h4>
                                <div class="fx-top-middle-info">
                                  <span>Friendly Match</span>
                                </div>
                                <div class="fx-top-right-info">
                                  <p>Sharjah Cricket Stadium</p>
                                </div>
                              </div>

                              <div class="d-flex justify-content-between">
                                <div class="text-center" style="width:40%">
                                  <div class="">
                                    <img src="{{ asset('frontend/img/Brazil.png') }}" width="40" alt="">
                                  </div>
                                  <h4 class="mb-0">Brazil</h4>
                                  <div>Imran 78,84,90</div>
                                  <div>Imran 64</div>
                                  <div>Imran 52</div>
                                </div>
                                <div class="text-center" style="width:20%">
                                  <div class="btn btn-sm btn-success">Completed</div>
                                  <div>-vs-</div>
                                </div>
                                <div class="text-center" style="width:40%">
                                  <div class="">
                                    <img src="{{ asset('frontend/img/argentina.jpg') }}" width="40" alt="">
                                  </div>
                                  <h4 class="mb-0">Argentina</h4>
                                  <div>Imran 78,84,90</div>
                                  <div>Imran 64</div>
                                  <div>Imran 52</div>
                                </div>
                              </div>
                              <div class="text-center">
                                <h5>Full Time: 5-2</h5>
                                <a href="{{ route('match_upcoming') }}">View Match Details</a>
                              </div>

                            </a>
                          </div>
                        </div>
                      @endfor

                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Scorecard">
                  <div class="row">
                      @for ($i = 0; $i <= 10; $i++)
                        <div class="col-lg-6 mb-4">
                          <div class="block" style="background: #E9C4C4">
                            <a href="{{ route('match_upcoming') }}">
                              <div class="fx-top-blk">
                                <h4>
                                  <a target="_blank" rel="noopener noreferrer" href="">Afghanistan tour of
                                    United Arab Emirates - UAE vs AFG</a>
                                </h4>
                                <div class="fx-top-middle-info">
                                  <span>Friendly Match</span>
                                </div>
                                <div class="fx-top-right-info">
                                  <p>Sharjah Cricket Stadium</p>
                                </div>
                              </div>

                              <div class="d-flex justify-content-between">
                                <div class="text-center" style="width:40%">
                                  <div class="">
                                    <img src="{{ asset('frontend/img/Brazil.png') }}" width="40" alt="">
                                  </div>
                                  <h4 class="mb-0">Brazil</h4>
                                  <div>Imran 78,84,90</div>
                                  <div>Imran 64</div>
                                  <div>Imran 52</div>
                                </div>
                                <div class="text-center" style="width:20%">
                                  <div class="btn btn-sm btn-success">Completed</div>
                                  <div>-vs-</div>
                                </div>
                                <div class="text-center" style="width:40%">
                                  <div class="">
                                    <img src="{{ asset('frontend/img/argentina.jpg') }}" width="40" alt="">
                                  </div>
                                  <h4 class="mb-0">Argentina</h4>
                                  <div>Imran 78,84,90</div>
                                  <div>Imran 64</div>
                                  <div>Imran 52</div>
                                </div>
                              </div>
                              <div class="text-center">
                                <h5>Full Time: 5-2</h5>
                                <a href="{{ route('match_upcoming') }}">View Match Details</a>
                              </div>

                            </a>
                          </div>
                        </div>
                      @endfor

                    </div>
                </div>


              </div>

            </div>
          </div><!-- Single post end -->
          <div class="gap-30"></div>



          <div class="gap-30"></div>

        </div><!-- Content Col end -->



        <div class="col-lg-3">
          @include('frontend.advertise.add1')
          <div class="gap-30"></div>
          @include('frontend.1st_block.featured_video')
          <div class="gap-30"></div>
        </div>

      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- First block end -->
@endsection
