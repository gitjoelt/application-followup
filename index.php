<?php

class Interview
{
	/* 
	CORRECTION: 
	In the code below you are trying to access the property of $title without instantiating an object of the Interview class first.
	If you want to access $title like that, then the property must be static.
	*/
	static public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

$person = $_POST['person'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
		body {font: normal 14px/1.5 sans-serif;}
	</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// Print 10 times

	/* 
	CORRECTION: 
	The loop won't run at all if the conditional is set to $i less than 0, because $i is initialized with a value of 10 so right from the start the loop will finish because $i is already completing the conditional.

	We need to have $i start at 0, and while it's less than 10 increment up each time the loop executes until it hits 10
	*/
	for ($i=0; $i < 10; $i++) {
		/* 
		CORRECTION:
		Change + to . 
		You cant concatenate with + in php.
		*/
		echo '<p>' . $lipsum . '</p>';
	}
	?>


	<hr>

	<!--
	CORRECTION:
	Change method="get" to method="post" since we are assigning the $person variable with data from a POST request
 	-->
	<form method="post" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($people as $person): ?>
				<tr>
					<!--
					CORRECTION:
					You can't access array elements with ->, you need to enter the keys in brackets as seen below. If it were an object then you can use ->
					Switched to brackets.
				 	-->
					<td><?=$person['first_name'];?></td>
					<td><?=$person['last_name'];?></td>
					<td><?=$person['email'];?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>