<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'class' => 'form-control input-lg',
	'size'	=> 30,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
    'class' => 'form-control input-lg',
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

<fieldset><legend style="text-align: center"><h1 style="font-size: 3.5rem;">Авторизация</h1></legend>
<?php echo form_open($this->uri->uri_string())?>

<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
	<dt><?php echo form_label('Ваше имя', $username['id']);?></dt>
	<dd>
		<?php echo form_input($username)?>
    <div class="alert-danger"
         style="margin-top: 10px; padding: 0px; font-size: 1.5rem; text-align: center;">
        <?php echo form_error($username['name']); ?>
    </div>
	</dd>

  <dt><?php echo form_label('Пароль', $password['id']);?></dt>
	<dd>
		<?php echo form_password($password)?>
        <div class="alert-danger"
             style="margin-top: 10px; font-size: 1.5rem; text-align: center;">
            <?php echo form_error($password['name']); ?>
        </div>
	</dd>


	<dt></dt>
	<dd>
		<?php echo form_checkbox($remember);?> <?php echo form_label('Запомнить меня', $remember['id']);?>
		<?php echo anchor($this->dx_auth->forgot_password_uri, 'Забыли пароль?');?>
		<?php
			if ($this->dx_auth->allow_registration) {
				echo anchor($this->dx_auth->register_uri, 'Зарегистрироваться');
			};
		?>
	</dd>

	<dt></dt>
	<dd><?php echo form_submit('login','Вход', "class='btn btn-default'");?></dd>
</dl>

<?php echo form_close()?>
</fieldset>
