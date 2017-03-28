<template>
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><router-link to="/"><i class="fa fa-dashboard"></i> Dashboard</router-link></li>
                <li><router-link to="/users"><i class="fa fa-users" aria-hidden="true"></i> 用户管理</router-link></li>
                <li><router-link to="/buses"><i class="fa fa-bus" aria-hidden="true"></i> 班车管理</router-link></li>
                <li><router-link to="/wineshops"><i class="fa fa-h-square" aria-hidden="true"></i> 酒店管理</router-link></li>
                <li><router-link to="/meetings"><i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i> 会议管理</router-link></li>
                <li><a><i class="fa fa-send"></i> 签到管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><router-link to="/signBus"> 班车签到</router-link></li>
                        <li><router-link to="/signWineshop"> 酒店签到</router-link></li>
                        <li><router-link to="/signMeeting"> 会议签到</router-link></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</template>