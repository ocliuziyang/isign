<style>
    #right-logout {
        margin-right: 25px;
    }
</style>

<template>
    <div class="top_nav">
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul id="right-logout" class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img :src="avatar" alt="">{{ me.name }}
                            <span class=" fa fa-angle-down"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="javascript:;"> Profile</a></li>
                            <li><a href="/dashboard/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['avatar', 'me']
    }

</script>