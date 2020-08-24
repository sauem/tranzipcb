<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "propites".
 *
 * @property int $id
 * @property string $name
 * @property string $pKey
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
    const KEYS = [
        "layer" => "layer",
        "dimension" => "dimension",
        "qty" => "qty",
        "different_design" => "different_design",
        "delivery_format" => "delivery_format",
        "thinkness" => "thinkness",
        "color" => "color",
        "surface_finish" => "surface_finish",
        "copper_weight" => "copper_weight",
        "gold_fingers" => "gold_fingers",
        "material_type" => "material_type",
        "flying_probe_test" => "flying_probe_test",
        "castellated_holes" => "castellated_holes",
        "remove_order_number" => "remove_order_number",
        "finger_chamfered" => "finger_chamfered",
        "edges" => "edges",
        "total" => "total",
        "board" => "board",
        "acreage" => "acreage",
        "custom_design" => "Custom value Design"
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
            [['name', 'pKey'], 'required'],
            [['document_link'], 'string'],
            [['created_at', 'updated_at', 'sort', 'color_group'], 'integer'],
            [['name', 'description', 'type', 'pKey'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 25],
            [['alert_comfirm'], 'string'],
            [['pKey'], 'unique']
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
            'sort' => 'Vị trí',
            'pKey' => 'Định danh công thức',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getItems()
    {
        return $this->hasMany(PropitesItems::className(), ['parent' => 'id']);
    }

    public static function allList()
    {
        $list = Propites::find()->with('items')->all();
        return $list;
    }
}
