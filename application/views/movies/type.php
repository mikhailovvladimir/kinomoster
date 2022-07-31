<h1><?php echo $title; ?></h1>
          <hr>

<!--           <div class="media well">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object img-thumbnail" src="assets/img/cloud.png" alt="...">
    </a>
  </div>
  <div class="media-body">
        <p>
        Когда засуха приводит человечество к продовольственному кризису, коллектив исследователей и учёных отправляется сквозь червоточину (которая предположительно соединяет области пространства-времени через большое расстояние) в путешествие, чтобы превзойти прежние ограничения для космических путешествий человека и переселить человечество на другую планету.
      </p>
  </div>

  <a href="" class="btn btn-lg btn-warning pull-right">подробнее</a>
</div> -->


<?php foreach ($movie_data as $value): ?>
          <div class="row">
            <div class="well clearfix">
              <div class="col-lg-3 col-md-2 text-center">
                <img class="img-thumbnail" src="<?php echo $value['poster'];?>" alt="<?php echo $value['name'];?>">
                <p><?php echo $value['name'];?></p>
              </div>

              <div class="col-lg-9 col-md-10">
                <p>
                    <?php echo $value['descriptions']; ?>
                </p>
              </div>
              
              <div class="col-lg-12 col-md-12">
                <a href="/movies/view/<?php echo $value['slug']; ?>" class="btn btn-lg btn-warning pull-right">подробнее</a>
              </div>

            </div>

          </div>
<?php endforeach; ?>

<?php echo $pagination; ?>