<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="<?php echo base_url(); ?>autodeployment/UpdateQueryToClientDatabase" method="POST">
	<textarea name="query" style="width:500px; height:300px;"></textarea>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>
