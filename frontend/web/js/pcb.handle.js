loadPropites();

function loadPropites() {
    $.ajax({
        url: config.ajaxLoadPropites,
        type: "GET",
        data: {},
        success: function (res) {
            initModel(res)
        }
    })
}

function initModel(data) {

    function PCBModel() {

        let self = this;

        self.propities = data;
        self.width = ko.observable(100);
        self.heigth = ko.observable(100);
        self.players  = ko.observable();
        self.classButtonCheckbox = ko.observable("btn checkbox");

        self._clickButton = function (item, event) {
            let _gr = $(event.target).closest(".button-group");
            _gr.find("button.active").removeClass("active");
            $(event.target).addClass("active");
            self._onClickItem(item)
        };

        self._onClickItem = function (item) {

        };
        self.setPlayer = function(num){
            self.players(num);
        };
        self.setHeight = function (h) {
            self.heigth(h);
        };
        self.setWidth = function (w) {
            self.width(w);
        };
        self._getSize = function(index){
            if(index == 1){
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

        };
        self._setActiveButton = function(val){
            if(val == 2){
                self.classButtonCheckbox("btn checkbox active");
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