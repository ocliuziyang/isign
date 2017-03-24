<template>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <router-link to="/Dashboard" class="site_title"><i class="fa fa-paw"></i> <span>后台管理</span></router-link>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img :src="avatar" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ me.name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <Sidebar></Sidebar>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <Navbar :avatar="avatar" :me="me"></Navbar>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <router-view></router-view>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
</template>

<script>
    import Sidebar from './layouts/Sidebar.vue'
    import Navbar from './layouts/Navbar.vue'

    import api from  './api/index'

    export default {

        components: {Sidebar, Navbar},
        data() {
            return {
                avatar: '/assets/gentelella/production/images/picture.jpg',
                me: {}
            }
        },
        methods: {
            fetchMe() {
                axios.get(api.API_ME).then(response => {


                    if(response.data.error) {
                        let error = response.data.error
                        alert(error.http_code);
                    } else {
                        this.me = response.data
                    }

                }).catch(error => {
                    console.log(error)
                })
            }
        },
        created() {
            this.fetchMe()
        }
    }
</script>