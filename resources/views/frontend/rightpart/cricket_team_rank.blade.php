<div class="widget tab-posts-widget">
    <div class="ranking_title">ICC Team Ranking</div>
  <ul class="nav nav-tabs" id="myTab">
      <li class="active">
          <a href="#t20" data-toggle="tab">T20</a>
      </li>
      <li>
          <a href="#odi" data-toggle="tab">Odi</a>
      </li>
      <li>
          <a href="#test" data-toggle="tab">Test</a>
      </li>
  </ul>

  <div class="tab-content">
      <div class="tab-pane active" id="t20">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pos</th>
                    <th>Team</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<10;$i++)
                <tr>
                    <td>1</td>
                    <td>
                       <img src="{{ asset('frontend/img/icon/cross.png') }}" width="20" alt="">
                       <span class="team_name">India</span>
                    </td>
                    <td>130</td>
                </tr>
                @endfor
            </tbody>
          </table>
      </div>
      <div class="tab-pane" id="odi">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pos</th>
                    <th>Team</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<10;$i++)
                <tr>
                    <td>1</td>
                    <td>
                       <img src="{{ asset('frontend/img/icon/cross.png') }}" width="20" alt="">
                       <span class="team_name">Australia</span>
                    </td>
                    <td>130</td>
                </tr>
                @endfor
            </tbody>
          </table>
      </div>
      <div class="tab-pane" id="test">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pos</th>
                    <th>Team</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @for ($i=0;$i<10;$i++)
                <tr>
                    <td>1</td>
                    <td>
                       <img src="{{ asset('frontend/img/icon/cross.png') }}" width="20" alt="">
                       <span class="team_name">New Zeeland</span>
                    </td>
                    <td>130</td>
                </tr>
                @endfor
            </tbody>
          </table>
    </div>
  </div>
</div>