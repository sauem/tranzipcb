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
 * @property int $sort
 */
class Propites extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    const _ACTIVE = 'active';
    const _DEACTIVE = 'deactive';
    const STATUS = [
        self::_ACTIVE => 'Kích hoạt',
        self::_DEACTIVE => 'không kích hoạt'
    ];
    const _CHECKBOX = 'checkbox';
    const _SELECT = 'select';
    const _INPUT = 'input';
    const TYPES = [
        self::_CHECKBOX => 'Nút hiển thị chọn 1',
        self::_SELECT => 'Dropdown hiển thị',
        self::_INPUT => 'Ô nhập liệu'
    ];

    const _IS_COLOR = 1;
    const _ISNOT_COLOR = 0;
    const COLOR = [
        self::_ISNOT_COLOR => 'No',
        self::_IS_COLOR => 'Yes',
    ];

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
            [['created_at', 'updated_at', 'sort', 'color_group'], 'integer'],
            [['name', 'description', 'type'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 25],
            [['alert_comfirm'], 'string'],
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

    public function getItems()
    {
        return $this->hasMany(PropitesItems::className(), ['parent' => 'id']);
    }
}
