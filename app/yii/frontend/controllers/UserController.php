<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User2 model.
 */
class UserController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User2 models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => User2::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User2 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionForgotpassword() {
        $this->layout = 'mainSingle';
        if (isset($_POST['email'])) {
            $user = User::find()->where(['email' => $_POST['email']])->one();
            if (empty($user)) {
                Yii::$app->getSession()->setFlash('warning', 'Maaf anda tidak terdaftar dalam member kami.');
                return $this->redirect(Yii::$app->urlManager->createUrl('lupa-password'));
            } else {
                $email = $_POST['email'];
                $subject = 'Reset password';
                $content = 'Klik <a href="' . Yii::$app->urlManager->createUrl('www.indomobilecell.com/reset-password/' . md5($user->id)) . '">disini</a> unruk melakukan reset password';
                $to = $_POST['email'];
                $from = "info@indomobilecell.com";

                $name = '=?UTF-8?B?' . base64_encode($email) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
                $headers = "From: $email <{$from}>\r\n" .
                        "Reply-To: {$from}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/html; charset: utf8\r\n";

                mail($to, $subject, $content, $headers);

                Yii::$app->getSession()->setFlash('info', 'Segera cek email anda untuk melakukan reset password.');
                return $this->redirect(Yii::$app->urlManager->createUrl('lupa-password'));
            }
        }
        return $this->render('forgot_password', [
        ]);
    }

    public function actionResetpassword() {
        if (isset($_POST['password'])) {
//            $id = md5($_POST['id']);
//            echo $id;
//            $user = new User;
            $user = User::find()->where(['md5(id)' => $_POST['id']])->one();
            $user->password =sha1($_POST['password']);
            $user->save();
            Yii::$app->getSession()->setFlash('info', 'Password berhasil di perbaharui, segera login dengan password baru.');
            return $this->redirect(Yii::$app->urlManager->createUrl('login'));
        }
        return $this->render('form_password', [
        ]);
    }

    /**
     * Creates a new User2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = 'mainSingle';
        $model = new User();

        print_r($_POST);
        $model->name = $_POST['User']['name'];
        $model->username = $_POST['User']['username'];
        $model->email = $_POST['User']['email'];
        $model->password = sha1($_POST['User']['password']);
        $model->sex = $_POST['User']['sex'];
        $model->roles_id = 1;
        $model->created = date('Y-m-d H:i:s');
//        $model->save();
        if ($model->save()) {
            Yii::$app->getSession()->setFlash('info', '<strong>Terimakasih !! </strong>Member dengan nama <b><i>' . $model->name . '</i></b> berhasil mendaftar. segera login untuk melakukan belanja. Selamat Belanja :)');
            return $this->redirect(Yii::$app->urlManager->createUrl('login'));
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing User2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $this->layout = 'mainSingle';
        $model = $this->findModel($id);
        $password = $model->password;
        if ($model->load(Yii::$app->request->post())) {

            $model->name = $_POST['User']['name'];
            $model->username = $_POST['User']['username'];
            $model->email = $_POST['User']['email'];
            $model->sex = $_POST['User']['sex'];
            $model->phone = $_POST['User']['phone'];
            if (empty($_POST['User']['password'])) {
                $model->password = $password;
            } else {
                $model->password = sha1($_POST['User']['password']);
            }
            $model->save();
            Yii::$app->getSession()->setFlash('info', '<strong>Terimakasih !! </strong> Kontak berhasil di edit');
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('update', [
                        'model' => $model,
            ]);
        } else {
            return $this->redirect(Yii::$app->urlManager->createUrl('login'));
        }
//        }
    }

    /**
     * Deletes an existing User2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
