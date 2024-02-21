<li>
  <a href="javascript: void(0);" class="has-arrow waves-effect">
    <img src="{{ asset('backend/images/icon/blog.png') }}" class="property_icon" alt="">
    <span key="t-dashboards">News</span>
  </a>
  <ul class="sub-menu" aria-expanded="false">
    <li><a href="{{ route('backend.news.index') }}" key="t-tui-calendar">View All</a></li>
    <li><a href="{{ route('backend.news.create') }}" key="t-full-calendar">Create</a></li>
    <li>
      <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/category.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Caregory</span>
      </a>
      <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.category.index') }}" key="t-tui-calendar">View All</a></li>
        <li><a href="{{ route('backend.category.create') }}" key="t-full-calendar">Create</a></li>
      </ul>
    </li>
    <li>
      <a href="javascript: void(0);" class="has-arrow waves-effect">
        <img src="{{ asset('backend/images/icon/portfolio.png') }}" class="property_icon" alt="">
        <span key="t-dashboards">Journalist</span>
      </a>
      <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.journalist.index') }}" key="t-tui-calendar">View All</a></li>
        <li><a href="{{ route('backend.journalist.create') }}" key="t-full-calendar">Create</a></li>
      </ul>
    </li>
  </ul>
</li>

<li>
  <a href="javascript: void(0);" class="has-arrow waves-effect">
    <img src="{{ asset('backend/images/icon/blog.png') }}" class="property_icon" alt="">
    <span key="t-dashboards">Article</span>
  </a>
  <ul class="sub-menu" aria-expanded="false">
    <li><a href="{{ route('backend.blog.index') }}" key="t-tui-calendar">View All</a></li>
    <li><a href="{{ route('backend.blog.create') }}" key="t-full-calendar">Create</a></li>
  </ul>
</li>
<li>
  <a href="{{ route('backend.magazine.index') }}" class="has-arrow waves-effect">
    <img src="{{ asset('backend/images/icon/banner.png') }}" class="property_icon" alt="">
    <span key="t-dashboards">Magazine</span>
  </a>
  {{-- <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('backend.magazine.index') }}" key="t-tui-calendar">View All</a></li>
        <li><a href="{{ route('backend.magazine.create') }}" key="t-full-calendar">Create</a></li>
    </ul> --}}
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/career.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Photo Gallery</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.photoGallery.index') }}" key="t-tui-calendar">View All</a>
      </li>
      <li><a href="{{ route('backend.photoGallery.create') }}" key="t-tui-calendar">Create</a></li>
    </ul>
  </li>
  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/category.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Video Gallery</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.videoGallery.index') }}" key="t-tui-calendar">View All</a></li>
      <li><a href="{{ route('backend.videoGallery.create') }}" key="t-tui-calendar">Create</a></li>
    </ul>
  </li>
@if (Auth::check() && Auth::user()->type == 'admin')
  <li>
    <a href="{{ route('backend.general_info.edit', 1) }}" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/info.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">General Info</span>
    </a>
  </li>

  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/info.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">About Us</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.about.edit', 1) }}" key="t-full-calendar">About Info</a></li>
      <li><a href="{{ route('backend.team.founder') }}" key="t-full-calendar">Founder</a></li>

      <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/user.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">Board Members</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
          <li><a href="{{ route('backend.team.index') }}" key="t-tui-calendar">All Members</a></li>
          <li><a href="{{ route('backend.team.create') }}" key="t-tui-calendar">Create</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/blog.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">Testimonial</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
          <li><a href="{{ route('backend.testimonial.index') }}" key="t-tui-calendar">View All</a></li>
          <li><a href="{{ route('backend.testimonial.create') }}" key="t-full-calendar">Create</a></li>
        </ul>
      </li>
    </ul>
  </li>

 {{--  <li>
    <a href="{{ route('backend.partner.index') }}" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/partner.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Partner</span>
    </a>
  </li>
  <li>
    <a href="{{ route('backend.sectionContent.index') }}" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/info.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Section Content</span>
    </a>
  </li> --}}
  


  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/meta.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Meta</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.meta.index') }}" key="t-tui-calendar">Meta Info</a></li>
    </ul>
  </li>
  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/user.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">User</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.user.index') }}" key="t-tui-calendar">All User</a></li>
      <li><a href="{{ route('backend.user.create') }}" key="t-full-calendar">Add User</a></li>
    </ul>
  </li>


  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/banner.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Banner</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.banner.index') }}" key="t-tui-calendar">All Banner</a></li>
      <li><a href="{{ route('backend.banner.create') }}" key="t-full-calendar">Add Banner</a></li>
    </ul>
  </li>
  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/banner.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Cricket</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li><a href="{{ route('backend.playerData.create') }}" key="t-full-calendar">Create</a></li>
    </ul>
  </li>


  <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/privacy-policy.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Policy</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
      <li>
        <a href="{{ route('backend.terms.edit', 1) }}" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/privacy-policy.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">Term & Conditions</span>
        </a>
      </li>
      <li>
        <a href="{{ route('backend.policy.dmca_edit', 1) }}" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/privacy-policy.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">DMCA</span>
        </a>
      </li>
      <li>
        <a href="{{ route('backend.policy.desclaimer_edit', 1) }}" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/privacy-policy.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">Desclaimer</span>
        </a>
      </li>
      <li>
        <a href="{{ route('backend.privacy.edit', 1) }}" class="has-arrow waves-effect">
          <img src="{{ asset('backend/images/icon/privacy-policy.png') }}" class="property_icon" alt="">
          <span key="t-dashboards">Privacy Policy</span>
        </a>
      </li>

    </ul>
  </li>



  <li>
    <a href="{{ route('backend.subscriber.index') }}" class="has-arrow waves-effect">
      <img src="{{ asset('backend/images/icon/partner.png') }}" class="property_icon" alt="">
      <span key="t-dashboards">Subscriber</span>
    </a>

  </li>
@endif
