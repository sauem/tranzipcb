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

    let pcbModel = {
        propities: data,
        checkboxClass: ko.observable(null),
        _clickButton: function (item, event) {
            let _gr = $(event.target).closest(".button-group");
            _gr.find("button.active").removeClass("active");
            $(event.target).addClass("active");
            pcbModel._onClickItem(item)
        },
        _onClickItem: function(item){

        },
        _showDropdown: function (item, event) {
            let _ul = $(event.target).parent().find("ul.list-check");
            if(_ul.hasClass("hidden")){
                _ul.removeClass("hidden");
            }else {
                _ul.addClass("hidden");
            }
        },
        _selectQty: function (item, event) {
            let _val =$(event.target).text();
            $("button.select").find("span").text(_val);
            $(event.target).parent().find("li.active").removeClass("active");
            $(event.target).addClass("active");
            $(event.target).parent().addClass("hidden");
        },
        _applyColor : function () {
            alert("adsa")
        }
    }

    ko.applyBindings(pcbModel);
}