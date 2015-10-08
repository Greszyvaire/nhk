<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User2 */

$this->title = 'Info Kontak ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user2-update">
    <?php
//    $this->render('_form', [
//        'model' => $model,
//    ])
//    
    ?>
    <?php $form = ActiveForm::begin(); ?>
    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">
                
                <?php
                foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo'<br><div class="alert alert-' . $key . ' alert-dismissible" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close" > <span aria-hidden="true">&times;</span></button>
                           ' . $message . '
                           </div>
                           ';
                }
                ?>
                <div class="billing-address">
                    <h2 class="border h1">Info Kontak</h2>
                    <div class="other">

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Nama</label>
                                <input class="le-input" type="text" name="User[name]" value="<?= $model->name ?>" required >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>Username</label>
                                <input class="le-input" type="text" name="User[username]" value="<?= $model->username ?>" required >
                            </div>
                        </div><!-- /.field-row -->
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Jenis Kelamin</label>
                                <?php // echo $form->field($model, 'sex')->dropDownList(['m' => 'Item A', 'f' => 'Item B'],['options'=> ['class'=>'list-group-item'],]);  ?>
                                <select class="le-input" name="User[sex]"id="province">
                                    <option <?= ($model->sex == "m") ? 'selected' : '' ?> value="m">Laki-laki</option>
                                    <option <?= ($model->sex == "f") ? 'selected' : '' ?> value="f">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>Password</label>
                                <input class="le-input" type="password" name="User[password]" value="" >
                                <span class="help-block" style="font-size: 12px"><i>Kosongi jika tidak di ubah.</i></span>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>Email</label>
                                <input class="le-input" type="text" name="User[email]" value="<?= $model->email ?>" required >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>No Telp</label>
                            <input class="le-input" type="text" name="User[phone]" value="<?= $model->phone ?>" required >
                            </div>
                        </div><!-- /.field-row -->
                        
                    </div>
                    <button class="le-button big" type="submit" name="checkout">Save</button>
                   
                </div>
            </div>
        </div>
    </section>
     <br>
    <?php ActiveForm::end(); ?>
</div>
