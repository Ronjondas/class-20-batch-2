<?php
require_once ("parts/header.php");
require_once ("lib/connection.php");


//data update
if(isset($_POST["btn_submit"])){
    $name = $_POST["student_name"];
    $roll = $_POST["student_roll"];
    $reg = $_POST["student_reg"];
    $CGPA = $_POST["student_cgpa"];
    $phone = $_POST["student_phone"];

    $id = $_GET["id"];

    $sql = "UPDATE students SET name='$name', roll='$roll', reg='$reg', cgpa='$CGPA', phone='$phone' WHERE id=".$id;
    $status = $conn->query($sql);

    if($status){
        echo "<div class='alert alert-success' role='alert'>
                  <h4 class='alert-heading'> Well done! your data update successfully.</h4>
              </div>";
    }else{
        echo "try again";
    }
}
  
  // data select
  $id = $_GET["id"];
  $sql = "SELECT * FROM students WHERE id=".$id;
  $result = $conn->query($sql);


?>


<section class="content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php
                require_once("parts/sidebar.php");
                ?>
            </div>
                <div class="col-sm-9">
                    <h3> +Edit Here
                        <a href="index.php" class="btn btn-success btn-sm float-end">Home</a>
                    </h3>
                    <hr>

                    <?php  while($student = $result->fetch_assoc()){?>
                    <form action="edit.php?id=<?php echo $student ['id'];?>" method = "post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="student_name" type="text" class="form-control" id="name" placeholder="type your full name" value="<?php echo $student['name'];   ?>">
                    </div> 
                    <div class="mb-3">
                        <label for="roll" class="form-label">Roll</label>
                        <input name="student_roll" type="number" class="form-control" id="roll" placeholder="type your bord roll" value="<?php echo $student['roll'];   ?>">
                    </div> 
                    <div class="mb-3">
                        <label for="reg" class="form-label">REG.</label>
                        <input name="student_reg" type="number" class="form-control" id="reg" placeholder="type your registation number" value="<?php echo $student['reg'];   ?>">
                    </div> 
                    <div class="mb-3">
                        <label for="cgpa" class="form-label">C.G.P.A</label>
                        <input name="student_cgpa" type="text" class="form-control" id="cgpa" placeholder="type your result" value="<?php echo $student['CGPA'];   ?>">
                    </div> 
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="student_phone" type="text" class="form-control" id="phone" placeholder="+8801*********" value="<?php echo $student['phone'];   ?>">
                    </div> 
                    <div class="mb-3">
                        <input type="submit" value="submit" class ="btn btn-dark text-warning" name = "btn_submit">
                    </div> 
                    </form>
                    <?php    }   ?>
                </div>
        </div>

    </div>

</section>


<?php
require_once ("parts/footer.php");
?>


