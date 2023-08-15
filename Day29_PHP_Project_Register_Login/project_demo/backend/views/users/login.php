<?php
//views/users/login.php
?>
<div class="container">
	<h2>Form đăng nhập</h2>
	<form action="" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" id="username" name="username"
				   class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password"
				   class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="submit"
				   class="btn btn-success" value="Đăng nhập">
			Chưa có tài khoản, đăng ký tại
			<a href="index.php?controller=user&action=register">đây</a>
		</div>
	</form>
</div>
