<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ isCreateUser ? 'Create New User Form' : 'Edit User' }} <small>different form elements</small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" v-model="user.name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sex</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn" :class="[user.sex ? 'btn-primary' : 'btn-default']" @click="user.sex=true">
                                         &nbsp; Male &nbsp;
                                    </label>

                                    <label class="btn" :class="[user.sex ? 'btn-default' : 'btn-primary']" @click="user.sex=false">
                                         Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">phone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text"   v-model="user.phone_number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">company</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text"   v-model="user.company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">job</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" v-model="user.job">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                    </form>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button class="btn btn-success" v-if="isCreateUser" @click="createUser()">Submit</button>
                            <button class="btn btn-success" v-else @click="editUser()">Submit</button>
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

    export default {
        data() {
            return {
                user: this.$route.params.user ? this.$route.params.user : {sex: true}
            }
        },

        computed: {
            isCreateUser() {
                if (this.$route.params.action == 'create') {
                    return true
                } else  {
                    return false
                }
            }
        },
        methods: {
            createUser() {
                let self = this
                axios.post(api.API_ROOT+'user', {
                    user: this.user
                }).then(response => {
                    console.log(response)
                    if(response.data.status == 1) {
                        show_stack_bottomright('success', '操作成功', response.data.message)
                        self.$router.go(-1)
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
            },

            editUser() {
                let self = this
                axios.put(api.API_ROOT+'user', {
                    user: this.user
                }).then(response => {
                    console.log(response)
                    if(response.data.status == 1) {
                        show_stack_bottomright('success', '操作成功', response.data.message)
                        self.$router.go(-1)
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
        }
    }
</script>