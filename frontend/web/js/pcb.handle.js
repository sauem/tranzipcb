loadPropites();

function loadPropites() {
    $('.file-card').find(".overlay").css({"display": "flex"})
    $.ajax({
        url: config.ajaxLoadPropites,
        type: "GET",
        data: {},
        success: function (res) {
            initModel(res);
            FILE.propities = res;
            $('.file-card').find(".overlay").css({"display": "none"});
        }
    })
}

function initModel(data) {

    function PCBModel() {

        let self = this;

        self.propities = data;
        self.width = ko.observable(100);
        self.heigth = ko.observable(100);
        self.players = ko.observable();
        self.classButtonCheckbox = ko.observable("btn checkbox");
        self.board = ko.observable(0);
        self.total = ko.observable(0)
        self.colorBox = ko.observable()

        self.colorBox("<span></span>");

        self._clickButton = function (item, event) {
            let _gr = $(event.target).closest(".button-group");
            let _pKey = $(event.target).attr("pkey");
            _gr.find("button.active").removeClass("active");
            $(event.target).addClass("active");
            self._onClickItem(item, _pKey)
        };
        self._onClickItem = function (item, pkey) {
            let _key = item.id;
            let _val = __getInfo(_key);
            if (pkey === PKEY.layer) {
                window.FILE.layer_count = item.value;
                __reloadCard(item.id);
            } else {

                __changeQuantity(_val, pkey);
            }
        };
        self.setPlayer = function (num) {
            self.players(num);
        };
        self.setHeight = function (h) {
            self.heigth(h);
        };
        self.setWidth = function (w) {
            self.width(w);
        };
        self.setBoard = function (board) {
            self.board(board);
        };
        self.setTotal = function (total) {
            self.total(total);
        };
        self.checkGroup = function (pkey) {
            if (pkey === PKEY.color) {
                return "button-group color-group";
            } else {
                return "button-group";
            }
        };
        self.checkBackground = function (pkey, name, color) {
            if (pkey === PKEY.color) {
                return "<span style='background: " + color + "'></span> " + name;
            }
            return name;
        };
        self._setActive = function (index, parent, pkey = "") {

            if (pkey === PKEY.layer) {
                if (index === 1) {
                    return "btn checkbox active";
                }
                return "btn checkbox";
            } else if (parent !== PKEY.layer) {
                if (pkey === PKEY.thinkness) {
                    if (index === 5) {
                        return "btn checkbox active";
                    }
                    return "btn checkbox";
                } else if (index === 0) {
                    return "btn checkbox active";
                } else {
                    return "btn checkbox";
                }
            }


        }
        self._reloadActive = function (pkey, index) {
            $("button[pkey='different_design']").each(function () {
                if ($(this).attr("value") == index) {
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            });
        };
        self._getSize = function (index) {
            if (index === 1) {
                return self.width;
            }
            return self.heigth;
        };
        self._showDropdown = function (item, event) {
            let _ul = $(event.target).parent().find("ul.list-check");
            if (_ul.hasClass("hidden")) {
                _ul.removeClass("hidden");
            } else {
                _ul.addClass("hidden");
            }
        };

        self._selectQty = function (item, event) {
            let _val = $(event.target).text();
            $("button.select").find("span").text(_val);
            $(event.target).parent().find("li.active").removeClass("active");
            $(event.target).addClass("active");
            $(event.target).parent().addClass("hidden");

            let _key = item.id;
            let _percent = __getInfo(_key);
            __changeQuantity(_percent, PKEY.qty);
        };
        self.changeInput = function (item, event) {
            let _pKey = $(event.target).attr("pkey");
            let _name = $(event.target).attr("name");
            let _val = $(event.target).val();
            if (_pKey === PKEY.demension) {
                switch (_name) {
                    case "width":
                        FILE.width = parseInt(_val);
                        break;
                    case "height":
                        FILE.height = parseInt(_val);
                        break;
                }
                __changeDemension();
            }
            if (_pKey === PKEY.different_design) {
                __changeDesign(_val);
            }
        };
        self._showLoading = function () {
            $("#overlay").css({"display": "flex"})
        };

        self._hideLoading = function () {
            $("#overlay").css({"display": "none"})
        };

    }

    window.pcbModel = new PCBModel();
    ko.applyBindings(window.pcbModel);
}