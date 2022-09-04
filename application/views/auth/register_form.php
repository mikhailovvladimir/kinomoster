<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
	'class' => 'form-control input-lg',
	'value' =>  set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
    'class' => 'form-control input-lg',
    'value' => set_value('password')
);

$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'size'	=> 30,
    'class' => 'form-control input-lg',
    'value' => set_value('confirm_password')
);

$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control input-lg',
    'value'	=> set_value('email')
);
?>

<html>
<body>

<fieldset><legend><h1 style="font-size: 3.5rem; text-align: center">Регистрация</h1></legend>
<?php echo form_open($this->uri->uri_string())?>

<dl>
	<dt><?php echo form_label('Логин', $username['id']);?></dt>
	<dd>
		<?php echo form_input($username)?>
        <div class="alert-danger" style="margin-top: 10px; font-size: 1.5rem; text-align: center";>
            <?php echo form_error($username['name']); ?>
        </div>
	</dd>

	<dt><?php echo form_label('Пароль', $password['id']);?></dt>
	<dd>
		<?php echo form_password($password)?>
        <div class="alert-danger" style="margin-top: 10px; font-size: 1.5rem; text-align: center">
            <?php echo form_error($password['name']); ?>
        </div>
	</dd>

	<dt><?php echo form_label('Повторите пароль', $confirm_password['id']);?></dt>
	<dd>
		<?php echo form_password($confirm_password);?>
        <div class="alert-danger" style="margin-top: 10px; font-size: 1.5rem; text-align: center">
            <?php echo form_error($confirm_password['name']); ?>
        </div>
	</dd>

	<dt><?php echo form_label('Ваш email', $email['id']);?></dt>
	<dd>
		<?php echo form_input($email);?>
        <div class="alert-danger" style="margin-top: 10px; font-size: 1.5rem; text-align: center">
            <?php echo form_error($email['name']); ?>
        </div>
	</dd>
		
<?php if ($this->dx_auth->captcha_registration): ?>

	<dt></dt>
	<dd>
		<?php 
			// Show recaptcha imgage
			echo $this->dx_auth->get_recaptcha_image(); 
			// Show reload captcha link
			echo $this->dx_auth->get_recaptcha_reload_link(); 
			// Show switch to image captcha or audio link
			echo $this->dx_auth->get_recaptcha_switch_image_audio_link(); 
		?>
	</dd>

	<dt><?php echo $this->dx_auth->get_recaptcha_label(); ?></dt>
	<dd>
		<?php echo $this->dx_auth->get_recaptcha_input(); ?>
		<?php echo form_error('recaptcha_response_field'); ?>
	</dd>
	
	<?php 
		// Get recaptcha javascript and non javasript html
		echo $this->dx_auth->get_recaptcha_html();
	?>
<?php endif; ?>

	<dt></dt>
	<dd style="margin-top: 20px;"><?php echo form_submit('register','Зарегистрироваться', "class='btn btn-default'");?></dd>
</dl>

<?php echo form_close()?>
</fieldset>
</body>
</html>