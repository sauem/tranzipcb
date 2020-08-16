function __CaculateBoard() {

}

function __changeQuantity(percent) {
    let board = FILE.price.board;
    let _addPrice = board + (percent / 100) * board;
    FILE.price.board = _addPrice;
    FILE.price.total = _addPrice;

    __setTotal();
}

function __setTotal() {
    let _price = FILE.price;
    let except = ["total","layer"];
    let _sum = 0;
    for(let i in _price){
        if(except.includes(i)){
            continue;
        }
        _sum += _price[i];
    }
    FILE.price.total = _sum;
}

function __printBoard() {
    window.pcbModel.setBoard(FILE.price.board.formatMoney())
}
function __printTotal() {
    window.pcbModel.setTotal(FILE.price.total.formatMoney())
}
function  __loadDefaultValue() {

}
function __toDecimet(val) {
    return val / 100;
}

var __getInfo = function (_propity) {
    showLoading();
    let tm = 0;
    $.ajax({
        'async': false,
        url: config.ajaxPropity,
        type: "POST",
        data: {propity: _propity},
        cache: false,
        success: function (res) {
            hideLoading();
            if (res.success) {
                tm = res.value;
            } else {
                swal.fire("Lỗi", res.msg, "error");
            }
        }
    });
    return tm;
};

function showLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "flex"})
}

function hideLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "none"})
}
