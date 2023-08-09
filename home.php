
<?php
          error_reporting(0);

      session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
              header('location: index.php');
        }
?>

<?php      
error_reporting(0);

          include 'db/_partialdb.php';

          $insert = false;
          $update = false;
          $delete = false;

          if(isset($_GET['delete'])){
  $SNO = $_GET['delete'];
  $sql = "DELETE FROM `notes` WHERE `SNO` = '$SNO'";
  $result = mysqli_query($conn, $sql);
  if($result){
       $delete = true;
  }
}
      if($_SERVER['REQUEST_METHOD']== 'POST'){
        if(isset($_POST['snoEdit'])){
           // updating the record;
           $SNO= $_POST['snoEdit'];
           $TITLE =$_POST['titleEdit'];
        $DESC =$_POST['descEdit'];

          $sql="UPDATE `notes` SET `TITLE` = '$TITLE' , `DESC` = '$DESC'  WHERE `notes`.`SNO` = $SNO";
           $result =mysqli_query($conn, $sql);
             if($result){
               $update = true;
             }else{
               echo "Your updation have been failed !unsucessfully";
             }
        }
        else{
        $TITLE =$_POST['title'];
        $DESC =$_POST['desc'];

$sql="INSERT INTO `notes` (`TITLE`, `DESC`, `TSTAMP`) VALUES ('$TITLE', '$DESC', current_timestamp())";
  $result =mysqli_query($conn, $sql);
     if($result){
         $insert = true;
     }else {
       echo "Sorry! Your record insterted unsuccessfully.";
     }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <style>
      *{
        color: green;
      }
         body{
             background-color: red;
         }  
         .username{
           display: none;
         } 
    </style>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
     
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="SHORTCUT ICON" href="img/sctrulogo.png" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>NotesApp - Home</title>
  </head>
   <style>
      /* body{
         background: url("bg.jpg");
         background-size: cover;
      } */
    a{
       text-decoration:none;
    }
   </style>
  <body>
    



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit this notes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="/NotesApp/home.php" method="POST">
       <div class="modal-body">
 <input type="hidden" name="snoEdit" id="snoEdit">
  <div class="mb-3">
    <label for="title" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
  <label for="desc" class="form-label">Notes Description</label>
  <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
</div>
  <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
  
</div>
<div class="modal-footer d-block mr-auto">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
    </div>
  </div>
</div>

  <!-- navigation -->
  <div class="m-4 bg-dark ">
    <nav class="navbar navbar-expand-lg  text-light bg-darkt">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="img/log.png" height="50" alt="CoolBrand">
            </a>
            <button type="button" class="navbar-toggler text-dark" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon text-light"><img src="img/threelines.png" height="30" alt=""></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">Service</a>
      </li>
    </ul>
                
                <div class="navbar-nav ms-50 text-light">
                   
                <?php 
                        session_start();
                ?>
            
                      
              
              <div class="dropdown show ">
                  <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile

              </a>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                   <a class="dropdown-item" href="#"> <i class="fa fa-user-circle-o"></i>
                   <strong>  <?php
                       if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {                        
                        echo "Welcome, " . $_SESSION['username'] . "!";
                        }
                      ?> </strong>

                   </a>
                   <a class="dropdown-item " href="#"><i class="fa fa-user-plus"></i> Setting</a>
                   <a class="dropdown-item" href="logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
                 </div>
              </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- navigation end  -->

    <?php 
          error_reporting(0);
        if($insert){
    echo '<div class="alert alert-success alert-success fade show" role="alert">
  <strong>Success!</strong> Your notes has been inserted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
    ?>
    <?php
     error_reporting(0);
     if($update){
         echo '<div class="alert alert-success alert-success fade show" role="alert">
  <strong>Success!</strong> Your notes has been updated successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
     }
    ?>
    <?php
     error_reporting(0);
     if($delete){
         echo '<div class="alert alert-success alert-success fade show" role="alert">
  <strong>Success!</strong> Your notes has been deleted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
     }
    ?>

    <div class="container my-5">
          <h2>Add a Note</h2>
        <form action="/NotesApp/home.php" method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
  <label for="desc" class="form-label">Notes Description</label>
  <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
    </div>
     <div class="container my-4">
         
           <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">TITLE</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">ACTIONS</th>
    </tr>
  </thead>
  <tbody>
      <?php
            $sql ="SELECT * FROM `notes`";
            $result= mysqli_query($conn, $sql);
            $l=0;
            while($row=mysqli_fetch_assoc($result)){
            $l= $l+1;
            echo "
     <tr>
      <th scope='row'>".$l."</th>
      <td>".$row['TITLE']."</td>
      <td>".$row['DESC']."</td>
      <td> <button class='edit btn btn-sm btn-primary' id=".$row['SNO'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['SNO'].">Delete</button>  </td>
    </tr>
            ";
            }
         
           ?>
  </tbody>  
</table>
     </div>
     <hr>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
    
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
     <script>
                 $(document).ready( function () {
               $('#myTable').DataTable();
                } );
     </script>
     <script>
       edits = document.getElementsByClassName('edit');
       Array.from(edits).forEach((element)=>{
         element.addEventListener("click",(e)=>{
           console.log("edit",);
           tr = e.target.parentNode.parentNode;
           title= tr.getElementsByTagName("td")[0].innerText;
           desc = tr.getElementsByTagName("td")[1].innerText;
           console.log(title, desc);
           titleEdit.value =title;
           descEdit.value = desc;
                   snoEdit.value = e.target.id;
                 console.log(e.target.id)

            
           $('#exampleModal').modal('toggle');
         })
       })
       deletes = document.getElementsByClassName('delete');
       Array.from(deletes).forEach((element)=>{
         element.addEventListener("click",(e)=>{
           console.log("delete",);
           SNO =e.target.id.substr(1,);
          
            if(confirm("Sure! Are you want to delete this Notes")){
               console.log("yes");
               window.location = `/NotesApp/home.php?delete=${SNO}`;
                   
            }else{
              console.log("no")
            }
         })
        })
     </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
