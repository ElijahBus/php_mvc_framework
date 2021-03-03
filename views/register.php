<div class="">
    <h3>Create an accont</h3>
    <hr>

    <?php $form =  app\core\form\Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'firstname'); ?>
        <?php echo $form->field($model, 'lastname'); ?>
        <?php echo $form->field($model, 'email')->email(); ?>
        <?php echo $form->field($model, 'password')->password(); ?>
        <?php echo $form->field($model, 'confirmPassword')->password(); ?>

        <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo app\core\form\Form::end() ?>
</div>