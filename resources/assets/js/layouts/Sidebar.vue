<template>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><router-link to="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</router-link></li>

                    <li><router-link to="Users"><i class="fa fa-users" aria-hidden="true"></i> 用户管理</router-link></li>
                    <li><a href="index2.html"><i class="fa fa-bus" aria-hidden="true"></i> 班车管理</a></li>
                <li><a href="index3.html"><i class="fa fa-send" aria-hidden="true"></i> 签到管理</a></li>
            </ul>
        </div>
    </div>
</template>