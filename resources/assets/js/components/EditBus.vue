<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ isEditBus ? 'Edit bus' : 'Create New bus Form' }} <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" v-model="bus.name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">是否启用</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn" :class="[bus.is_active ? 'btn-primary' : 'btn-default']" @click="bus.is_active=true">
                                        启用
                                    </label>

                                    <label class="btn" :class="[bus.is_active ? 'btn-default' : 'btn-danger']" @click="bus.is_active=false">
                                        停用
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">说明</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text"   v-model="bus.description">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">座位数</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text"   v-model="bus.seat_count">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">车辆状态</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 table-radio">
                                <label><input type="radio" name="status" value="0" v-model="bus.status">待机　</label>
                                <label><input type="radio" name="status" value="1" v-model="bus.status">前往机场　</label>
                                <label><input type="radio" name="status"  value="2" v-model="bus.status">到达机场　</label>
                                <label><input type="radio"  name="status" value="3" v-model="bus.status">机场载客中　</label>
                                <label><input type="radio" name="status"  value="4" v-model="bus.status">满客停止载客　</label>
                                <label><input type="radio" name="status"  value="5" v-model="bus.status">前往酒店中　</label>
                                <label><input type="radio"  name="status" value="6" v-model="bus.status">到达酒店</label>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                    </form>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <router-link to="/buses"><button class="btn btn-primary" type="button">Cancel</button></router-link>
                            <button class="btn btn-success" v-if="isEditBus" @click="editBus()">Submit</button>
                            <button class="btn btn-success" v-else @click="createBus()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import api from '../api'
    import {show_stack_bottomright} from '../utils/notify'
    import NProgress from 'nprogress'
    export default {
        data() {
            return {
                busID: this.$route.params.id,
                bus: {},
                picked: 0
            }
        },
        computed: {
            isEditBus() {
                return this.$route.params.id ? true : false
            }
        },
        methods: {
            // 获取班车信息
            fetchBus () {
                let self = this
                NProgress.start()
                axios.get('buses/'+this.busID).then(response => {
                    self.bus = response.data
                    setTimeout(() => {
                        SetICheck(self, self.bus)
                    })
                    NProgress.done()
                }).catch(error => {
                    show_stack_bottomright('error', '提示', '获取数据失败')
                    NProgress.done()
                })
            },
            //新建班车
            createBus() {
                NProgress.start()
                let self = this
                axios.post('buses', {
                    bus: this.bus
                }).then(response => {
                    console.log(response)
                    if(response.data.status === 1) {
                        show_stack_bottomright('success', '操作成功', response.data.message)
                        self.$router.push('/buses')
                        NProgress.done()
                        return
                    }
                    show_stack_bottomright('error', '操作失败', response.data.message)
                    NProgress.done()
                }).catch(error => {

                    if (error.response.data) {
                        _.forIn(error.response.data, function (value, key) {
                            show_stack_bottomright('error', key, value)
                        })
                    }

                    NProgress.done()
                })
            },

            editBus() {

                let self = this
                axios.post('buses/'+this.bus.id, {
                    _method: 'put',
                    bus: this.bus
                }).then(response => {

                    if(response.data.status === 1) {
                        show_stack_bottomright('success', '提示', response.data.message)
                        self.$router.push('/buses')
                        return
                    }
                    show_stack_bottomright('error', '操作失败', response.data.message)


                }).catch(error => {

                    if (error.response.data) {
                        _.forIn(error.response.data, function (value, key) {
                            show_stack_bottomright('error', key, value)
                        })
                    }
                })
            }
        },

        mounted () {

            SetICheck()
            if (this.busID) {
                this.fetchBus()
            } else {
                this.bus =  {is_active: true, status: 0}
                setTimeout(() => {
                    SetICheck(this, this.bus)
                })
            }



        },

//        beforeRouteLeave (to, from, next) {
//            // 导航离开该组件的对应路由时调用
//            // 可以访问组件实例 `this`
//            next(true)
//        }
    }
</script>

<style>
    .table-radio {
        margin-top: 8px;
    }
</style>