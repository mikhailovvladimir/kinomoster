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

    <h1>Рейтинг фильмов</h1>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Фильм</th>
            <th class="text-center">Год</th>
            <th class="text-center">Рейтинг</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($movie_data as $movie): ?>
        <tr>
            <td class="col-lg-1 col-md-1 col-xs-2">
                <img class="img-responsive img-thumbnail" src="<?php echo $movie['poster'] ?>" alt="<?php echo $movie['name'] ?>">
            </td>
            <td class="vert-align"><a href="/movies/view/<?php echo $movie['slug'] ?>"><?php echo $movie['name'] ?></a></td>
            <td class="text-center vert-align"><?php echo $movie['year'] ?></td>
            <td class="text-center vert-align"><span class="badge"><?php echo $movie['rating'] ?></span></td>
        </tr>
        <?php endforeach; ?>
        </tbody>

    </table>


    <?php echo $pagination; ?>

    <div class="margin-8 clear"></div>

</div>