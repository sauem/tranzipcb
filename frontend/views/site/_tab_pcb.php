<div class="form-group row align-items-center">
    <label class="col-md-2">Layers ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">1</button>
            <button class="btn checkbox">2</button>
            <button class="btn checkbox">4</button>
            <button class="btn checkbox">6</button>
        </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label class="col-md-2">Dimensions ?</label>
    <div class="input-group col-md-10">
        <div class="d-flex justify-content-center">
            <input name="h_cm" type="text" class="sm"> *
            <input name="w_cm" type="text" class="sm mx-2">
            <select name="size_type" class="sm">
                <option>mm</option>
                <option>inch</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">PCB Qty ?</label>
    <div class="input-group position-relative col-md-10">
        <button class="btn select">
            <span class="mr-5">50</span>
        </button>
        <ul class="hidden list-check">
            <li>50</li>
            <li>100</li>
            <li>150</li>
            <li>200</li>
            <li>250</li>
            <li>50</li>
            <li>100</li>
            <li>150</li>
            <li>200</li>
            <li>250</li>
        </ul>
    </div>
</div>

<div class="form-group row align-items-center">
    <label class="col-md-2">Different Design ?</label>
    <div class="input-group d-flex col-md-10">
        <div class="button-group">
            <button class="btn checkbox">1</button>
            <button class="btn checkbox">2</button>
            <button class="btn checkbox">3</button>
            <button class="btn checkbox">4</button>
        </div>
        <input type="text" class="sm ml-2 w-25">
    </div>
</div>

<div class="form-group row align-items-center">
    <label class="col-md-2">Delivery Format ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">Single PCB</button>
            <button class="btn checkbox">Panel by customer</button>
            <button class="btn checkbox">Panel by JLCPCB</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">PCB Thickness ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">0.4</button>
            <button class="btn checkbox">0.6</button>
            <button class="btn checkbox">0.8</button>
            <button class="btn checkbox">1.0</button>
            <button class="btn checkbox">1.2</button>
            <button class="btn checkbox">1.4</button>
            <button class="btn checkbox">1.6</button>
            <button class="btn checkbox">2.0</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">PCB color ?</label>
    <div class="input-group col-md-10">
        <div class="button-group color-group">
            <button class="btn checkbox" value="green"><span></span> Green</button>
            <button class="btn checkbox" value="red"><span></span> Red</button>
            <button class="btn checkbox" value="yellow"><span></span> Yellow</button>
            <button class="btn checkbox" value="blude"><span></span> Blude</button>
            <button class="btn checkbox" value="white"><span></span> White</button>
            <button class="btn checkbox" value="black"><span></span> Black</button>
        </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label class="col-md-2">Surface Finish ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">HASL (with lead)</button>
            <button class="btn checkbox">LeadFree HASL-RoHS</button>
            <button class="btn checkbox">ENIG-RoHS</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">Copper Weight ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">1 oz</button>
            <button class="btn checkbox">2 oz</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">Gold Fingers ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">No</button>
            <button class="btn checkbox">Yes</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">Material Type?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">FR4-Standard Tg 130-140C</button>
        </div>
    </div>
</div>

<div class="form-group row align-items-center">
    <label class="col-md-2">Flying Probe Test?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">Fully Test</button>
            <button class="btn checkbox">Not Test</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">Castellated Holes ?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">No</button>
            <button class="btn checkbox">Yes</button>
        </div>
    </div>
</div>
<div class="form-group row align-items-center">
    <label class="col-md-2">Remove Order Number?</label>
    <div class="input-group col-md-10">
        <div class="button-group">
            <button class="btn checkbox">No</button>
            <button class="btn checkbox">Yes</button>
            <button class="btn checkbox">Specify a location</button>
        </div>
    </div>
</div>
<?php
$js = <<<JS
    $("button.checkbox").click(function() {
      let _gr = $(this).closest(".button-group");
      _gr.find("button.active").removeClass("active");
      $(this).addClass("active");
    });

    $("button.select").click(function() {
          let _ul = $(this).parent().find("ul.list-check");
          if(_ul.hasClass("hidden")){
              _ul.removeClass("hidden");
          }else {
              _ul.addClass("hidden");
          }
    });
    $("ul.list-check > li").click(function() {
        let _val = $(this).text();
        $("button.select").find("span").text(_val);
        $(this).parent().find("li.active").removeClass("active");
        $(this).addClass("active");
        $(this).parent().addClass("hidden");
    });
    
    $(".color-group").find("button").each(function() {
        let _color  = $(this).attr("value");
        $(this).find("span").css({"background" : _color, "margin-right" : "5px"});
    });
JS;
$this->registerJs($js);
