<link type="text/css" rel="stylesheet" href="/assets/css/style.css" ></link>
<style>
.login-center-content{
position:absolute;
top:40%;
left:40%;
border: 1px solid #999999;
border-radius:10px;
background:#115599;
}

.login-form{
height:150px;
width:230px;
padding:20px;
font: normal 15px Arial;
border-radius: 15px;
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
		<table>
			<tr><td>email</td><td><input type="text" id="email" size="20" name="email" maxlength="30" onfocus="if(this.value == 'email') this.value='';" onblur="if(this.value=='') this.value='email';" "value="email" /></td></tr> 
			<tr><td>password</td><td><input type="password" id="password" size="20"  maxlength="30" name="password" onfocus="if(this.value == 'password') this.value='';" onblur="if(this.value=='') this.value='password';"value="password" /><br/></td></tr> 
			<tr><td></td><td><input type="submit" id="login" size="30" value="Log In"></td></tr>
		</table>
	</form>
	Not a registered user?<a href="/welcome/register">Sign Up</a>
	</div>
</div>
