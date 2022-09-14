<div class="col-lg-push-9"> <!-- Меняем блоки местами col-lg-push-3 -->

    <form role="search" class="visible-xs">
        <div class="form-group">
            <div class="input-group">
                <input type="search" class="form-control input-lg" placeholder="Ваш запрос">
                <div class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <h1>Обратная связь</h1>
    <hr>

    <p>Отправьте ваш отзыв о портале КиноМонстр</p>


    <?php echo form_open(); ?>
    <div class="alert-danger"><?php echo form_error('name'); ?></div>
    <div class="form-group">
        <input type="text" name="name" placeholder="ваше имя" value="<?php echo set_value('name') ?>" class="form-control input-lg">
    </div>
    <div class="alert-danger"><?php echo form_error('email'); ?></div>
    <div class="form-group">
        <input type="email" name="email" placeholder="ваш e-mail" value="<?php echo set_value('email') ?>" class="form-control input-lg">
    </div>
    <div class="alert-danger"><?php echo form_error('text'); ?></div>
    <div class="form-group">
        <textarea class="form-control" name="text"><?php echo set_value('text') ?></textarea>
    </div>
    <button class="btn btn-lg btn-warning pull-right">отправить</button>
    <?php echo form_close(); ?>

    <div class="margin-8 clear"></div>

</div>