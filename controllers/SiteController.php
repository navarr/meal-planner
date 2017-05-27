<?php

namespace app\controllers;

use app\models\Day;
use app\models\DayItem;
use app\models\Meal;
use app\models\MealItem;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        $dates = [];

        // Select the current date
        $tz = new \DateTimeZone('America/New_York');
        $day = $start = new \DateTimeImmutable('00:00:01', $tz); // today

        // Create an array for the next three weeks
        $interval = new \DateInterval('P1D');
        $i = 0;
        do {
            $dates[$day->format('Y-m-d')] = [
                'day' => $day,
                'meals' => [],
            ];
            ++$i;
            $day = $day->add($interval);
        } while($i < (7*3));

        $end = $day;

        // Get all meals for that range
        $items = Meal::find()->where(['between', 'date', $start->format('Y-m-d'), $end->format('Y-m-d')])->with('items')->all();
        foreach ($items as $item) { /** @var Meal $item */
            $dates[$item->date]['meals'][$item->name] = $item->getItems()->all();
        }

        return $this->render('index', ['dates' => $dates]);
    }

    /**
     * Login action.
     *
     * @return string
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
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
}
