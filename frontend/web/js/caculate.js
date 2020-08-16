function __changeQuantity(percent, pKey) {
    const _val = percent / 100 * FILE.price.board;
    FILE.price[pKey] = _val;
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
    __reloadCard(id);
}

function __reloadCard(id = 7) {
    __setBoard(id);
    __setTotal();
    __printTotal();
    __printBoard();
}

function __setBoard(id = 7) {

    FILE.price.layer = __getInfo(id);
    FILE.price.board = ((FILE.width / 100) * (FILE.height / 100)) * FILE.price.layer;

}

function __setTotal() {
    let _propities = FILE.price;
    let except = [PKEY.total, PKEY.layer];
    let _sum = 0;

    for (const i in _propities) {

        if (except.includes(i)) {
            continue;
        }
        _sum += _propities[i];
    }
    FILE.price.total = _sum;
}

function __printBoard() {
    window.pcbModel.setBoard(FILE.price.board.formatMoney())
}

function __printTotal() {
    window.pcbModel.setTotal(FILE.price.total.formatMoney())
}

async function __loadDefaultValue(_board = 0) {
    let _price = FILE.price;
    let _position = 0;
    let except = [PKEY.total, PKEY.layer, PKEY.board, PKEY.demension];
    for (let i in _price) {
        if (except.includes(i)) {
            continue;
        }
        if (i === PKEY.thinkness) {
            _position = 5;
        }
        let __result = 0;
        await $.ajax({
            url: config.ajaxDefault,
            type: "POST",
            cache: false,
            data: {pKey: i, board: _board, position: _position},
            success: function (res) {
                __result = res.value;
            }
        });
        FILE.price[i] = __result;
    }
}

function __toDecimet(val) {
    return val / 100;
}

var __getInfo = function (_propity) {
    showCartLoading();
    let tm = 0;
    $.ajax({
        async: false,
        url: config.ajaxPropity,
        type: "POST",
        data: {propity: _propity},
        cache: false,
        success: function (res) {
            hideCartLoading();
            if (res.success) {
                tm = res.value;
            } else {
                swal.fire("Lỗi", res.msg, "error");
            }
        }
    });
    return tm;
};

function showCartLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "flex"})
}

function hideCartLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "none"})
}
