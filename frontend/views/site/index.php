<div class="area row mx-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'options' => [
                                'enctype' => 'multipart/form-data\''
                            ]
                        ]) ?>
                        <div class="file-area mb-5">
                            <?= $form->field($model,'gerberFile')->fileInput(['onchange'=> 'onUpload(this)'])->label(false)?>
                            <p class="mark-input">Chọn file thiết kế</p>
                            <p class="mt-2 text-danger">Định dạng file zip hoặc rar,Max size 10M</p>
                        </div>
                        <?php \yii\widgets\ActiveForm::end()?>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="gerberResult">

                        </div>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="p-2">
                            <?= $this->render("_tab_pcb")?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card loadingCharge">
            <div class="card-header">
                <h2 class="card-title">Thông tin đặt hàng</h2>
            </div>
            <div class="card-body">
                <div id="overlay">
                    <div class="w-100 d-flex justify-content-center align-items-center">
                        <div class="spinner"></div>
                    </div>
                </div>
                <table class="table table-condensed table-striped">
                    <tbody>
                        <tr>
                            <td>Giá bảng mạch:</td>
                            <td>20.000đ</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Tổng giá</td>
                            <td>20.000đ</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Ghi chú:</strong><br>
                                <p class="text-danger">* Bảng giá chưa bao gồm phí VAT</p>
                                <p class="text-danger">* Giá cuối cùng có thể thay đổi ngoại lệ</p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script id="gerber-view" type="text/x-handlebars-template">
    <div class="col-12">
        <h4>Detected {{this.info.count}} layer board of {{toMilimet this.info.pcb_size.cm.h}}x{{toMilimet this.info.pcb_size.cm.w}}mm({{this.info.pcb_size.raw.h}}x{{this.info.pcb_size.raw.w}} inches) .</h4>
    </div>
    <div class="col-md-4 offset-md-1 mb-5 text-center">
        <img src="{{src this.images.top}}" class="img-fluid">
    </div>
    <div class="col-md-4 offset-md-1 mb-5 text-center">
        <img src="{{src this.images.bottom}}" class="img-fluid">
    </div>
</script>
