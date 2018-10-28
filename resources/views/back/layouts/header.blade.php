<header class="topbar" data-navbarbg="skin5">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <b class="logo-icon p-l-10">
          <img src="{{ asset('css/admincp/icons/logo-icon.png') }}" alt="homepage" class="light-logo" />
        </b>
        <span class="logo-text">
          <img src="{{ asset('css/admincp/icons/logo-text.png') }}" alt="homepage" class="light-logo" />
        </span>
      </a>
      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="notification_count badge badge-pill badge-info" data-count="{{ getCountNotifications() }}">{{ getCountNotifications() > 0 ? getCountNotifications() : '' }}</span>
        <i class="ti-more"></i>
      </a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
      <ul class="navbar-nav float-left mr-auto">
        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="d-none d-md-block">Truy cập nhanh <i class="fa fa-angle-down"></i></span>
          <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="">Link 1</a>
            <a class="dropdown-item" href="">Link 3</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav float-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"><span class="notification_count" style="font-size: 15px" data-count="{{ getCountNotifications() }}">{{ getCountNotifications() > 0 ? getCountNotifications() : '' }}</span></i>
          </a>
          <div class="dropdown-menu mc-div-notifications dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
            <div class="mc-notifications-header">
              <div class="left">Thông báo (<span data-count="{{ getCountNotifications() }}" class="notification_count">
                {{ getCountNotifications() }}
              </span>)</div>
              <div class="right">
                <a href="javascript:;" data-href="" id="markAsRead">Đánh dấu đã đọc</a>
              </div>
            </div>
            <div class="mc-clear-both"></div>
            <ul class="notifications" id="div_notifications" style="max-height: 400px; overflow-y: auto;">
              @foreach (Auth::user()->unreadNotifications()->take(5)->get() as $notification)
              <li class="notification mc-border-notification">
                <div class="media">
                  <img src="https://api.adorable.io/avatars/71/100.png" class="mr-2 img-circle" alt="{{ $notification->data['sender'] }}">
                  <div class="media-body">
                    <strong class="notification-title">
                      <a href="{{ $notification->data['link'] }}">{{ $notification->data['sender'] }}</a> {{ $notification->data['action'] }} <a href="{{ $notification->data['link'] }}">{{ $notification->data['title'] }}</a>
                    </strong>
                    <p class="notification-desc">{{ $notification->data['content'] }}.</p>
                    <div class="notification-meta">
                      <small class="timestamp">{{ $notification['created_at'] }}</small>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div class="mc-notifications-header">
              <div class="right">
                <a href="">Xem tất cả</a>
              </div>
            </div>
            <div class="mc-clear-both"></div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @php
            $avatar = Auth::user()->hinhanh;
            $avatar = $avatar ? asset('uploads/profile/' . $avatar) : asset('css/admincp/icons/account.png');
            @endphp
            <img src="{{ $avatar }}" alt="user" class="rounded-circle" width="30" height="30"></a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated">
            <a class="dropdown-item" href=""><i class="ti-user m-r-5 m-l-5"></i> Thông tin cá nhân</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href=""><i class="ti-email m-r-5 m-l-5"></i> Lịch sử nhận hoa hồng</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href=""><i class="ti-email m-r-5 m-l-5"></i> Thông báo</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off m-r-5 m-l-5"></i> Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            <div class="dropdown-divider"></div>
            <div class="p-l-30 p-10"><a href="" class="btn btn-sm btn-success btn-rounded">Xem thông tin cá nhân</a></div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>

<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Báo cáo</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Báo cáo</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Doanh thu tháng </span></a></li>
            <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Lịch sử nhận hoa hồng </span></a></li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Thống kê</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> Nhân viên </span></a></li>
            <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Lịch sử rút tiền </span></a></li>
            <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Lịch sử chi tiền </span></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>