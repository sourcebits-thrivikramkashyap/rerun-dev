<style>
input[type=radio]{
display:inline;
position:relative;
top:5px;
}
</style>

<form action="/payment_stream_new/save" method="post">
<div id="payment_stream-form">
	<h1>Payment Stream</h1>
	<label>
	<span>Stream name</span><input id="stream_name" type="text" name="stream_name" />
	</label>
	<label>
	<span>Stream type</span>
	<input id="stream_type" type="radio" name="stream_type" value="Single"/>Single
	<input id="stream_type" type="radio" name="stream_type" value="Recurring"/>Recurring<br/><br/>
	</label>
	<label>
	<span>No of payments</span><input id="no_of_payments" type="text" name="no_of_payments" />
	</label>
	<select name="frequency">
  	<option value="Daily">Daily</option>
  	<option value="Weekly">Weekly</option>  	
  	<option value="Twice a month">Twice a month</option>
  	<option value="Monthly">Monthly</option>
  	<option value="Quarterly">Quarterly</option>
	</select>
	
	<h2>Item</h2>
	<table>
		<tr>
			<td>itemname</td>
			<td><input type="text" id="item_name" name="item_name"/></td>
		</tr>
		<tr>
			<td>price</td>
			<td><input type="text" id="price" name="price"/></td>
		</tr>
	</table>
	
	<h2>Customer</h2>
	<table>
		<tr>
			<td>itemname</td>
			<td><input type="text" id="item_name" name="item_name"/></td>
		</tr>
		<tr>
			<td>price</td>
			<td><input type="text" id="price" name="price"/></td>
		</tr>
	</table>
	
	<input type="submit" value="create_payment_stream" />	
	<a href="/payment_stream_new" style="display:inline;">
		<input type="submit" value="cancel" >
	</a>
	
	</div>
</form>