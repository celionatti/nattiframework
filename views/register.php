<?php

/**
 * User: Celio natti
 * Date: 17/12/2022
 * Time: 09:10 PM
 */

use app\core\form\Form;

?>

<h1>Create an Account</h1>

<?php $form = Form::begin('', "post"); ?>
<div class="row">
    <div class="col">
        <?= $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
        <?= $form->field($model, 'lastname') ?>
    </div>
</div>
    <?= $form->field($model, 'email')->emailField() ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <?= $form->field($model, 'confirmPassword')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>