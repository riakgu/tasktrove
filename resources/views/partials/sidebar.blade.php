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
                <!-- <li class="sidebar-title">Menu</li> -->

                <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="dashboard.html" class="sidebar-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('tasks*') ? 'active' : '' }} has-sub">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <span>Tasks</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item {{ request()->is('tasks/add') ? 'active' : '' }}">
                            <a href="add-task.html" class="submenu-link">Add Task</a>
                        </li>

                        <li class="submenu-item {{ request()->is('tasks/list') ? 'active' : '' }}">
                            <a href="task-list.html" class="submenu-link">Task List</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ request()->is('chatbot') ? 'active' : '' }}">
                    <a href="chatbot.html" class="sidebar-link">
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Chatbot</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('chatbot') ? 'active' : '' }}">
                    <a href="settings.html" class="sidebar-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                </li>

            </ul>

        </div>

    </div>
</div>
