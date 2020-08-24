function __changeQuantity(percent, pKey) {
    const _val = percent / 100 * FILE.price.board;
    FILE.price[pKey] = _val;
    let id = getLayerPrice();
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
    FILE.price.board = ((FILE.width / 100) * (FILE.height / 100)) * FILE.price.layer + FILE.price.extend_demension;
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
    let except = [PKEY.total, PKEY.extend_demension, PKEY.layer, PKEY.board, PKEY.demension];
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

var __getInfo = function (_propity, action = config.ajaxPropity) {
    showCartLoading();
    let tm = 0;
    $.ajax({
        async: false,
        url: action,
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

function __changeDemension() {
    let _width = FILE.width;
    let _height = FILE.height;

    let _acreage = parseFloat(_width / 100 * _height / 100);

    let data = __getInfo(PKEY.acreage, config.ajaxGetPropityByKey);
    const {items} = data;
    let args = items.map(item => parseFloat(item.value));
    let _value = findApproximately(args, _acreage);
    let _approximate = 0;
    let _extendPrice = 0;

    items.map(item => {
        if (item.value == _value) {
            _approximate = item.percent;
        }
    });

    let _board = _acreage * FILE.price.layer;
    if (_approximate > 0) {
        _extendPrice = parseFloat(_board) * parseFloat(_approximate / 100);
        FILE.price.extend_demension = _extendPrice;
    } else {
        FILE.price.extend_demension = 0;
    }

    FILE.price.board = parseFloat(_board);

    __reloadCard(getLayerPrice());
}

function __changeDesign(value) {
    let _approximate = 0;
    let design = (FILE.propities).filter(item => {
        return item.pKey == PKEY.different_design
    })
    let _items = design[0].items;
    let match = _items.filter(item => item.value == parseInt(value));
    if (match.length > 0) {
        _approximate = match[0].percent;
    } else {
        let data = __getInfo(PKEY.custom_design, config.ajaxGetPropityByKey);
        const {items} = data;
        items.map(item => {
            if (item.value == value) {
                _approximate = item.percent;
            }
        });
    }
    if (_approximate == 0) {
        _approximate = _items[0].percent;
        value = _items[0].value;
    }
    window.pcbModel._reloadActive(PKEY.different_design, value);
    FILE.price.different_design = _approximate / 100 * FILE.price.board;
    __reloadCard(getLayerPrice());
}

function showCartLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "flex"})
}

function hideCartLoading() {
    $('.loadingCharge').find(".overlay").css({"display": "none"})
}

function findApproximately(args, findValue) {
    let minValue = Math.min(...args);
    if (findValue < minValue) {
        return 0;
    }
    let distance = Math.abs(args[0] - findValue);
    let idx = 0;
    for (let i in args) {
        let _distance = Math.abs(args[i] - findValue);
        if (_distance < distance) {
            idx = i;
            distance = _distance
        }
    }
    return args[idx];
}

function getLayerPrice() {
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
    return id;
}