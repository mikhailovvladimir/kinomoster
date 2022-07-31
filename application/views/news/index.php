<h1>Все новости</h1>
<h2><a href="/news/create/"> Добавить новость</a><h4>
<?php
foreach ($news as $key => $value): ?>
    <b><a href="/news/view/<?= $value['slug'] ?>"><?php echo $value['title'] ?></a></b>
    <a href="/news/edit/<?= $value['slug'] ?>"> | edit</a>
    <a href="/news/delete/<?= $value['slug'] ?>"> | delete</a><br><br>
<?php endforeach; ?>