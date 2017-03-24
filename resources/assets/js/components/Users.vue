<style scoped>
    #options {
        width:100px
    }
</style>

<template>
    <div id="app">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Manager <small>Users</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        This page is used to manage common users.
                    </p>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>sex</th>
                                <th>phone</th>
                                <th>company</th>
                                <th>job</th>
                                <th>Options</th>>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="user in users">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.sex }}</td>
                                <td>{{ user.phone_number }}</td>
                                <td>{{ user.company }}</td>
                                <td>{{ user.job }}</td>
                                <td id="options">
                                    <label class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></label>
                                    <label class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import api from '../api'

    export default {
        data() {
            return {
                users: []
            }
        },
        methods: {
            fetchUsers() {
                api.NProgress.start()
                axios.get(api.API_USERS).then(response => {
                    if(response.data.error) {
                        let error = response.data.error
                        window.location.reload();
                        alert(error.http_code);

                    } else {

                        this.users = response.data.data
                        $(window).ready(function() {
                            $('#datatable-fixed-header').DataTable();
                        } );
                    }
                    console.log(response)
                    api.NProgress.done()

                }).catch(error => {
                    console.log(error)
                    api.NProgress.done()
                })
            }
        },
        created() {

            this.fetchUsers()
        }

    }


</script>