<?php

/**
 * User: Celio natti
 * Date: 17/12/2022
 * Time: 09:10 PM
 */

use app\core\form\Form;

/** @var $model \app\models\User */

?>

<h1>Login</h1>

<?php $form = Form::begin('', "post"); ?>
    <?= $form->field($model, 'email')->emailField() ?>
    <?= $form->field($model, 'password')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Login</button>
<?php Form::end(); ?>