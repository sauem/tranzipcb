<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "propites_items".
 *
 * @property int $id
 * @property int|null $parent
 * @property string $name
 * @property float|null $percent
 * @property float|null $value
 * @property int $created_at
 * @property int $updated_at
 * @property int $sort
 */
class PropitesItems extends BaseModel
{
    /**
     * {@inheritdoc}
     */

    const _IS_INPUT = 1;
    const _ISNOT_INPUT = 0;
    const INPUT_CUSTOM = [
        self::_ISNOT_INPUT => 'No',
        self::_IS_INPUT => 'Yes',
    ];

    public static function tableName()
    {
        return 'propites_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'sort'], 'integer'],
            [['name'], 'required'],
            [['percent'], 'number'],
            [['name', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'name' => 'Name',
            'percent' => 'Percent',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
