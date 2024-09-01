<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{url('admin/dashboards')}}" class="app-brand-link">
         <img src="{{asset($basicInfo->logo)}}" alt="" style="width: 100%;">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{ route('dashboards') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>


      <!--  Banner Section  -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-message-square-dots"></i>
          <div data-i18n="Layouts">Sliders</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admin.banner.index') }}" class="menu-link">
              <div data-i18n="Without menu">Manage Slider</div>
            </a>
          </li>
        </ul>
      </li>

        <!--  Service Section  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-conversation"></i>
            <div data-i18n="Layouts">Service Info</div>
            </a>

            <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('admin.service.index') }}" class="menu-link">
                <div data-i18n="Without menu">Services</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.price-plan.index') }}" class="menu-link">
                <div data-i18n="Without menu">Pricing</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.project.index') }}" class="menu-link">
                <div data-i18n="Without menu">Projects</div>
                </a>
            </li>
            </ul>
        </li>


        <!--  Logo Section  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-image-alt"></i>
            <div data-i18n="Layouts">Clients</div>
            </a>

            <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('admin.logo.index') }}" class="menu-link">
                <div data-i18n="Without menu">Clients</div>
                </a>
            </li>
            </ul>
        </li>



        <!--  About Section  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-pin"></i>
                <div data-i18n="Layouts">Additional</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.about.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Why {{env('ÁPP_NAME')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.safety.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Why Choose Us</div>
                    </a>
                </li>
            </ul>
        </li>

        <!--  Contact Section  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-health"></i>
            <div data-i18n="Layouts">Messages</div>
            </a>

            <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('admin.contact.index') }}" class="menu-link">
                <div data-i18n="Without menu">Manage Qurey</div>
                </a>
            </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icon bx bx-image"></i>
                <div data-i18n="Layouts">Blogs</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('blogs.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Blogs</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icon bx bx-image"></i>
                <div data-i18n="Layouts">Pages</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ url('admin/information/about_us') }}" class="menu-link">
                        <div data-i18n="Without menu">About Us</div>
                    </a>
                    <a href="{{ url('admin/information/contact_us') }}" class="menu-link">
                        <div data-i18n="Without menu">Contact Us</div>
                    </a>
                    <a href="{{ url('admin/information/terms_codition') }}" class="menu-link">
                        <div data-i18n="Without menu">Terms & Condition</div>
                    </a>
                    <a href="{{ url('admin/information/privacy_policy') }}" class="menu-link">
                        <div data-i18n="Without menu">Privacy Policy</div>
                    </a>
                    <a href="{{ url('admin/information/faq') }}" class="menu-link">
                        <div data-i18n="Without menu">Faq</div>
                    </a>
                </li>
            </ul>
        </li>
        <!--  Contact Section  -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.basic-info.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Basic Settings</div>
                    </a>
                </li>
                <a href="{{ route('admin.review.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Reviews</div>
                </a>
            </ul>
        </li>

        <li class="menu-item" style="background: #09057b;color: white;text-align: center;">
            <form method="POST" action="{{ route('logout') }}">
            @csrf

              <a class="dropdown-item" onclick="event.preventDefault();
              this.closest('form').submit();">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
          </form>
        </li>

    </ul>
  </aside>
