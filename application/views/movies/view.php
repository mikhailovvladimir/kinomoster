<h1><?php echo $title; ?> </h1>
<hr>
<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="<?php echo $player_code ?>" frameborder="0" allowfullscreen></iframe>
</div>
<div class="well info-block text-center">
    Год: <span class="badge"><?php echo $year; ?></span>
    Рейтинг: <span class="badge"><?php echo $rating; ?></span>
    Режиссер: <span class="badge">Кристофер Нолан</span>
</div>

<div class="margin-8"></div>

<h2><?php echo $title; ?></h2>
<hr>

<div class="well">
    <?php echo $description_movie; ?>
</div>

<div class="margin-8"></div>

<h2>Отзывы об <?php echo $title ?></h2>
<hr>

<?php foreach ($comments as $comment) : ?>
<div class="panel panel-info">
    <div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <span><?php  echo getUserNameById($comment['user_id'])->username; ?></span> </div>
    <div class="panel-body">
        <?php echo $comment['comment_text']; ?>
    </div>
</div>
<?php endforeach; ?>

<div style="color: red;"><?php echo validation_errors(); ?></div>

<?php if (!empty($user_id)) : ?>
    <?php echo form_open(); ?>
        <div class="form-group">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment-text" placeholder="Ваш комментарий"></textarea>
        </div>
        <input type="submit" class="btn btn-lg btn-warning pull-right">
    </form>
<?php else: ?>
    <div class="alert-danger" style="text-align: center; font-size: 1.4rem;">Комментарии могут отправлять только зарегистрированные пользователи!</div>
<?php endif;?>
