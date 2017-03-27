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
                    <div class="pull-right">
                        <router-link to="user/create"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Create New User</button></router-link>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm">Import Users</button>

                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Import Users</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="uploadExcelForm">
                                            <div class="form-group">
                                                <label>file</label>
                                                <input type="file" id="excel" name="excel"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/admin/apidownloadUsersExcelExample"><button class="btn btn-info pull-left">Download Example</button></a>
                                        <button class="btn btn-success" @click="uploadExcel()">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <td>{{ user.sex ? 'Male' : 'Female' }}</td>
                                <td>{{ user.phone_number }}</td>
                                <td>{{ user.company }}</td>
                                <td>{{ user.job }}</td>
                                <td id="options">
                                    <label class="btn btn-primary btn-sm" @click="editUser(user)"><i class="fa fa-pencil-square" aria-hidden="true"></i></label>
                                    <label class="btn btn-danger btn-sm" @click="deleteUser(user.id)"><i class="fa fa-trash" aria-hidden="true"></i></label>
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
    import swal from 'sweetalert2'
    import {show_stack_bottomright} from '../utils/notify'
    export default {
        data() {
            return {
                users: [],
                excel: null,
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
            },

            editUser(user) {
                console.log(this.$route)
                this.$router.push({ name: 'user', params: { action: 'edit' , user: user}})
            },

            deleteUser(userID) {
                let self = this
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    axios.delete('user/'+userID).then(response=> {
                        if (response.data.status == 1) {
                            self.fetchUsers()
                            swal(
                                'Deleted!',
                                response.data.message,
                                'success'
                            )
                        } else  {
                            alert(response.data.message)
                        }

                    }).catch(error=> {

                    })

                })
            },

            uploadExcel() {

                let self = this
                var file = document.getElementById('excel').files[0];
                var data = new FormData()
                data.append('_method', 'put')
                data.append('file', file)
                axios.post('users/import', data).then(response => {
                    console.log(response)
                    if (response.data.status == 1) {
                        self.fetchUsers()
                        show_stack_bottomright('success', 'Successful operation', response.data.message)
                    } else  {
                        show_stack_bottomright('error', 'failing operation', response.data.message)
                    }

                    $('.bs-example-modal-sm').modal('hide')

                }).catch(error => {
                    $('.bs-example-modal-sm').modal('hide')
                    show_stack_bottomright('error', 'failing operation', 'Server 500 error')
                });
            }
        },
        created() {

            this.fetchUsers()
        }

    }


</script>