@php
    $sidebars = config('sidebar');
    // dd($sidebars);
@endphp
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{ asset('images/profile.png') }}" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{ Auth::user()->name }}</h5>
                            <small class="m-b-10 user-name font-small">({{ Auth::user()->email }})</small>

                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>

                @foreach ($sidebars as $sidebar)
                    @php
                        $url = isset($sidebar['url']) ? $sidebar['url'] : 'javascript:void(0)';
                        $permission_allow = true;
                        if(isset($sidebar['permission'])) {
                            $permission_allow = \App\Helpers\General::check($sidebar['permission']);
                        }
                    @endphp
                    @if ($sidebar['type'] == 'label')
                        @if($permission_allow)
                            <li class="nav-small-cap">
                                <i class="mdi mdi-dots-horizontal"></i>
                                <span class="hide-menu">{{ $sidebar['title'] }}</span>
                            </li>
                        @endif
                    @endif
                    @if ($sidebar['type'] == 'item')
                        <li class="sidebar-item">
                            @if($permission_allow)
                            <a class="waves-effect waves-dark sidebar-link @if ($sidebar['childrens'] != []) has-arrow @endif"
                                href="{{ $url }}" aria-expanded="false">
                                <i class="{{ isset($sidebar['icon']) ? $sidebar['icon'] : 'icon-Car-Wheel' }}"></i>
                                <span class="hide-menu">{{ $sidebar['title'] }} </span>
                            </a>
                            @endif

                            @if ($sidebar['childrens'] != [])
                                @foreach ($sidebar['childrens'] as $children)
                                    @php
                                        $url = isset($children['url']) ? $children['url'] : 'javascript:void(0)';
                                    @endphp
                                    <ul aria-expanded="false" class="collapse  first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ $url }}" class="sidebar-link">
                                                <i class="icon-Record"></i>
                                                <span class="hide-menu"> {{ $children['title'] }} </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </li>
                    @endif
                @endforeach

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
