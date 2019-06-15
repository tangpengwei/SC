layui.define('jquery',function (exports) {
    var jquery = layui.jquery;
    var jq = {
        get:jquery.get,
        post:jquery.post,
        put:function (a,b,c) {
            jquery.ajax({
                url:a,
                method:'put',
                data:b,
                success:c

            })
        },
        del:function (a,b,c) {
            jquery.ajax({
                url:a,
                method:'delete',
                data:b,
                success:c

            })
        },
        // aa:function () {
        //     jquery.ajax({
        //         url:arguments[0],
        //         method:'put',
        //         data:arguments[1],
        //         success:arguments[2]
        //
        //     })
        // }

    };

    exports('liuliuliu',jq);
});