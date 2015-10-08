<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\Product;
use common\models\ProductPhoto;
use common\models\ProductStock;
use common\models\Subscribe;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
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
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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

    public function actionIndex() {
       return $this->render('index', []);
    }

    public function actionCoba(){
        $arr = \common\models\Article::find()->All();
        foreach ($arr as $val){
            echo 'UPDATE article SET created='.  strtotime($val->modified).' WHERE id='.$val->id.';<br/>';
        }
    }
//    public function actionLogin() {
//        $this->layout = 'mainSingle';
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            return $this->render('login', [
//                        'model' => $model,
//            ]);
//        }
//    }
//
//    public function actionLogout() {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

    public function actionContact() {
        $this->layout='mainSingle';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $from = $_POST['ContactForm']['email'];
            $to = 'info@indomobilecell.com';
            $subject = $_POST['ContactForm']['subject'];
            $content = $_POST['ContactForm']['body'];
            $nama = $_POST['ContactForm']['name'];

            $name = '=?UTF-8?B?' . base64_encode($nama) . '?=';
            $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
            $headers = "From: $name <{$from}>\r\n" .
                    "Reply-To: {$from}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

            mail($to, $subject, $content, $headers);
            Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            return $this->redirect(Yii::$app->urlManager->createUrl('kontak-kami'));




            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSubscribe() {
        if (isset($_POST['send'])) {
            $check = Subscribe::find()->where(['email' => $_POST['email']])->one();
            if (empty($check)) {
                $model = new Subscribe();
                $model->email = $_POST['email'];
                $model->save();
                //$this->redirect(Yii::$app->homeUrl);
                // $data = 'Sudah terdaftar';
                Yii::$app->getSession()->setFlash('info', 'Terimakasih telah mendaftar di akun News Letter kami<br> Selamat berbelanja di indomobilecell.com');
                return $this->render('subscribe', [
//                    'model' => $model,
                ]);
                
            } else {
                Yii::$app->getSession()->setFlash('warning', 'Anda telah terdaftar di akun News Letter kami<br> Terimakasih karena sudah berlangganan di indomobilecell.com');
                return $this->render('subscribe', [
//                    'model' => $model,
                ]);
                
            }
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }
    
    

}
