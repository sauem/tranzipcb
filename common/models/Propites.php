<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "propites".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $status
 * @property string|null $document_link
 * @property int $created_at
 * @property int $updated_at
 */
class Propites extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['document_link'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'document_link' => 'Document Link',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getItems(){
        return $this->hasMany(PropitesItems::className(),['parent' => 'id' ]);
    }
}
