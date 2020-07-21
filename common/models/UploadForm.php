<?php


namespace common\models;

use yii\base\Model;
class UploadForm extends Model
{
    public $gerberFile;
    public function rules()
    {
        return [
            [['gerberFile'],'file','skipOnEmpty' => false,'extensions' => 'zip,rar']
        ];
    }

    function upload(){
        $filePath =  'gerber/extract/';

        if($this->validate()){
            $fileName = $filePath .$this->gerberFile->baseName.'.'.$this->gerberFile->extension;
            $this->gerberFile->saveAs($fileName);
            return $fileName;
        }
        return false;
    }
}
