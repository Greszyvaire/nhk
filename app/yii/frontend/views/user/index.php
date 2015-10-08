<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            'password',
            'code',
            // 'name',
            // 'city_id',
            // 'address',
            // 'phone',
            // 'description',
            // 'created',
            // 'created_user_id',
            // 'modified',
            // 'enabled',
            // 'avatar_img',
            // 'roles_id',
            // 'saldo',
            // 'sex',
            // 'nationality',
            // 'birth',
            // 'referal_user_id',
            // 'others:ntext',
            // 'modal',
            // 'auth_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
