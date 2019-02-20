<?php

use App\Keyword;
use App\Languages;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Downloaded_Templates/Table_Responsive_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Downloaded_Templates/Table_Responsive_v1/css/main.css">
<!--===============================================================================================-->
<style>
.sub_button{
	background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  border-radius: 50%;



}

.sub_button2{
	visibility: hidden;


}




</style>

</head>
<body>

	<?php
	$keylang_select = Keyword::select('keyword_id','keyword_name','language')->
					  where('active_status',1)->
					  get();

	echo ($keylang_select);

	$keylang_array_count = count($keylang_select);
	
	?>


	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class ="column1">Serial No</th>
								<th class="column2">Keyword</th>
								<th class="column3">Language</th>
								<th class="column4">Delete</th>
								
							</tr>
						</thead>
						<tbody>
							<!-- <form method='post' action='delete_keyword'> -->
							<!-- {{ csrf_field() }} -->
									<?php	
									
									for($i=0; $i < $keylang_array_count; $i++){ 
										
									$array_elem = $keylang_select[$i];
									$serial = $array_elem["keyword_id"];
									$keyword = $array_elem["keyword_name"];
									$language = $array_elem["language"];
									
									
									
									
									echo "<tr>"		;							
									// echo "<input type='hidden' name= 'del_id' value='$serial' />";
									echo"<td class='column1'>$serial";
									echo"</td>";
									echo"<td class='column2'>$keyword</td>";
									echo"<td class='column3'>$language</td>";
									echo"<td class='column4'>";
									echo "<form method='post' action='delete_keyword'>";
									// echo "{{ csrf_field() }}";
									echo "<input type='hidden' name= '_token' value='".csrf_token()."' /><input type='hidden' name= 'del_id' value='$serial' /><input class='sub_button' type='submit' value='X' />";
									echo "</form>";
									echo "</td>";
									
									
									
									
								echo"</tr>";

								
								
							}?>
						<!-- </form> -->
								

								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>
</html>