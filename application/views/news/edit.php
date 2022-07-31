<form action="" method="post">

    <input class="form-control input-lg" type="input" name="slug" placeholder="slug" value="<?php echo $slug_news ?>"><br>
    <input class="form-control input-lg" type="input" name="title" placeholder="название поста" value="<?php echo $title_news?>"><br>
    <textarea class="form-control input-lg"  name="text" placeholder="текст новости"><?php echo $content_news ?></textarea><br>
    <input class="btn btn-default" type="submit" name="submit" value="Добавить новость">

</form>