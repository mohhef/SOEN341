<?php
require_once 'backendInterface.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<title>SOEN Course Stream</title>
	<style>
		table.gridtable {
			padding: 10px;
			font-weight: bold;
			text-align: left;
			font-size: 18px;
			opacity: 0.7;
			display: block;
		}

		.jumbotron {
			margin-top:8%;
			margin-left: 8%;
		}

		.card:hover{
			-webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			-moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
			box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
		}

	</style>
  </head>
 <body>
	<div class="container">
		<br />
		<br />
		<h2 align="center">Distrubte your courses for each semester (0-6 courses)</h2>

		<div class="form-group">
			<form name="add_name" id="add_name">
				<table class="table table-bordered" id="dynamic_field">
					 <tr>
						<td><select name="Years" >
							<option value="first_year" selected>First Year</option>
							<option value="first_year">Second Year</option>
							<option value="first_year">Third Year</option>
							<option value="first_year">Fourth Year</option>
							<option value="first_year">Fifth Year</option>
							<option value="first_year">Sixth Year</option>
							</select>
						</td>
						<td><select name="Term" >
							<option value="Summer" selected>Summer Term</option>
							<option value="Fall">Fall Term</option>
							<option value="Winter">Winter Term</option>
							</select>
						</td>
						<td><input type="number" name="quantity" min="0" max="6" name="number1" id="number1" class="form-control" placeholder="Semester 1" /></td>
						<td><button type="button" name="add" id="add" class="btn btn-success">Next</button></td>
					</tr>
				</table>
				<input type="button" class="btn btn-primary" name="submit" id="submit" value="submit"/>
			</form>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid">
				<h2 align="center"class="header margin-top:0px">General Course Schedule</h2>
		<br />
		<div class="card-columns">
			<div class=" card card-body bg-primary text-center height:400px" >
				<p> Minimum Credits of For This Semester</p>
				<input type="number" id="credits1"/> &nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-success" name="btncredits1" id="btncredits1" value="submit"/>
        <table>
          <thead>
            <tr>

              <?php echo implode('</th><th>', array_keys(current($semInfo))); ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($semInfo as $row): array_map('htmlentities', $row); ?>
              <tr>
                <td><?php echo implode('</td><td>', $row); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
			</div>
			<div class=" card card-body bg-warning text-center height:400px" >
				<p> Minimum Credits of For This Semester</p>
				<input type="number" id="credits1"/> &nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-success" name="btncredits1" id="btncredits1" value="submit"/>
				<table class="gridtable" id="table2" border="0"onclick=window.location.href='file:///C:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.html'>
					<thead>
						<tr class="tableheader">
							<th>Semester 2</th>
						</tr>
					</thead>
					<tbody>
						<tbody class="labels">
							<tr>
								<td colspan="2">
									<label>Course Name</label>
									<label>Credits</label>
								</td>
							</tr>
						</tbody>

						<tbody>
							<tr><td>COMP 249</td><td>3.50</td></tr>
							<tr><td>ENGR 233</td><td>3.00</td></tr>
							<tr><td>ENGR 202</td><td>1.50</td></tr>
							<tr><td>SOEN 287</td><td>3.00</td></tr>
							<tr><td>ENGR 371</td><td>3.00</td></tr>
						</tbody>
					</tbody>
				</table>
			</div>
			<div class="card card-body bg-danger text-center height:400px">
			<p> Minimum Credits of For This Semester</p>
				<input type="number" id="credits1"/> &nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-success" name="btncredits1" id="btncredits1" value="submit"/>
				<table class="gridtable" id="table3" border="0"onclick=window.location.href='file:///C:/xampp/htdocs/SOEN341/FrontEnd/weeklySchedule.html'>
					<thead>
						<tr class="tableheader">
							<th>Semester 3</th>
						</tr>
					</thead>
					<tbody>
						<tbody class="labels">
							<tr>
								<td colspan="2">
									<label>Course Name</label>
									<label>Credits</label>
								</td>
							</tr>
						</tbody>

						<tbody>
							<tr><td>COMP 348</td><td>3.00</td></tr>
							<tr><td>COMP 352</td><td>3.50</td></tr>
							<tr><td>ELEC 275</td><td>3.50</td></tr>
							<tr><td>ENCS 282</td><td>3.00</td></tr>
						</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<!--
		Fall					Winter
		COMP 232	3.00		COMP 232	3.00
		COMP 248	3.50		COMP 248	3.50
		ENGR 201	1.50		ENGR 201	1.50
		ENGR 213	3.00		ENGR 213	3.00
								SOEN 228	4.00
		COMP 249	3.50
		ENGR 233	3.00		COMP 249	3.50
		SOEN 228	4.00		ENGR 202	1.50
		SOEN 287	3.00		ENGR 233	3.00
								SOEN 287	3.00
		COMP 348	3.00
		COMP 352	3.00		COMP 348	3.00
		ENCS 282	3.00		COMP 352	3.00
		ENGR 202	1.50		ELEC 275	3.50
								ENCS 282	3.00
		COMP 346	4.00
		ELEC 275	3.50		COMP 346	4.00
		ENGR 371	3.50
		SOEN 331	3.00
		SOEN 341	3.00

		COMP 335	3.00
		ENGR 391	3.00
		SOEN 342	3.00
		SOEN 343	3.00
		SOEN 384	3.00

		SOEN 344	3.00
		SOEN 345 	3.00
		SOEN 357	3.00
		SOEN 390	3.00

		ENGR 301	3.00
		SOEN 321	3.00
		SOEN 490	4.00

		ENGR 392	3.00
		SOEN 385	3.00
		SOEN 490	4.00
-->


<script>
$(document).ready(function(){
	var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><select name="Years" ><option value="first_year" selected>First Year</option><option value="first_year">Second Year</option><option value="first_year">Third Year</option><option value="first_year">Fourth Year</option><option value="first_year">Fifth Year</option><option value="first_year">Sixth Year</option></select></td><td><select name="Term" ><option value="Summer" selected>Summer Term</option><option value="Fall">Fall Term</option><option value="Winter">Winter Term</option></select></td><td><input type="number" name="quantity" min="0" max="6" name="number'+i+'" id="number'+i+'" class="form-control" placeholder="Semester '+i+'"/></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	$(document).on('click','.btn_remove',function(){
		var button_id = $(this).attr("id");
		i--;
		$("#row"+button_id+'').remove();
	});

	$('#submit').click(function(){
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
});
</script>
<script>
	$(document).ready(function(){
		$('.card-columns').hover()
			//trigger when mouse hover
			function(){
				$(this).animate({
					marginTop: "-=1%",
				},200);
			},

			//trigger when mouse out
			function(){
				$(this).animate({
					marginTop: "0%",
				},200);
			}
		};
	});
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>