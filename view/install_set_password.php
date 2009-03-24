<h1>Installation - set password</h1>

<p>We need to password protect this installation so only you have access.</p>

<form method="post" enctype="multipart/form-data" action="">

<fieldset>
	<legend>Your username and password</legend>
	
			<label for="user[username]">Username</label>
				<div class="info">
				<input id="user[username]" name="user[username]" class="long_text" title="Enter your login"/>
				</div>	
			<label for="user[password]">Password</label>
				<div class="info">
				<input type="password" name="user[password]" id="user[password]" class="long_text" title="Enter password"/>
				</div>	
			
		<input type="submit" name="submit" value="Next..." title="Next stage"/>
		<input type="hidden" name="page" value="install_stage_1" />
</fieldset>
</form>
