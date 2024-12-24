<?php

namespace app\models;

use yii\db\ActiveRecord;

class Eqlist extends ActiveRecord
{   
    /**
     * 返回与此 AR 类关联的数据库表名。
     *
     * @return string 表名
     */
    public static function tableName()
    {
        return 'eqlist';
    }

    /**
     * 定义模型的验证规则。
     *
     * @return array 验证规则
     */
    public function rules()
    {
        return [
            [[
                'id',
                'Date',
                'Hour',
                'Minute',
                'Second',
                'PlaceName',
                'LatitudeD',
                'LatitudeM',
                'LongitudeD',
                'LongitudeM',
                'Depth',
                'Magnitude',
                'MaxIntensity',
            ], 'safe'],
        ];
    }

     /**
     * 定义各属性。
     *
     * @return array 属性
     */
    public function attributes()
    {
        return [
            'id',
            'Date',
            'Hour',
            'Minute',
            'Second',
            'PlaceName',
            'LatitudeD',
            'LatitudeM',
            'LongitudeD',
            'LongitudeM',
            'Depth',
            'Magnitude',
            'MaxIntensity',
        ];
    }

    /**
     * 定义属性标签。
     *
     * @return array 属性标签
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Date' => '日期',
            'Hour' => '小时',
            'Minute' => '分钟',
            'Second' => '秒',
            'PlaceName' => '地点名称',
            'LatitudeD' => '纬度D',
            'LatitudeM' => '纬度M',
            'LongitudeD' => '经度D',
            'LongitudeM' => '经度M',
            'Depth' => '深度',
            'Magnitude' => '震级',
            'MaxIntensity' => '最大震度',
        ];
    }
}