<link type="text/css" rel="stylesheet" href="/assets/css/style.css" />
<style>

.header{
	height:40px;
	background-color:blue;
}

ul{
	list-style-type:none;
}
li{
	float:left;
}

a{
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
		<span>
			<a class="dashboard" href="/dashboard">Dashboard</a>
		</span>
	</li>
	<li>
		<span>
			<a class="payments" href="/payment_stream_new">Payments</a>
		</span>			
	</li>
	<li>
		<span>
			<a class="customers" href="/customer">Customers</a>
		</span>
	</li>	
	<li>
		<span>
			<a class="activity" href="/activity">Activity</a>
		</span>
	</li>	
	</ul>
	
</div>