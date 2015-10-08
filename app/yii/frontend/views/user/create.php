<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User2 */

$this->title = 'Create User2';
$this->params['breadcrumbs'][] = ['label' => 'User2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
