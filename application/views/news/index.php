<h1>Все новости</h1>
<a href="/news/create/">| добавить новость</a>
<?php
foreach ($news as $key => $value): ?>
    <h2><a href="/news/view/<?= $value['slug'] ?>"><?php echo $value['title'] ?></a></h2>
    <a href="/news/edit/<?= $value['slug'] ?>">edit</a>
    <a href="/news/delete/<?= $value['slug'] ?>">| delete</a>
<?php endforeach; ?>