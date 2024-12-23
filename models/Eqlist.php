<?php

namespace app\models;

use yii\db\ActiveRecord;

class Eqlist extends \yii\db\ActiveRecord
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
            [['date', 'hour', 'minute', 'second', 'place_name', 'latitude_d', 'latitude_m', 'longitude_d', 'longitude_m', 'depth', 'magnitude', 'max_intensity'], 'safe'],
            // 如果有需要，可以为每个字段添加更多的验证规则，例如：
            // [['date', 'hour', 'minute', 'second'], 'required'],
            // [['depth', 'magnitude', 'max_intensity'], 'number'],
            // [['latitude_d', 'latitude_m', 'longitude_d', 'longitude_m'], 'integer'],
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
            'date' => '日期',
            'hour' => '小时',
            'minute' => '分钟',
            'second' => '秒',
            'place_name' => '地点名称',
            'latitude_d' => '纬度D',
            'latitude_m' => '纬度M',
            'longitude_d' => '经度D',
            'longitude_m' => '经度M',
            'depth' => '深度',
            'magnitude' => '震级',
            'max_intensity' => '最大震度',
        ];
    }
}