<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Contact</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


	<style type="text/css">

		</style>
</head>
<body>

		<div id="container">

		
 <h1  style="text-align:center" >Edit Contact </h1> 


        <?php
			
            if (count($Conactdetails) > 0) {
            foreach ($Conactdetails as $row) {
            ?>
			 <form class="form col-md-8 offset-md-1" method="post"  action="<?php echo base_url('Contact/edit/'.$row['id']); ?>"    autocomplete="off">
           
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Name:</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="username"
                        value="<?php echo $row['name'] ?>" aria-describedby="created_on" />
                </div>
            </div>

			<div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Email:</label>
                <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" id="email"
                        value="<?php echo $row['email'] ?>" aria-describedby="created_on" />
                </div>
            </div>

			
			<div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Phone No:</label>
                <div class="col-sm-9">
                    <input type="text" name="phone" class="form-control" id="phone"
                        value="<?php echo $row['phone'] ?>" aria-describedby="created_on" />
                </div>
            </div>


			<div class="row mb-3">
                <label for="inputEmail3" class="col-sm-3">Group:</label>
                <div class="col-sm-9">
                    <input type="text" name="group" class="form-control" id="group"
                        value="<?php echo $row['group_id'] ?>" aria-describedby="created_on"  disabled/>
                </div>
            </div>


			<button  class="btn btn-primary" type="submit">Update</button>   

            <?php

			}
		}

		?>

            

	 

    </div>

</body>
</html>