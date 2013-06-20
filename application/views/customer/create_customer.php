<link type="text/css" rel="stylesheet" href="/assets/css/style.css" ></link>
<style>
#contact-form{
position:absolute;
top:40%;
left:40%;
}

input{
width:300px;
}

textarea{
display:block;
}

input[type=submit]{
width:100px;
display:inline;
}

.errors{
position:absolute;
left:40%;
}
</style>

<div class="errors" >
<?php echo validation_errors(); ?>
</div>
<form action="/customer/save" method="post">
<div id="contact-form">
	<h1>Contact Information :</h1>
	<label>
	<span>Firstname</span><input id="name" type="text" name="first_name" />
	</label>
	<label>
	<span>Lastname</span><input id="name" type="text" name="last_name" />
	</label>
	<label>
	<span>PrimaryEmail</span><input id="primary_email" type="text" name="primary_email" />
	</label>
	<label>
	<span>PrimaryPhone</span><input id="primary_phone" type="text" name="primary_phone" />
	</label>
	<label>
	<span>Mobile</span><input id="mobile" type="text" name="mobile" />
	</label>
	<label>
	<span>Fax</span><input id="fax" type="text" name="fax" />
	</label>
	<label>
	<span>street1</span><input id="street1" type="text" name="street1" />
	</label>
	<label>
	<span>street2</span><input id="street2" type="text" name="street2" />
	</label>
	<label>
	<span>city</span><input id="city" type="text" name="city" />
	</label>
	<label>
	<span>state</span><input id="state" type="text" name="state" />
	</label>
	<label>
	<span>zip</span><input id="zip" type="text" name="zip" />
	</label>
	<label>
	<span>country</span><input id="country" type="text" name="country" />
	</label>
	<label>	
	<span>notes</span><textarea id="notes" name="notes"></textarea>
	<input type="submit" value="save" />	
	<a href="/customer" style="display:inline;">
		<input type="button" value="cancel" style="display:inline;width:100px;">
	</a>
	</label>
	</div>
</form>