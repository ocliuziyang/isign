<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Buses Manage <small>Bus</small></h2>
                    <div class="pull-right">
                        <router-link to="/bus/create"><button class="btn btn-primary">NewBus</button></router-link>
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
                            <th>SeatCount</th>
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
                                <td>{{ bus.seat_count }}</td>
                                <td>{{ bus.is_active ? 'Enabled' : 'Disabled' }}</td>

                                <td v-if="bus.status === 0"><label class="label label-default">待机</label></td>
                                <td v-else-if="bus.status === 1"><label class="label label-primary">前往机场</label></td>
                                <td v-else-if="bus.status === 2"><label class="label label-success">到达机场</label></td>
                                <td v-else-if="bus.status === 3"><label class="label label-info">机场载客中</label></td>
                                <td v-else-if="bus.status === 4"><label class="label label-warning">满客停止载客</label></td>
                                <td v-else-if="bus.status === 5"><label class="label label-primary">前往酒店中</label></td>
                                <td v-else-if="bus.status === 6"><label class="label label-success">到达酒店</label></td>
                                <td v-else><label class="label label-default">未知状态</label></td>


                                <td>{{ bus.created_at }}</td>
                                <td>
                                    <router-link :to="{ name: 'busEdit', params: { id: bus.id } }"><button class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></router-link>
                                    <button class="btn btn-danger" @click="deleteBus(bus.id)"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
    import swal from 'sweetalert2'

    import {show_stack_bottomright} from '../utils/notify'
    export default {
        data() {
          return {
              buses: []
          }
        },
        methods: {

            initPlugins () {
                setTimeout(() => {
                    SetDataTable('#datatable')
                })
            },

            fetchBuses () {
                NProgress.start()
                axios.get('/buses').then(response => {
                    this.buses = response.data.data
                    //datatables
                    this.initPlugins()
                    show_stack_bottomright('success', 'Tip', 'Load Buses list successfully!')
                    NProgress.done()
                }).catch(error => {
                    console.log(error)
                    show_stack_bottomright('error', 'Tip', error.toString())
                    NProgress.done()
                })
            },

            deleteBus(busId) {

                var self = this
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function () {
                    axios.post('buses/'+busId, {
                        _method: 'delete'
                    }).then(response => {

                        if (response.data.status == 1) {
                            self.fetchBuses()
                            swal(
                                'Deleted!',
                                response.data.message,
                                'success'
                            )
                        } else  {
                            show_stack_bottomright('error', 'Error', response.data.message)
                        }
                    }).catch(error => {

                        show_stack_bottomright('error', 'Error', 'Internal Error!')
                        alert(error.toString())
                    });
                })
            }
        },
        mounted() {
            this.fetchBuses()
        }
    }

</script>