<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use Yii;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    #register-form{
        line-height: 30px;
    }
</style>

<main id="authentication" class="inner-bottom-md">
    <div class="container">




        <div class="row">
            
            <?php
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo'<br><div class="alert alert-' . $key . ' alert-dismissible" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close" > <span aria-hidden="true">&times;</span></button>
                           ' . $message . '
                           </div>
                           ';
            }
            ?>
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Selamat Datang</h2>
                    <p>Silahkan login menggunakan akun anda.</p>

                    <!--                    <div class="social-auth-buttons">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                                                </div>
                                            </div>
                                        </div>-->

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username') ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="field-row clearfix">

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <span class="pull-right">
                            <a href="<?php echo Yii::$app->urlManager->createUrl('lupa-password')?>" class="content-color bold">Forgotten Password ?</a>
                        </span>
                    </div>

                    <div class="buttons-holder">
                        <button type="submit" class="le-button huge">Login</button>
                    </div><!-- /.buttons-holder -->
                    <?php ActiveForm::end(); ?>

                </section><!-- /.sign-in -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Buat Akun Baru</h2>

                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'register-form',
                                'action' => Yii::$app->urlManager->createUrl('user/create')]);
                    ?> 

                    <div class="field-row">
                        <label>Nama *</label>
                        <input type="text" class="le-input" name="User[name]" required>
                    </div><!-- /.field-row -->
                    <div class="field-row">
                        <label>Username *</label>
                        <input type="text" class="le-input" name="User[username]" required>
                    </div><!-- /.field-row -->
                    <div class="field-row">
                        <label>Email *</label>
                        <input type="text" class="le-input email" name="User[email]" required>
                    </div><!-- /.field-row -->
                    <div class="field-row">
                        <label>Password *</label>
                        <input type="password" class="le-input" name="User[password]"  required>
                    </div><!-- /.field-row -->

                    <div class="field-row">
                        <label>Jenis Kelamin</label>

                        <select name="User[sex]" class="le-input">
                            <option vlaue="m">Laki-laki</option>
                            <option value="f">Perempuan</option>
                        </select>
                    </div><!-- /.field-row -->
                    <br>
                    <div class="buttons-holder">
                        <button type="submit" class="le-button huge">Daftar</button>
                    </div><!-- /.buttons-holder -->
                    
                    <?php ActiveForm::end(); ?>

                    <!--                    <h2 class="semi-bold">Silahkan mendaftar, dan anda akan dapat :</h2>
                    
                                        <ul class="list-unstyled list-benefits">
                                            <li><i class="fa fa-check primary-color"></i> Melakukan pembelian di Toko Online Kami</li>
                                            <li><i class="fa fa-check primary-color"></i> Melakukan pengecekan status pembelian</li>
                                            <li><i class="fa fa-check primary-color"></i> Semua history pembelian tersimpan di Akun Anda</li>
                                            <li><i class="fa fa-check primary-color"></i> Dapatkan diskon & promo menarik dari kami</li>
                                        </ul>-->

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>