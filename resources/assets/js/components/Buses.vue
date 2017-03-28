<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Buses Manage <small>Bus</small></h2>
                    <div class="pull-right">
                        <button class="btn btn-primary">Add New</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the consfunctiontruction function: <code>$().DataTable();</code>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>IsActive</th>
                            <th>Status</th>
                            <th>CreatedTime</th>
                            <th>Oprations</th>
                        </tr>
                        </thead>


                        <tbody>
                            <tr v-for="bus in buses">
                                <td>{{ bus.id }}</td>
                                <td>{{ bus.name }}</td>
                                <td>{{ bus.description }}</td>
                                <td>{{ bus.is_active ? 'Enabled' : 'Disabled' }}</td>
                                <td>{{ bus.status }}</td>
                                <td>{{ bus.created_at }}</td>
                                <td>
                                    <router-link to="/bus/2/edit"><button class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></router-link>
                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
    import NProgress from 'nprogress'
    export default {
        data() {
          return {
              buses: []
          }
        },
        methods: {

            fetchBuses() {
                NProgress.start()
                console.log('开始获取班车列表')
                axios.get('/buses').then(response => {
                    console.log(response)
                    this.buses = response.data.data
                    //datatables
                    $(document).ready(function () {
                        $('#datatable').DataTable();
                    })
                    NProgress.done()
                }).catch(error => {
                    console.log(error)
                    NProgress.done()
                })
            }
        },
        created() {
            this.fetchBuses()
        }
    }

</script>