<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
ul{
list-style:circle;
}
</style>
<div class="customer_list">
<h2>Customers</h2>
<?php 
	echo '<ul class="customer_list">';
	foreach($customers as $row)
	{
		echo '<li id='.$row->customer_id.'>'
		.'<a href="/customer/view/'.$row->customer_id.'">'
		.$row->first_name.'</a>
		</li>'."\n";
	}
	echo '</ul>';
?>
</div>
<div id="create_customer">
<a href="/customer/add" >CreateCustomer</a>
</div>
