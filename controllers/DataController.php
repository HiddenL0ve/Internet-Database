namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MaxIntensity;

class DataController extends Controller
{
    public function actionIndex()
    {
        $data = MaxIntensity::find()->all();
        return $this->asJson($data);
    }
}