<div data-bind="foreach: propities" class="form-group">
    <div class="row mb-2">
        <!-- ko  if:type == 'checkbox' -->
        <label class="col-md-2" data-bind="text: name"></label>
        <div class="input-group col-md-10">
            <div data-bind="foreach: items, class: $root.checkGroup(pKey)">
                <!-- ko if:input_customize == 0 -->
                <button data-bind="
                    click: $root._clickButton,
                    html: $root.checkBackground($parent.pKey , name, value),
                    value: value,
                    attr: {pkey: $parent.pKey},
                    class:$root._setActive( $index(),$parentContext.$index(),$parent.pKey),
                    $root.classButtonCheckbox"></button>
                <!-- /ko -->
                <!-- ko if:input_customize == 1 -->
                <input data-bind="
                attr:{pkey: $parent.pKey},
                event: {change: $root.changeInput}" type="text" class="sm ml-2 w-25">
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
                <input
                        name="h_cm" type="text"
                        data-bind="attr:{
                        placeholder: value,
                        pkey: $parent.pKey,
                        value: $root._getSize($index()) },
                        event: {change: $root.changeInput}"
                        class="sm mr-1">
            </div>
            <select name="size_type" class="sm">
                <option>mm</option>
            </select>
        </div>
        <!-- /ko -->
    </div>
</div>
