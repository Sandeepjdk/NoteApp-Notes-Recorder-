<?php
     if($_SERVER["REQUEST_METHOD"]== "POST"){
          error_reporting(E_ERROR | E_PARSE);
         $showAlert = false;
         $shwError = false;
    //    include 'partial/_dbconnect.php';
      include 'db/_partialdb.php';
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];
            $exits = false;
            // cheack if username already exit yes or not
              
            $already = "SELECT * FROM userdata WHERE username = '$username'";
            $result = mysqli_query($conn, $already);
            $numexit = mysqli_num_rows($result);
              if($numexit > 0){
                //    $shwError = "Username Already Exit";
				    $shwError = true;
              }else{

          if($exits==false){
              $hash = password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO `userdata` (`username`, `email` , `password`) VALUES ('$username', '$email', '$hash')";
              $result = mysqli_query($conn, $sql);
                if($result){
                  $showAlert = true;
				//   header("location:index.php");
                } 
          }
        }
     }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="SHORTCUT ICON" href="img/sctrulogo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>NotesApp - Register</title>
</head>
 <style>
    *{
        color: white;
    }
    body{
	background : url('img/bg.jpg'); 
    background-size: cover;
}
 .placeholder{
      color: white;
}
.card{
	border: none;
	border-top: 5px solid  rgba(116,17,255,1);
	/* background: #212042; */
     background: transparent;
	color: #57557A;
    margin-top: 10%;
}
p{
	font-weight: 600;
	font-size: 15px;
}
.fab{
	display: flex;
	justify-content: center;
	align-items: center;
	border: none;
	background: #2A284D;
	height: 40px;
	width: 90px;
}
.fab:hover{
	cursor: pointer;
}
.fa-twitter{
	color: #56ABEC;
}
.fa-facebook{
	color: #1775F1;
}
.fa-google{
	color: #CB5048;
}
.division{
	float: none;
	position: relative;
	margin: 30px auto 20px;
	text-align: center;
	width: 100%;
	box-sizing: border-box;
}
.division .line{
	border-top: 1.5px solid #57557A;;
	position: absolute;
	top: 13px;
	width: 85%;
}
.line.l{
	left: 52px;
}
.line.r{
	right: 45px;

}
.division span{
	font-weight: 600;
	font-size: 14px;
}
.myform{
	padding: 0 25px 0 33px;
}
.form-control{
	border: 1px solid #57557A;
	border-radius: 3px;
	background: #212042;
	margin-bottom: 20px;
	letter-spacing: 1px;
	color:white;
	
}
.form-control:focus{
	border: 1px solid #57557A;
	border-radius: 3px;
	box-shadow: none;
	background: #212042;
	color: #fff;
	letter-spacing: 1px;
}
.bn{
	text-decoration: underline;
}
.bn:hover{
	cursor: pointer;
}
.form-check-input {
    margin-top: 8px!important;
    }
.btn-primary{
background: linear-gradient(135deg, rgba(176,106,252,1) 39%,rgba(116,17,255,1) 101%);
border: none;
border-radius: 50px;
}
.btn-primary:focus{
	box-shadow: none;
	border: none;
}
small{
	color: #F2CEFF;
}
.far.fa-user{
	font-size: 13px;
}

@media(min-width: 767px){
	.bn{
		text-align: right;
	}
}
@media(max-width: 767px){
	.form-check{
		text-align: center;
	}
	.bn{
		text-align: center;
		align-items: center;
	}
}
@media(max-width: 450px){
	.fab{
		width: 100%;
		height: 100%;
	}
	.division .line{
		width: 50%;
	}
}
 </style>
<body>
<div class="container">
	<div class="row d-flex justify-content-center mt-5">
		<div class="col-12 col-md-8 col-lg-6 col-xl-5">
		<img src="img/log.png" alt="Loading.." width="140" height="70" class="img-fluid mx-auto d-block">

		<?php 
               error_reporting(E_ERROR | E_PARSE);

          
          if($showAlert){        
              echo  ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Success!</strong> You have successfully registered...!. Click here to <a href="index.php">Login</a>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
         } 
         if($shwError){

            echo  ' <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
                   <strong>Error!</strong> Username Already Exit. 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
           
         }
     ?>


			<div class="card py-3 px-2">
				<p class="text-center mb-3 mt-2">Connect with us</p>
				<div class="row mx-auto ">
					<div class="col-4">
						<i class="fab fa-twitter"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-facebook"></i>
					</div>
					<div class="col-4">
						<i class="fab fa-google"></i>
					</div>
				</div>
				<div class="division">
					<div class="row">
						<div class="col-3"><div class="line l"></div></div>
						<div class="col-6"><span>Register</span></div>
						<div class="col-3"><div class="line r"></div></div>
					</div>
				</div>
				<form class="myform" name="myform" action="/NotesApp/register.php" method="POST">
				    <div class="form-group">
    					<input type="name" id="username" name="username" class="form-control" placeholder="Username" required>
  					</div>
                      <div class="form-group">
    					<input type="email" id="email" name="email" class="form-control" placeholder="email" required>
  					</div>
 					<div class="form-group">
    					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
  					</div>

  					<div class="row">
  						
  						<div class="col-md-6 col-12 bn">
                             
                        </div>
  					</div>
  					<div class="form-group mt-3">
  						<button type="submit" class="btn btn-block btn-primary btn-lg"><small><i class="far fa-user pr-2"></i>Register</small></button>
  					</div>
					  <button type="button" class="btn btn-secondary text-light btn-floating img-fluid mx-auto d-block w-50">
                        click here to <a href="index.php" class="btn btn-primary">Login</a>
                      </button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"> </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <script>
	
   </script>

</html>