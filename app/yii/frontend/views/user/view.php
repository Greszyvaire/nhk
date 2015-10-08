<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User2 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user2-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'password',
            'code',
            'name',
            'city_id',
            'address',
            'phone',
            'description',
            'created',
            'created_user_id',
            'modified',
            'enabled',
            'avatar_img',
            'roles_id',
            'saldo',
            'sex',
            'nationality',
            'birth',
            'referal_user_id',
            'others:ntext',
            'modal',
            'auth_key',
        ],
    ]) ?>

</div>
