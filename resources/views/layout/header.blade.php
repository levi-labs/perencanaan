 <div class="header d-print-none">
     <div class="header-left">
         <a href={{ url('dashboard') }}" class="logos"> <img src="{{ asset('assets/logo.png') }}" width="100"
                 height="100" alt="logo"> </a>
         <a href={{ url('dashboard') }}" class="logo logo-small"> <img src="{{ asset('assets/logo.png') }}" alt="Logo"
                 width="30" height="30"> </a>
     </div>
     <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
     <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
     <ul class="nav user-menu">
         {{-- <li class="nav-item dropdown noti-dropdown">
             <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span
                     class="badge badge-pill">3</span> </a>
             <div class="dropdown-menu notifications">
                 <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a
                         href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
                 <div class="noti-content">
                     <ul class="notification-list">
                         <li class="notification-message">
                             <a href="#">
                                 <div class="media"> <span class="avatar avatar-sm">
                                         <img class="avatar-img rounded-circle" alt="User Image"
                                             src="assets/img/profiles/avatar-02.jpg">
                                     </span>
                                     <div class="media-body">
                                         <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                             approved <span class="noti-title">your estimate</span></p>
                                         <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                         </p>
                                     </div>
                                 </div>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
             </div>
         </li> --}}
         <li class="nav-item dropdown has-arrow">
             <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span
                     class="user-img">{{ auth()->user()->nama_user }}</span> </a>
             <div class="dropdown-menu">
                 <div class="user-header">
                     {{-- <div class="avatar avatar-sm"> <img src="{{ asset('/assets/img/profiles/avatar-01.jpg') }}"
                             alt="User Image" class="avatar-img rounded-circle"> </div> --}}
                     <div class="user-text">
                         <h6>{{ auth()->user()->nama_user }}</h6>
                         <span class="badge badge-info"> {{ auth()->user()->akses_user }}</span>

                     </div>
                 </div>
                 {{-- <a class="dropdown-item" href="#">My Profile</a> --}}
                 <a class="dropdown-item" href="{{ url('edit-password') }}">Ubah Password</a>
                 <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
             </div>
         </li>
     </ul>
     {{-- <div class="top-nav-search">
         <form>
             <input type="text" class="form-control" placeholder="Search here">
             <button class="btn" type="submit"><i class="fas fa-search"></i></button>
         </form>
     </div> --}}
 </div>
