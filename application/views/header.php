<link type="text/css" rel="stylesheet" href="/assets/css/style.css" />
<style>

.header{
	height:40px;
	background-color:blue;
}

ul.navigation{
	list-style-type:none;
}
.navigation li{
	float:left;
}

.links{
	display:block;
	width:100px;
	color:white;
}

.welcome{
float:right;
color:white;
margin:5 20 5 5;
}

.logo{
float:left;
margin: 5 5 5 20;
width:300px;
color:white;
font-size:20px;
}
</style>

<div class="header">
<h1 class="logo">RERUN</h1>

	<div class="Welcome">
	Welcome <?php echo $email;?>
	<a href="/welcome/logout" style="display:inline;">  Logout</a>
	</div>
	
	
	<ul class="navigation">
	<li>
		<span class="links">
			<a class="dashboard links" href="/dashboard">Dashboard</a>
		</span>
	</li>
	<li>
		<span class="links">
			<a class="payments links" href="/payment_stream_new">Payments</a>
		</span>			
	</li>
	<li>
		<span class="links">
			<a class="customers links" href="/customer">Customers</a>
		</span>
	</li>	
	<li>
		<span class="links">
			<a class="activity links" href="/activity">Activity</a>
		</span>
	</li>	
	</ul>
	
</div>
