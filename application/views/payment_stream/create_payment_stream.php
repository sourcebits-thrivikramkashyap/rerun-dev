<style>
input[type=radio]{
display:inline;
position:relative;
top:5px;
}

input[type=text]{
}
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#stream_start_date").datepicker({
		  showOn: "button",
	      buttonImage: "/assets/images/calendar.gif",
	      buttonImageOnly: true
	});
	

	//update price when an item is selected
	var request = $.ajax({
			url: '/ajax/get_item',
			type:'get',
			data:{
				 'item_name':$("#items").val()
			},
			success:function(data){
			//alert(data);
			var item = jQuery.parseJSON(data);
			//alert(item[0].price);
			$("#price").val(item[0].price);
		}
		});
	
	$('#items').on('change', function(){
		//alert(this.value);
		var request = $.ajax({
			url: '/ajax/get_item',
			type:'get',
			data:{
				 'item_name':$("#items").val()
			},
			success:function(data){
			//alert(data);
			var item = jQuery.parseJSON(data);
			//alert(item[0].price);
			$("#price").val(item[0].price);
		}
		});
	});
	
	$("#add_item").click(function(){ 

		
		var item_name = $("#item_name").val();
		var price = $("#price").val();

		//update total_amount
		if(price=='' && item_name==''){
			//alert("Enter item_name and price");
		}
		else{						
			// save items ids to item_ids[] hidden field
			var request = $.ajax({
				url: '/ajax/get_item',
				type:'get',
				data:{
					 'item_name':$("#items").val()
				},
				success:function(data){
				//alert(data);
				var item = jQuery.parseJSON(data);
				//alert(item[0].item_id);
				
				//check if the item has already been added
				var ids = $("#display_items li").map(function () {
    			return this.id;
				}).get();

				var index=$.inArray(item[0].item_id, ids );
				if(index != -1){
				//	alert(index+"This item has already been added"+item[0].item_id+ ids);
				alert("This item has already been added");
					return false;					
				}	
				
				
				$(".display_items").append('<li id="'+item[0].item_id+'" >'+item[0].item_name+' $'+item[0].price+'</li>');
				
				$(".payment_stream_form").append('<input type="hidden" name ="item_ids[]" id="item_ids" value="'+item[0].item_id+'" />');

				//update total
				price = parseInt(price);
				var total = parseInt($("#total_amount").val());
				total+=price;
				$("#total_amount").val(total);//alert(total);
				$("#total").text("$"+total);//alert($("#total").val());
			}
			});			
		} 

		
			
	});

	// add customer to payment stream
	$("#add_customer").click(function(){
		//retrieve id by making ajax request passing customer_name as data	
		
		var request = $.ajax({
			url: '/ajax/get_customer',
			type: 'GET',
			data :{
			'customer_name' : $("#customers").val()
		},
			success:function(data){
			alert(data);

			var object = jQuery.parseJSON(data);
			var customer = object[0];
			alert(customer.customer_id);

			//check if the item has already been added
			var ids = $("#display_customers li").map(function(){
				return this.id;
			}).get();

			var index = $.inArray(customer.customer_id, ids);
			if(index != -1){
				alert("This customer has already been added");
				return false;
			}

			//save customer information in hidden input fields
			$(".display_customers").append('<li id="'+customer.customer_id+'">'+customer.first_name+' '+$("#stream_start_date").val()+' '+$("#no_of_payments").val()+'</li>');

			$(".payment_stream_form").append('<input type="hidden" name ="customer_ids['+customer.customer_id+'][]" id="customer_ids" value="'+customer.customer_id+'" />'	
			+'<input type="hidden" name ="customer_ids['+customer.customer_id+'][]" id="customer_ids" value="'+$("#stream_start_date").val()+'" />'			
			+'<input type="hidden" name ="customer_ids['+customer.customer_id+'][]" id="customer_ids" value="'+$("#no_of_payments").val()+'" />');			
			
		}
		});

		
	});
});
		
</script>
<form class="payment_stream_form" action="/payment_stream_new/save" method="post">
<div id="payment_stream-form">
	<input	type="hidden" name="total_amount" id="total_amount" value="0" /> 	
	<h2>Payment Stream</h2>
	<label>
	<span>Stream name</span><input id="stream_name" type="text" name="stream_name" />
	</label>
	<label>
	<span>Stream type</span>
	<input id="stream_type" type="radio" name="stream_type" value="Single"/>Single
	<input id="stream_type" type="radio" name="stream_type" value="Recurring" checked="checked" />Recurring<br/><br/>
	</label>
	<label>
	<span>No of payments</span><input id="no_of_payments2" type="text" name="no_of_payments2" />
	</label>
	<select name="frequency">
  	<option value="Daily">Daily</option>
  	<option value="Weekly">Weekly</option>  	
  	<option value="Twice a month">Twice a month</option>
  	<option value="Monthly">Monthly</option>
  	<option value="Quarterly">Quarterly</option>
	</select>
	
	<h2>Items</h2>
	<div id="display_items">
	<ul class="display_items"></ul>
	</div>
	<table class="items_table">
		<tr>
			<td>itemname</td>
			<td>
				<select id="items" name="items" >
					<?php foreach($items as $row)
					{
						echo '<option value="'.$row->item_name.'">'.$row->item_name.'</option>';
					}?>				  	
				</select>
			</td>
		</tr>
		<tr>
			<td>price</td>
			<td><input type="text" id="price" name="price"/></td>
		</tr>
		<tr>
			<td>total</td>
			<td><span id="total"></span></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="button" id="add_item" name="add_item" value="add item"/></td>
		</tr>
	</table>
	
	<h2>Customer</h2>
	
	<div id="display_customers">
	<ul class="display_customers"></ul>
	</div>
	<table class="customers_table">
		<tr>
			<td>Customer name</td>
			<td>
				<select id="customers" name="customers" >
					<?php foreach($customers as $row)
					{
						echo '<option value="'.$row->first_name.'">'.$row->first_name.'</option>';
					}?>				  	
				</select>
		   </td>
		</tr>
		<tr>
			<td>Stream start date</td>
			<td><input type="text" id="stream_start_date" name="stream_start_date"/></td>
		</tr>
		<tr>
			<td>No of payments</td>
			<td><input type="text" id="no_of_payments" name="no_of_payments"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="button" id="add_customer" name="add_customer" value="add_customer" /></td>
		</tr>
		
	</table>
	
	<input type="submit" value="create_payment_stream" />	
	<a href="/payment_stream_new" style="display:inline;">
		<input type="submit" value="cancel" >
	</a>
	
	</div>
</form>
