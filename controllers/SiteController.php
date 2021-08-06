<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionPlanets() {
        $plantarySymbols = array(
            "sun" => "☉",
            "moon" => "☾",
            "mars" => "♂︎",
            "mercury" => "☿",
            "jupiter" => "♃",
            "venus" => "♀",
            "saturn" => "♄",
            "rahu" => "☊",
            "ketu" => "☋",
            "uranus" => "♅");
        
        $signCoordinates = array(
                /* Aires */
               array(
                    array( 'x' => 242, 'y' => 71 ),
                    array( 'x' => 242, 'y' => 88 ),
                    array( 'x' => 242, 'y' => 105 ),
                    array( 'x' => 242, 'y' => 122 ),
                    array( 'x' => 242, 'y' => 139 ),
                    array( 'x' => 242, 'y' => 156 ),
                    array( 'x' => 242, 'y' => 173 ),
                    array( 'x' => 242, 'y' => 190 ),
                    array( 'x' => 242, 'y' => 207 )
                ),
                /* Sign of Taurus:*/
                array(
                    array( 'x' => 132, 'y' => 110 ),
                    array( 'x' => 149, 'y' => 110 ),
                    array( 'x' => 166, 'y' => 110 ),
                    array( 'x' => 183, 'y' => 110 ),
                    array( 'x' => 149, 'y' => 137 ),
                    array( 'x' => 166, 'y' => 137 ),
                    array( 'x' => 183, 'y' => 137 ),
                    array( 'x' => 166, 'y' => 164 ),
                    array( 'x' => 183, 'y' => 164 )
                ),
                /* Sign of Gemini:*/
                array(
                    array( 'x' => 65, 'y' => 208 ),
                    array( 'x' => 82, 'y' => 208 ),
                    array( 'x' => 99, 'y' => 208 ),
                    array( 'x' => 116, 'y' => 208 ),
                    array( 'x' => 133, 'y' => 208 ),
                    array( 'x' => 150, 'y' => 208 ),
                    array( 'x' => 167, 'y' => 208 ),
                    array( 'x' => 82, 'y' => 181 ),
                    array( 'x' => 99, 'y' => 181 )
                ),
                /* Sign of Cancer:*/
                array(
                    array( 'x' => 59, 'y' => 258 ),
                    array( 'x' => 76, 'y' => 258 ),
                    array( 'x' => 93, 'y' => 258 ),
                    array( 'x' => 110, 'y' => 258 ),
                    array( 'x' => 127, 'y' => 258 ),
                    array( 'x' => 144, 'y' => 258 ),
                    array( 'x' => 161, 'y' => 258 ),
                    array( 'x' => 178, 'y' => 258 ),
                    array( 'x' => 195, 'y' => 258 )
                ),
                /* Sign of Leo:*/
                array(
                    array( 'x' => 65, 'y' => 308 ),
                    array( 'x' => 82, 'y' => 308 ),
                    array( 'x' => 99, 'y' => 308 ),
                    array( 'x' => 116, 'y' => 308 ),
                    array( 'x' => 133, 'y' => 308 ),
                    array( 'x' => 150, 'y' => 308 ),
                    array( 'x' => 167, 'y' => 308 ),
                    array( 'x' => 82, 'y' => 335 ),
                    array( 'x' => 99, 'y' => 335 )
                ),
                /* Sign of Virgo:*/
                array( 
                    array( 'x' => 132, 'y' => 388 ),
                    array( 'x' => 149, 'y' => 388 ),
                    array( 'x' => 166, 'y' => 388 ),
                    array( 'x' => 183, 'y' => 388 ),
                    array( 'x' => 149, 'y' => 361 ),
                    array( 'x' => 166, 'y' => 361 ),
                    array( 'x' => 183, 'y' => 361 ),
                    array( 'x' => 176, 'y' => 334 ),
                    array( 'x' => 193, 'y' => 334 )
                ),
                /* Sign of Libra */
                array(
                    array( 'x' => 242, 'y' => 439 ),
                    array( 'x' => 242, 'y' => 422 ),
                    array( 'x' => 242, 'y' => 405 ),
                    array( 'x' => 242, 'y' => 388 ),
                    array( 'x' => 242, 'y' => 371 ),
                    array( 'x' => 242, 'y' => 354 ),
                    array( 'x' => 242, 'y' => 337 ),
                    array( 'x' => 242, 'y' => 320 ),
                    array( 'x' => 242, 'y' => 303 )
                ),
                /* Sign of Scorpio:*/
                array(
                    array( 'x' => 291, 'y' => 388 ),
                    array( 'x' => 308, 'y' => 388 ),
                    array( 'x' => 325, 'y' => 388 ),
                    array( 'x' => 342, 'y' => 388 ),
                    array( 'x' => 291, 'y' => 361 ),
                    array( 'x' => 308, 'y' => 361 ),
                    array( 'x' => 325, 'y' => 361 ),
                    array( 'x' => 291, 'y' => 334 ),
                    array( 'x' => 306, 'y' => 334 )
                ),
                /* Sign of Sagitarius:*/
                array(
                    array( 'x' => 415, 'y' => 308 ),
                    array( 'x' => 398, 'y' => 308 ),
                    array( 'x' => 381, 'y' => 308 ),
                    array( 'x' => 364, 'y' => 308 ),
                    array( 'x' => 247, 'y' => 308 ),
                    array( 'x' => 330, 'y' => 308 ),
                    array( 'x' => 312, 'y' => 309 ),
                    array( 'x' => 398, 'y' => 335 ),
                    array( 'x' => 381, 'y' => 335 )
                ),
                /* Sign of Capricorn:*/
                array(
                    array( 'x' => 426, 'y' => 258 ),
                    array( 'x' => 409, 'y' => 258 ),
                    array( 'x' => 392, 'y' => 258 ),
                    array( 'x' => 375, 'y' => 258 ),
                    array( 'x' => 358, 'y' => 258 ),
                    array( 'x' => 341, 'y' => 258 ),
                    array( 'x' => 324, 'y' => 258 ),
                    array( 'x' => 307, 'y' => 258 ),
                    array( 'x' => 290, 'y' => 258 )
                ),
                /* Sign of Aquarius:*/
                array(
                    array( 'x' => 415, 'y' => 208 ),
                    array( 'x' => 398, 'y' => 208 ),
                    array( 'x' => 381, 'y' => 208 ),
                    array( 'x' => 364, 'y' => 208 ),
                    array( 'x' => 347, 'y' => 208 ),
                    array( 'x' => 330, 'y' => 208 ),
                    array( 'x' => 312, 'y' => 208 ),
                    array( 'x' => 398, 'y' => 181 ),
                    array( 'x' => 381, 'y' => 181 )
                ),
                /* Sign of Pisces:*/
                array(
                    array( 'x' => 291, 'y' => 110 ),
                    array( 'x' => 308, 'y' => 110 ),
                    array( 'x' => 325, 'y' => 110 ),
                    array( 'x' => 342, 'y' => 110 ),
                    array( 'x' => 291, 'y' => 137 ),
                    array( 'x' => 308, 'y' => 137 ),
                    array( 'x' => 325, 'y' => 137 ),
                    array( 'x' => 291, 'y' => 164 ),
                    array( 'x' => 306, 'y' => 164 )
                )
            );
        

        $planetsjson = file_get_contents("http://firstnodeaws-env.eba-ywqhm7pn.us-east-2.elasticbeanstalk.com/api/astro/siderealPlanets");
        if ($planetsjson == "API error (please wait a while and try again): Error: Service Unavailable") {
            return $this->render('planets', ['responsestring' => htmlspecialchars("API is currently unavailable, please wait a short while and try again")]);
        } else 
        {
            $a = json_decode($planetsjson, true);
            $responsestring = "";
            $svg_end_string = ""; // append to complete SVG file that will be rendered to view
            $signTotals = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0); // total number of planets in each sign
            $zodiac = array("Aries", "Taurus", "Gemini", "Cancer", "Leo", "Virgo", "Libra", "Scorpio", "Sagittarius", "Capricorn", "Aquarius", "Pisces");
            foreach ($a as $planet => $position) {
                $responsestring = $responsestring . ucfirst($planet) . " in " . $zodiac[$position];
                if ($planet !== "uranus") {
                    $responsestring = $responsestring . ", "; // don't put a comma at the very end (after Uranus)
                }
                $svg_end_string .= "<text x=" . $signCoordinates[$position][$signTotals[$position]]['x'];
                $svg_end_string .= " y=" . $signCoordinates[$position][$signTotals[$position]]['y'];
                $svg_end_string .= " font-size=22>" . $plantarySymbols[$planet] . "</text>";
                $signTotals[$position] += 1;
            }
            $testfile = file_get_contents("/Users/greg/composer/basic/controllers/AstroYantra2.svg", 'r');
            $testfile .= $svg_end_string . "</svg>";
            return $this->render('planets', ['responsestring' => htmlspecialchars($responsestring), 'testfile' => $testfile]);
        }
    }
}
