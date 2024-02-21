@extends('layouts.frontend.master')
@section('content')
  <section class="page_section_pad_50">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="block player_block_pad">
            <div>
              <div class="player_title">
                Lionel Messi Career, Records, Awards, Biography & More
              </div>
              <div class="player_short_des mt-2">
                Lionel Andres Messi (Born 29 September 1991), also known as Messi, is a
                Bangladeshi cricketer who currently captains the Bangladesh national team in test matches and plays as a
                left-handed batsman. He plays for the Dhaka Division in the NCL.
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-4">
                <div class="block">
                  <div class="text-center">
                    <img src="{{ asset('backend/images/default_profile.png') }}" alt="">
                  </div>
                  <div class="mt-4">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Nationality</td>
                          <td>Argentina</td>
                        </tr>
                        <tr>
                          <td>Role</td>
                          <td>Striker</td>
                        </tr>
                        <tr>
                          <td>Born</td>
                          <td>19 Sept, 1991</td>
                        </tr>
                        <tr>
                          <td>Age</td>
                          <td>32 Years, 2 Months, 23 Days</td>
                        </tr>
                        <tr>
                          <td>Preffered Foot</td>
                          <td>Left</td>
                        </tr>
                        <tr>
                          <td>Shirt Number</td>
                          <td>10</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="gap-30"></div>
              </div>
              <div class="col-lg-8">
               {{--  <ul class="nav nav-tabs">
                  <li class="nav-item profile_nav_width">
                    <a class="nav-link active rank_nav_link" data-toggle="tab" href="#home">Batting</a>
                  </li>
                  <li class="nav-item profile_nav_width">
                    <a class="nav-link rank_nav_link" data-toggle="tab" href="#menu1">Bowling</a>
                  </li>
                </ul> --}}

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    <div class="table-responsive">
                      <table class="table table-striped mt-2 player_profile_table">
                        <thead class="team_rank_th">
                          <tr>
                            <th scope="col">Overview</th>
                            <th scope="col">International</th>
                            <th scope="col">ODI</th>
                            <th scope="col">T20I</th>
                            <th scope="col">T20</th>
                            <th scope="col">List A</th>
                            <th scope="col">1st Class</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <th scope="row">Matches</th>
                              <td>56</td>
                              <td>28</td>
                              <td>6</td>
                              <td>122</td>
                              <td>157</td>
                              <td>133</td>
                            </tr>
                            <tr>
                              <th scope="row">Goals</th>
                              <td>56</td>
                              <td>28</td>
                              <td>6</td>
                              <td>122</td>
                              <td>157</td>
                              <td>133</td>
                            </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-lg-12">
                <div class="player_title" style="color: black">
                  Domestic Career
                </div>
                <div class="mt-2">
                  Mominul Haque plays for the Rajshahi Kings in the Bangladesh Premier League. Haque made his first-class
                  debut in
                  the 2008-09 season against the Chittagong Division.

                  During the 2012 Bangladesh Premier League, he won the Man of the Match award for 53* from 28 balls for
                  his
                  team
                  Barisal Burners against Khulna Royal Bengals, leading his team to a 4-wicket win.

                  In 2013-14 he tied with Roshen Silva for the highest 4th wicket partnership in List A history with 276
                  runs.

                  Mominul captained Bangladesh A in the Tour of India in late September 2015. It was his first voyage
                  abroad
                  as a
                  captain.

                  In October 2018, he was drafted into the Rajshahi Kings team squad for the 2018-19 Bangladesh Premier
                  League. In
                  November 2019, he was selected to play for the Dhaka Platoon in the 2019-20 Bangladesh Premier League.

                  He was selected by Comilla Victorians on player draft for the 2021-22 Bangladesh Premier League.
                </div>
                <div class="player_title">
                  International Career
                </div>
                <div class="mt-2">
                  Mominul made his debut for One Day International (ODI) and Twenty20 (T20) against West Indies in a home
                  series in
                  November and December 2012, replacing the injured Shakib Al Hasan. In 4 games he only scored 69 runs and
                  took 2
                  wickets.

                  He made his Test debut against Sri Lanka in Galle in March 2013. He scored half a century on his debut
                  and
                  ended
                  up hitting 156 runs in 3 innings with an impressive 52.00 average in his first Test series.

                  He made his first century in a friendly against New Zealand in Chittagong in 2013 with just 100 balls.
                  In
                  the
                  second Test of the series, Mominul scored another century that was also an out-inning. With that
                  performance,
                  Mominul became only the second Bangladeshi batsman after Tamim Iqbal to beat centuries in two
                  consecutive
                  Tests.

                  After a mammoth loss to Sri Lanka by an innings at home, Bangladesh came back strong thanks to Mominul's
                  hundred
                  in the second Test. Sri Lanka Poster 587 runs for the first innings with the help of Sangakkara's treble
                  century,
                  Bangladesh scored 271 for the reply where Mominul again scored an unbeaten 100. It was his second Test
                  century at
                  ZAC Stadium, Chittagong and the game ended in a draw.

                  Against Zimbabwe, Mominul scored his fourth Test century on 15 November 2014, which is his third at ZAC
                  Stadium,
                  in which he registered 443 for the Zimbabweans. In that game, Bangladesh also scored more than 300
                  points
                  in
                  both
                  innings of the game, also a first for Bangladesh in Test history. With his continued form, Mominul
                  joined
                  the
                  elite club of Everton Weekes, Alec Stewart, Matthew Hayden, Jacques Kallis, Simon Katich and Kumar
                  Sangakkara as
                  batsmen with over 50 points in nine straight Tests. He is also the fourth hitter after Weekes, Sunil
                  Gavaskar and
                  Mark Taylor to have 50+ goals in his first 12 Tests. Bangladesh comfortably won the match by 186 runs,
                  achieving
                  their first 3-0 Test series whitewash. Mominul was named man of the match for his performances.

                  On 20 May 2015, Mominul became the 5th batsman in cricket history to score 50 points in at least one
                  innings
                  of a
                  Test match in 11 consecutive Test matches despite playing fewer than 15 Test matches.

                  During the early 2017 tour for New Zealand, Mominul participated in the third-highest partnership for a
                  wicket for
                  Bangladesh on New Zealand soil when he added 85 runs along with Tamim. During the course he scored a
                  fifty.
                  However, after some patchy results in 2017, he was dropped from the squad. However, twenty-four hours
                  after
                  his
                  fall, he was recalled to the Bangladesh squad for the first Test against Australia on 20 August 2017.

                  On January 31, 2018 against Sri Lanka, Mominul scored his fifth Test century with 176 points. He added a
                  236-run
                  partnership with Mushfiqur Rahim until Rahim was released to 92 runs. This century is recorded as his
                  fourth
                  Test
                  century at his very favorite ZAC stadium. He also made 105 in the second innings as the match ended in a
                  tie. In
                  doing so, he became the first Bangladeshi batsman to hit two consecutive hundreds in two innings of a
                  Test
                  match.

                  In April 2018 he was one of ten cricketers awarded a central contract by the Bangladesh Cricket Board
                  (BCB)
                  ahead
                  of the 2018 season.
                </div>


                <div class="player_title">
                  Test Captain (2019-present)
                </div>
                <div class="player_title">
                  First Stint as Captain against India (2020)
                </div>
                <div class="mt-2">
                  On 29 October he was named Bangladesh's 11th Test captain when Shakib Al Hasan, the regular Bangladesh
                  Test
                  and
                  T20I captain, was banned from all forms of cricket for two years by the International Cricket Council
                  after
                  beating the ICC - violated the anti-corruption code. His first stint as Test captain was in the 2019–20
                  2-match
                  Test series against India. The second test match at Eden Gardens was the first day/night test match
                  played
                  by
                  either team and Mominul became Bangladesh's first captain in a day/night test match. Bangladesh lost
                  both
                  Test
                  matches by an innings margin and lost the series by a 2-0 margin.
                </div>
                <div class="player_title">
                  Home series against Zimbabwe and West Indies
                </div>
                <div class="mt-2">
                  When Zimbabwe toured Bangladesh in February 2020, the home team won the one-off friendly by one innings
                  and
                  106
                  carries. This is Bangladesh's first Test win under its captaincy and it was their only second Test match
                  win
                  by an
                  innings margin. He also scored 132 runs in their innings, which was his first century as captain and
                  matched
                  Tamim
                  Iqbal's record nine centuries, the most by Bangladeshi batsmen in Test cricket.

                  In February 2021, Bangladesh played two matchtest series against West Indies, which was their first
                  series
                  after
                  the COVID-19 pandemic. In the series, most regular West Indies players, including regular captains,
                  withdrew
                  their
                  names due to health security concerns and Cricket West Indies appointed an inexperienced squad with a
                  number
                  of
                  new players for the Test and ODI series. In the first Test at Chittagong, West Indies won by 3 wickets,
                  chasing a
                  mammoth 395 overall, the fifth highest successful run pursuit and highest successful run pursuit in
                  Asia,
                  courtesy
                  of debutant Kyle Mayer's 210*, which was the highest single score of all Batsmen in the fourth inning of
                  the
                  Test
                  debut. In the second Test, the West Indies were able to set a target of 248 runs as their second innings
                  collapsed, but Bangladesh fell back by 17 runs. West Indies then swept the series clean 2-0 in what was
                  their
                  first Test series win in Bangladesh since 2011.
                </div>




                Away series in Sri Lanka and Zimbabwe
                In April 2021, Bangladesh toured to Sri Lanka for a two-game Test series. In the first match, Mominul
                Haque scored
                127 runs, which was his first away Test century, and Bangladesh drew the match. In the second Test,
                Bangladesh
                lost the Test by 209 runs, drawing the series 1–1, which was their first tie in a Test series in Sri
                Lanka.

                In July 2021, Bangladesh toured Zimbabwe for a one-off friendly match. Bangladesh won the game by 220
                runs,
                which
                was the first win overseas and second overall for Bangladesh under its captaincy, both against Zimbabwe.

                Disappointing Home Series against Pakistan
                From November to December 2021, Pakistan toured Bangladesh for a 3-game T20I series and a 2-game Test
                series. In
                the first Test, Bangladesh, who batted first, were able to take a 46-run lead but broke down to 157 in
                their
                second innings, setting the 202 goal for Pakistan, who surpassed the visitors with 8 wickets. Although the
                rain
                washed away most of the second and all of the third day of the second Test, Pakistan won the match by one
                innings
                and eight runs late on day five to win the series 2–0.

                Test win in New Zealand
                After a disappointing series of 2-0 defeats by Pakistan in December, Bangladesh toured New Zealand in
                January 2022
                for a series of two friendly matches. In the first Test at the Bay Oval, Bangladesh defeated New Zealand
                by
                8
                wickets, which was their first win in New Zealand in 33 games played to date in all formats, which was
                also
                their
                first Test win over New Zealand.

                Records and Achievements
                Highest test batting average for Bangladesh.
                One of the six players and the only Bangladeshi to have scored 11 or more consecutive points over fifty
                points in
                Test history.
                Only Bangladeshi player to score centuries in both innings of a Test match.
                First batsman from Bangladesh to score 10 centuries in Test cricket.
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
