<div class="innings-player pb-3">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
      <div class="single-player-blk s-info match_info_block">
        <div class="pl-img-wrap">
          <img src="{{ asset('frontend/img/Icon/toss.webp') }}" class="team_img" width="80" alt="">
        </div>
        <h4>Toss</h4>
        @if (isset($match_info->tossResults->tossWinnerName))
          <p class="mb-2">{{ @$match_info->tossResults->tossWinnerName }} elected to {{ @$match_info->tossResults->decision }}</p>
        @endif
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
      <div class="single-player-blk s-info match_info_block">
        <div class="pl-img-wrap">
          <img src="{{ asset('frontend/img/Icon/vanue.webp') }}" class="team_img" width="80" height="80"  alt="">
        </div>
        <h4>Venue</h4>
        <p class="mb-2">{{ @$match_info->venue->name }}</p>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
      <div class="single-player-blk s-info match_info_block">
        <div class="pl-img-wrap">
          <img src="{{ asset('frontend/img/Icon/umpire.webp') }}" class="team_img" width="80" alt="">
        </div>
        <h4>Umpires</h4>
        <p class="mb-2">{{ @$match_info->umpire1->name }}({{ @$match_info->umpire1->country }}), {{ @$match_info->umpire2->name }}({{ @$match_info->umpire2->country }}), {{ @$match_info->umpire3->name }}({{ @$match_info->umpire3->country }},
          TV)</p>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
      <div class="single-player-blk s-info match_info_block">
        <div class="pl-img-wrap">
          <img src="{{ asset('frontend/img/Icon/umpire.webp') }}" class="team_img" width="80" alt="">
        </div>
        <h4>Match Referee</h4>
        <p class="mb-2">{{ @$match_info->referee->name }} ({{ @$match_info->referee->country }})</p>
      </div>
    </div>
  </div>
</div>
