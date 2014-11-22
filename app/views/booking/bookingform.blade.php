



{{ HTML::script('js/jquery.validate.min.js')}}
{{ HTML::script('js/jquery.timepicker.js') }}

<script>
$("#commentForm").validate();
</script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
	dateFormat: "dd-mm-yy"
	});
	
	$('#timepicker').timepicker({
		'step': 15,
		'disableTimeRanges': [
		['12am', '10:59am'],
		['3pm', '4:59pm'],
		['8:30pm', '11:59pm']]
	});
	
  });
  
  
  
</script>

<h2>Online Booking Form</h2>
<p>Online bookings only taken if placed more than 24 hours in advance, Thank you.</p>


<form  action="booking/store" id="bookingForm" method='post'>
<fieldset>
<table width='350'>
<tr>
	<td>Name</td>
</tr>
<tr>
	<td><input name='name' id='name' type='text' minlength="2" type="text" required></td>
</tr>
<tr>
	<td>Mobile or Home Phone</td>
</tr>
<tr>
	<td><input name='phone' type='tel'></td>
</tr>
<tr>
	<td>Email address</td>
</tr>
<tr>
	<td><input name='email' type='email'></td>
</tr>
<tr>
	<td>Date</td>
</tr>
<tr>
	<td><input name='date' type='text' id='datepicker'></td>
</tr>
<tr>
	<td>Time</td>
</tr>
<tr>
	<td><input name='time' type='text'  id='timepicker'></td>
</tr>
<tr>
	<td>Number of people</td>
</tr>
<tr>
	<td><input name='number' type='number'></td>
</tr>
<tr>
	<td>Comments</td>
</tr>
<tr>
	<td><textarea name="comment" cols="24" rows="4"></textarea></td>
</tr>
<tr>
	<td><input type='submit' value='Submit booking'></td>
</tr>
</table>
</fieldset>
</form>
<p>
</p>





