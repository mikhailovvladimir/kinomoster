<form action="" method="post">

    <input type="input" name="slug" placeholder="slug" value="<?php echo $slug_news ?>"><br>
    <input type="input" name="title" placeholder="название поста" value="<?php echo $title_news?>"><br>
    <textarea name="text" placeholder="текст новости"><?php echo $content_news ?></textarea><br>
    <input type="submit" name="submit" value="Добавить новость">

</form>