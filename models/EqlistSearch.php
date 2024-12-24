<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class EqlistSearch extends Model
{
    public $startDate;
    public $endDate;
    public $minMagnitude;
    public $maxMagnitude;

    public function rules()
    {
        return [
            [['startDate', 'endDate', 'minMagnitude', 'maxMagnitude'], 'safe'],
            // 可以添加更多的验证规则，例如日期格式验证
        ];
    }

    public function search($params)
    {
        $query = Eqlist::find();

        // 创建一个 ActiveDataProvider 实例
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // 加载搜索参数
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        // 根据加载的参数调整查询
        $query->andFilterWhere(['>=', 'date', $this->startDate]);
        $query->andFilterWhere(['<=', 'date', $this->endDate]);
        $query->andFilterWhere(['>=', 'magnitude', $this->minMagnitude]);
        $query->andFilterWhere(['<=', 'magnitude', $this->maxMagnitude]);

        return $dataProvider;
    }    
}