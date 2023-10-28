<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="dashboard.html"><img src="assets/images/svg/logo2.svg" alt="Logo" srcset="" /></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('tasks*') ? 'active' : '' }}">
                    <a href="/tasks" class="sidebar-link">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span>Tasks</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('chatbot') ? 'active' : '' }}">
                    <a href="/chatbot" class="sidebar-link">
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Chatbot</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('settings') ? 'active' : '' }}">
                    <a href="/settings" class="sidebar-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer position-absolute bottom-0">
            <ul class="menu">
                <li class="sidebar-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="sidebar-link" style="background: none; border: none;">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>




        {{--        <div class="sidebar-footer position-absolute bottom-0">--}}
{{--            <ul class="menu">--}}
{{--                <li class="sidebar-item">--}}
{{--                    <form action="/logout" method="post">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="sidebar-link border-0 bg-0">--}}
{{--                            <i class="bi bi-box-arrow-left"></i>--}}
{{--                            <span>Logout</span>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}

    </div>
</div>
