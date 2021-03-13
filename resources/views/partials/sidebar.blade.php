 <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="profile-info">
                    <figure style="backround-color:red" class="user-cover-image"><img src="{{ url('front/assets/img/background.jpg') }}"></figure>
                    <div class="user-info">
                        <img src="{{ url('front/img/avatar.jpg') }}" alt="avatar">
                        <h6 class=""></h6>
                        <p class=""></p>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                <li style="width:90%;border-radius:5%;border:1px solid #a2a0a070" class="sidebar-a menu ">
                        <a href="{{ route('/') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span style="font-size:15px">{{ __('HOME')}}</span>
                            </div>
                        </a>
                    </li>
                    @if(session('impersonated_by'))
                    <li style="width:90%;border-radius:5%;border:1px solid #a2a0a070" class="sidebar-a menu ">
                        <a href="{{ route('leave-impersonate') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span style="font-size:15px">Impersonate Leave</span>
                            </div>
                        </a>
                    </li>
                    @endif
                    <li style="width:90%;border-radius:5%;border:1px solid #a2a0a070" class="sidebar-a menu ">
                        <a href="{{ route('posts') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span style="font-size:15px">{{ __('POSTS')}}</span>
                            </div>
                        </a>
                    </li>
                    <li style="width:90%;border-radius:5%;border:1px solid #a2a0a070" class="sidebar-a menu ">
                        <a href="{{ route('logout') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span style="font-size:15px">{{ __('LOGOUT')}}</span>
                            </div>
                        </a>
                    </li>
                    <li style="width:90%;border-radius:5%;border:1px solid #a2a0a070" class="sidebar-a menu ">
                        <a href="" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span style="font-size:15px">{{ __('ABOUT_US') }}</span>
                            </div>
                        </a>
                    </li>
                    @foreach ($languages as $shortCode => $lang)
                        <li class="nav-item">
                            <a class="dropdown-item" href="{!! $lang['url'] !!}">{!! $lang['title'] !!}</a>
                        </li>
                        <!-- <a class="dropdown-item py-2 border-bottom" href="javascript:void(0)">{!! $lang['title'] !!}</a> -->
                    @endforeach
                </ul>
                
            </nav>

        </div>