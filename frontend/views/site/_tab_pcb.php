<div data-bind="foreach: propities" class="form-group">
    <div class="row mb-2">
        <!-- ko  if:type == 'checkbox' -->
        <label class="col-md-2" data-bind="text: name"></label>
        <div class="input-group col-md-10">
            <div class="button-group" data-bind="foreach: items, class: {
                'color-group' : color_group == 1
                }">
                <!-- ko if:input_customize == 0 -->
                <button  data-bind="
                    click: $root._clickButton,
                    text: name,
                    value: value,
                    class:$root.classButtonCheckbox"></button>
                <!-- /ko -->
                <!-- ko if:input_customize == 1 -->
                <input type="text" class="sm ml-2 w-25">
                <!-- /ko-->
            </div>
        </div>
        <!-- /ko -->
        <!-- ko  if:type == 'select' -->
        <label class="col-md-2" data-bind="text: name"></label>
        <div class="input-group position-relative col-md-10">
            <button class="btn select" data-bind="click: $root._showDropdown">
                <span class="mr-5">50</span>
            </button>
            <ul class="hidden list-check" data-bind="foreach: items">
                <li data-bind="text: name, click: $root._selectQty ">5</li>
            </ul>
        </div>
        <!-- /ko -->
        <!-- ko  if:type == 'input' -->
        <label class="col-md-2" data-bind="text: name"></label>
        <div class="input-group col-md-10">
            <div class="d-flex justify-content-center" data-bind="foreach: items">
                <input name="h_cm" type="text" data-bind="attr:{placeholder: value, value: $root._getSize($index()) }" class="sm mr-1">
            </div>
            <select name="size_type" class="sm">
                <option>mm</option>
                <option>inch</option>
            </select>
        </div>
        <!-- /ko -->
    </div>
</div>


<?php
$js = <<<JS

    $(".color-group").find("button").each(function() {
        let _color  = $(this).attr("value");
        $(this).find("span").css({"background" : _color, "margin-right" : "5px"});
    });
JS;
$this->registerJs($js);
