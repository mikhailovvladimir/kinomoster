<h1>Найдено: (<?php echo count($search_result) ?>)</h1>

<?php
foreach ($search_result as $key => $value) : ?>
    <div class="well">
        <a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a><br>
        <?php echo $value['descriptions']; ?>
    </div>
<?php endforeach; ?>
