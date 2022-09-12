<?php

//$name = array(
//    'name'	=> 'name',
//    'id'	=> 'name',
//    'class' => 'form-control input-lg',
//    'size'	=> 100,
//    'value' => set_value('name')
//);
//
//$email = array(
//    'name'	=> 'email',
//    'id'	=> 'email',
//    'class' => 'form-control input-lg',
//    'size'	=> 100,
//    'value' => set_value('email')
//);
//
//$text = array(
//    'name'	=> 'text',
//    'id'	=> 'text',
//    'value'	=> set_value('text'),
//    'style' => 'margin:0;padding:0'
//);

?>

<div class="col-lg-push-9"> <!-- Меняем блоки местами col-lg-push-3 -->

    <form role="search" class="visible-xs">
        <div class="form-group">
            <div class="input-group">
                <input type="search" class="form-control input-lg" placeholder="Ваш запрос">
                <div class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>
    </form>

    <h1>Контакты</h1>
    <hr>

    <p>Отправьте ваш отзыв о портале КиноМонстр</p>


    <?php echo validation_errors(); ?>

    <?php echo form_open(); ?>
        <div class="form-group">
            <input type="text" name="name" placeholder="ваше имя" class="form-control input-lg">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="ваш e-mail" class="form-control input-lg">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="text"></textarea>
        </div>
        <button class="btn btn-lg btn-warning pull-right">отправить</button>
    <?php echo form_close(); ?>

    <div class="margin-8 clear"></div>


</div>