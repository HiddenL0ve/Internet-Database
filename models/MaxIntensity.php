namespace app\models;

use yii\db\ActiveRecord;

class MaxIntensity extends ActiveRecord
{
    public static function tableName()
    {
        return 'max_intensity';
    }
}