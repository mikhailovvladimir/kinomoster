<?php

$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>
<!-- MENU start -->
        <div class="col-lg-3 col-lg-pull-9"> <!-- Меняем блоки местами col-lg-pull-9 -->
          
          <div class="panel panel-info hidden-xs">
            <div class="panel-heading"><div class="sidebar-header">Поиск</div></div>
            <div class="panel-body">
              <form role="search" action="/search/" method="get">
                <div class="form-group">
                  <div class="input-group">
                    <input type="search" name="q_search" class="form-control input-lg" placeholder="Ваш запрос">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>
    
          <div class="panel panel-info">
            <div class="panel-body">

                <?php if (!$this->dx_auth->is_logged_in()): ?>

                    <a href="/auth/login" class="btn btn-warning" style="margin: 10px">
                        Авторизоваться
                    </a>

                    <a href="/auth/register" class="btn btn-warning" style="margin: 10px">
                        Зарегистрироваться
                    </a>

                <?php else: ?>
                    Здравствуйте, <?php echo $this->dx_auth->get_username() ?>
                    <a href="/auth/logout" class="btn btn-warning pull-right">Выход</a>
                <?php endif; ?>
            </div>
          </div>  


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Новости</div></div>
            <div class="panel-body">
              
              <?php foreach($news as $key => $value): ?>
                <p><a href="/news/view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></p>
              <?php endforeach; ?>
              
            </div>
          </div>


          <div class="panel panel-info">
            <div class="panel-heading"><div class="sidebar-header">Рейтинг фильмов</div></div>
            <div class="panel-body">
                
                <ul class="list-group">
                  <?php foreach ($films as $key => $value): ?>
                  <li class="list-group-item list-group-warning">
                    <span class="badge"><?php echo $value['rating']; ?></span>
                    <a href="/movies/view/<?php echo $value['slug']; ?>"><?php echo $value['name']; ?></a>
                  </li>
                  <?php endforeach; ?>

                </ul>

            </div>
          </div>  
          


        </div>      

      <!-- MENU end -->