
<!DOCTYPE html>
<html>
<head>
<title>Login form</title>

<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: white;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
       font-size:30px;
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>  

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>


<body  >
<!-- 
<strong > <h1 style="text-align:center" >  Login Form </h1> </strong>  -->


 <h1 > contact management system </h1>     
 <br>

 <?php if ($this->session->flashdata('Delete')) { ?>
            <p class="text-success text-center">
                <?= $this->session->flashdata('Delete') ?>
            </p>
            <?php } 
 
            if (!empty($contacts) > 0) {

                ?>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Serial  No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Group</th>
    </tr>
  </thead>
  <tbody>
   
      

     <?php

        foreach($contacts  as $con)
        {
            ?>
             <tr>
            <td><?php echo $con['id'] ?> </td>

               <td><?php echo $con['name'] ?></td>
            <td><?php echo $con['email'] ?></td>
            <td><?php echo $con['phone'] ?></td>
            <td><?php echo $con['group_id'] ?></td>

          
           
            <td><a href="<?= base_url("Contact/edit") ?>/<?php echo $con['id']; ?>"> Edit </a>    </td>
            <td> <a href="<?= base_url("Contact/delete") ?>/<?php echo $con['id']; ?>"  > Delete </a> </td>
            </tr>
            <?php
        }
    }

        ?>

        <?php


     ?>
    
   
  </tbody>
</table>



 <br>

 <h2> Add Contact Form</h2>

 <?php if ($this->session->flashdata('success')) { ?>
            <p class="text-success text-center">
                <?= $this->session->flashdata('success') ?>
            </p>
            <?php } ?>

	
 <form  method="post"  action="<?php echo base_url(); ?>Contact/Contact_validation">  
        <div class="container">   
        <label> Enter Your Name : </label>   
            <input type="text" placeholder="Enter Name" name="name" required>  
            <label> Enter Your Email : </label>   
            <input type="text" placeholder="Enter Email" name="email" required>  

            
            <label>    Enter Your  Phone Number : </label>   
            <input type="text"  id="phone" placeholder="Enter Phone Number" name="phoneno" required>  

            <label>    Select Group : </label>   
              <select  name="groups">

              

               <?php

               foreach($groups  as  $res)
               {

                 ?>
                <option id="opt"  value="<?php echo $res['id'] ?>" name="group"><?php echo $res['groupname'] ?> </option>

                <?php

               }
              
               ?>
            

             </select>

             

             



            <button type="submit">Login</button>   
              
        </div>   
    </form> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
