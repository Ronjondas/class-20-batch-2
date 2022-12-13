<?php
require_once ("parts/header.php");
require_once ("lib/connection.php");

$sql = "SELECT * FROM students";

$allData = $conn->query($sql);
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
                    <h3>Student List
                        <a href="add_student.php" class="btn btn-success btn-sm float-end">+ADD STUDENT</a>
                    </h3>
                    <hr>
                        <table class="table table-bordered border-primary">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>roll</th>
                                <th>reg</th>
                                <th>CGPA</th>
                                <th>Phone</th>
                                <th>action</th>
                            </tr>
                              
                            <?php
                            while($student = $allData->fetch_assoc()){

                            
                            ?>


                            <tr>
                                <td><?php echo $student["id"]; ?></td>
                                <td><?php echo $student["name"]; ?></td>
                                <td><?php echo $student["roll"]; ?></td>
                                <td><?php echo $student["reg"]; ?></td>
                                <td><?php echo $student["CGPA"]; ?></td>
                                <td><?php echo $student["phone"]; ?></td>
                                <td>
                                <a href="edit.php?id=<?php echo $student["id"]; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $student["id"]; ?>" onclick = "return confirm('Are you sure?')"; class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                            <?php  }?>

                        </table>
                </div>
        </div>

    </div>

</section>


<?php
require_once ("parts/footer.php");
?>

