<link type="text/css" rel="stylesheet" href="/assets/css/style.css" ></link>
<style>
.login-center-content{
position:absolute;
top:40%;
left:40%;
border: 1px solid #999999;
background:#115599;
}

.login-form{
height:150px;
width:230px;
text-align:center;
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
		<form action="/welcome/login" method="post">
			email <input type="text" id="email" name="email" onfocus="if(this.value == 'email') this.value='';" onblur="if(this.value=='') this.value='email';" "value="email" /><br /><br />
			password <input type="password" id="password" name="password" onfocus="if(this.value == 'password') this.value='';" onblur="if(this.value=='') this.value='password';"value="password" /><br><br>
				<input type="submit" id="login" value="Log In">
	</form>
	Not a registered user?<a href="/welcome/register">Sign Up</a>
	</div>
</div>
