// 封装 表格 函数
const SetDataTable = (element) => {
    $(element).DataTable()
}

const SetICheck =  (that, obj) => {

        if ($('input')[0]) {

            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            $('input').on('ifChecked', function(event){
                that.$set(obj, event.currentTarget.name, event.currentTarget.value)
            });
        }
}