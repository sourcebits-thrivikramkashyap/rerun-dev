<link type="text/css" rel="stylesheet" href="/assets/css/style.css" ></link>
<style>
.login-center-content{
position:absolute;
top:40%;
left:40%;
border: 1px solid #999999;
background:#115599;
border-radius:10px;
}

.login-form{
height:200px;
width:275px;
padding:20px;
}

.errors{
position:absolute;
top:20%;
left:40%;
}
</style>


<div class="errors">
<?php 
echo validation_errors(); ?>
</div>

<div class="login-center-content">
	<div class="login-form">
		<form action="/welcome/register_process" method="post">
			email <input type="text" id="email"  maxlength="30" name="email" onfocus="if(this.value == 'email') this.value='';" onblur="if(this.value=='') this.value='email';" "value="email" />
			password <input type="password" id="password" maxlength="30" name="password" onfocus="if(this.value == 'password') this.value='';" onblur="if(this.value=='') this.value='password';"value="password" />
			password confirm<input type="password" id="password_confirm" maxlength="30" name="password_confirm" onfocus="if(this.value == 'password') this.value='';" onblur="if(this.value=='') this.value='password';"value="password" /><br />
				<input type="submit" id="register" value="Register">		
	</form>
	Already registered?<a href="/welcome/login"> Login</a>
	
	</div>
</div>
