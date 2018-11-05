$(document).ready(function(){
    $('#datatable').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        "language": { //自定义描述....
            "sProcessing": "正在获取数据, 请稍后...",
            "sLengthMenu": "显示 _MENU_ 条",
            "sZeroRecords": "没有找到数据",
            "sInfo": "从 _START_ 到 _END_ 条记录 总记录数为 _TOTAL_ 条",
            "sInfoEmpty": "记录数为0",
            "sInfoFiltered": "(全部记录数 _MAX_ 条)",
            "sInfoPostFix": "",
            "sSearch": "全局搜索",
            "sUry": "",
            "oPaginate": {
                "sFirst": "第一页",
                "sPrevious": "上一页",
                "sNext": "下一页",
                "sLast": "最后一页"
            },
            "loadingRecords": "Please wait - loading...",
            "processing": "DataTables is currently busy",
            "search": "Apply filter _INPUT_ to table"
        },
    });

});