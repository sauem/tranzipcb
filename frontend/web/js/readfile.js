const PKEY = {
    layer: "layer",
    demension: "demension",
    qty: "qty",
    different_design: "different_design",
    delivery_format: "delivery_format",
    thinkness: "thinkness",
    color: "color",
    surface_finish: "surface_finish",
    copper_weight: "copper_weight",
    gold_fingers: "gold_fingers",
    material_type: "material_type",
    flying_probe_test: "flying_probe_test",
    castellated_holes: "castellated_holes",
    remove_order_number: "remove_order_number",
    finger_chamfered: "finger_chamfered",
    edges: "edges",
    total: "total",
    board: "board"
}
window.FILE = {
    width: 0,
    height: 0,
    layer_count: 0,
    price: {
        layer: 0,
        demension: 0,
        qty: 0,
        different_design: 0,
        delivery_format: 0,
        thinkness: 0,
        color: 0,
        surface_finish: 0,
        copper_weight: 0,
        gold_fingers: 0,
        material_type: 0,
        flying_probe_test: 0,
        castellated_holes: 0,
        remove_order_number: 0,
        finger_chamfered: 0,
        edges: 0,
        total: 0,
        board: 0
    }


};

Number.prototype.formatMoney = function (n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

function onUpload(element) {
    let _this = $(element);
    let file = _this[0].files[0];
    if (!config.type.includes(file.type)) {
        alert("Định dạng file không đúng!");
        return;
    }
    if (file.size > config.maxSize) {
        alert("Dung lượng file nhỏ hơn hoặc bàng 10M!");
        return;
    }
    _this.parent().find(".mark-input").text(file.name);
    showLoading();
    $.ajax({
        url: config.ajaxUpload,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: new FormData(_this.closest("form")[0]),
        beforeSend: handleFile,
        success: successResponse,
        error: errorResponse
    });

    function handleFile() {

    }

    function successResponse(success) {
        if (success.success) {
            complie(success.data);
            hideLoading();
            bindData(success.data)
        }
    }

    function errorResponse(error) {
        console.log(error)
    }

    function complie(data) {
        var source = $("#gerber-view").html();
        var template = Handlebars.compile(source);
        $("#gerberResult").html(template(data));
    }

    function showLoading() {
        $('.file-card').find(".overlay").css({"display": "flex"})
    }

    function hideLoading() {
        $('.file-card').find(".overlay").css({"display": "none"})
    }

    function bindData(data) {
        let _h = typeof data.info.pcb_size.cm.h !== "undefined" ? data.info.pcb_size.cm.h * 10 : 0;
        let _w = typeof data.info.pcb_size.cm.w !== "undefined" ? data.info.pcb_size.cm.w * 10 : 0;


        FILE.width = _w;
        FILE.height = _h;
        FILE.layer_count = 2;
        window.pcbModel.setHeight(_h);
        window.pcbModel.setWidth(_w);

        //caculate
        let id = 7;
        switch (FILE.layer_count) {
            case "1":
                id = 6;
                break;
            case "3":
                id = 8;
                break;
            case "4":
                id = 9;
                break;

        }
        __setBoard(id);
        __loadDefaultValue(FILE.price.board)
            .then(__setTotal)
            .then(__printBoard)
            .then(__printTotal)
            .catch(e => {
                console.log(e.message)
            });

    }
}
