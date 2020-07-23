
function onUpload(element) {
    let _this = $(element);
    let file  = _this[0].files[0];
    if(!config.type.includes(file.type)){
        alert("Định dạng file không đúng!");
        return;
    }
    if(file.size > config.maxSize){
        alert("Dung lượng file nhỏ hơn hoặc bàng 10M!");
        return;
    }
    _this.parent().find(".mark-input").text(file.name);
    showLoading();
    $.ajax({
        url  : config.ajaxUpload,
        type : "POST",
        cache: false,
        contentType: false,
        processData: false,
        data : new FormData(_this.closest("form")[0]),
        beforeSend : handleFile,
        success : successResponse,
        error : errorResponse
    });

    function handleFile() {

    }
    function successResponse(success) {
        if(success.success){
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
        $('.file-card').find(".overlay").css({"display" : "flex"})
    }
    function hideLoading() {
        $('.file-card').find(".overlay").css({"display" : "none"})
    }
    function bindData(data) {
        let _h = data.info.pcb_size.cm.h * 10;
        let _w = data.info.pcb_size.cm.w * 10;

        ko.applyBindings({
            width : ko.observable(_w),
            height : ko.observable(_h)
        })
    }
}
