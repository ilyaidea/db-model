<form method="post">

    <?= $this->partial('form/formTitle') ?>

    
    
    
    

    <?php foreach ($form->getElements() as $field) { ?>
        <?= $this->partial('form/validate', ['field' => $field]) ?>

        <?php foreach ($field->getMessages() as $message) { ?>
            <div style="color: red">
                <?= $message->getField() ?>
            </div>
            <div style="color: red">
                <?= $message->getMessage() ?>
            </div>
        <?php } ?>

        <br>
    <?php } ?>
</form>