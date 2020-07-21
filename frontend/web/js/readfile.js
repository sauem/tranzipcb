
function onUpload(element) {
    let _this = $(element);
    let file  = _this[0].files[0];
    if(!config.type.includes(file.type)){
        console.log(file.type)
        alert("Định dạng file không đúng!");
        return;
    }
    if(file.size > config.maxSize){
        alert("Dung lượng file nhỏ hơn hoặc bàng 10M!");
        return;
    }
    _this.parent().find(".mark-input").text(file.name);
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
        }
        console.log(success)
    }
    function errorResponse(error) {
        console.log(error)
    }
    function complie(data) {
        var source = $("#gerber-view").html();
        var template = Handlebars.compile(source);
        $("#gerberResult").html(template(data));
    }
}
