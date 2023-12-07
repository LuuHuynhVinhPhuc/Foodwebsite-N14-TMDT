<?php
session_start();
include "connections.php";
include "header.php";
$id = $_GET["id"];
$name = "";
$email = "";
$phone = "";
$salary = "";
$title = "";
$status = "";
// $row["Name"]
// $row["Email"]
// $row["Phone"]
// $row["Salary"]
// $row["Title"]
$res = mysqli_query($link, "select * from Employee where id = '$id'");
while($row = mysqli_fetch_array($res)) {
    $name = $row["Name"];
    $email = $row["Email"];
    $phone = $row["Phone"];
    $salary = $row["Salary"];
    $title = $row["Title"];
    $status = $row["Status"];
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--content area-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Employee</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">

            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Employee</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                Employee Updated successfully
                            </div>
                            <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                Duplicate Employee, please check your Employee information
                            </div>
                            <form action="" name="form1" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="Name" name="Name" type="text" class="form-control mb-3"
                                        placeholder="Name" required value="<?php echo $name ?>">
                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                    <input id="Email" name="Email" type="text" class="form-control mb-3"
                                        placeholder="Email" required value="<?php echo $email ?>">
                                    <label for="cc-payment" class="control-label mb-1">Phone</label>
                                    <input id="Phone" name="Phone" type="text" class="form-control mb-3"
                                        placeholder="Phone" required value="<?php echo $phone ?>">
                                    <label for="cc-payment" class="control-label mb-1">Salary</label>
                                    <input id="Salary" name="Salary" type="text" class="form-control mb-3"
                                        placeholder="Salary" required value="<?php echo $salary ?>">
                                    <label for="cc-payment" class="control-label mb-1">Title</label>
                                    <select name="Title" class="form-control mb-3">
                                        <?php
                                        $res = mysqli_query($link, "select * from EmployeeTitle order by Title asc");
                                        while($row = mysqli_fetch_array($res)) {
                                            ?>
                                            <option <?php if($title == $row['Title']) {
                                                echo "selected";
                                            } ?>>
                                                <?php
                                                echo $row['Title'];
                                                echo "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="cc-payment" class="control-label mb-1">Status</label>
                                    <select name="Status" class="form-control mb-3">
                                        <option <?php if($status == "Active") {
                                            echo "selected";
                                        } ?>>Active</option>
                                        <option <?php if($status == "Inactive") {
                                            echo "selected";
                                        } ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Update</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div> <!-- .card -->

        </div><!--/.col-->

    </div>
</div>
<!--end: content area-->


<?php
//logic nút submit
if(isset($_POST["submit1"])) {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $phone = $_POST["Phone"];
    $salary = $_POST["Salary"];
    $title = $_POST["Title"];
    $status = $_POST["Status"];

    if(empty($name) || empty($email) || empty($phone) || empty($salary)) {
            echo "<script>";
            echo "document.getElementById('error').innerHTML = 'All fields are required';";
            echo "document.getElementById('error').style.display = 'block';";
            echo "</script>";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>";
            echo "document.getElementById('error').innerHTML = 'Invalid email format';";
            echo "document.getElementById('error').style.display = 'block';";
            echo "</script>";
        } elseif(!is_numeric($salary)) {
            echo "<script>";
            echo "document.getElementById('error').innerHTML = 'Salary must be a number';";
            echo "document.getElementById('error').style.display = 'block';";
            echo "</script>";
        } elseif(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<script>";
            echo "document.getElementById('error').innerHTML = 'Name can only contain letters and spaces';";
            echo "document.getElementById('error').style.display = 'block';";
            echo "</script>";
        } elseif(!preg_match('/^\d{3}[-]?\d{3}[-]?\d{4}$/', $phone)) {
            echo "<script>";
            echo "document.getElementById('error').innerHTML = 'Invalid phone number format';";
            echo "document.getElementById('error').style.display = 'block';";
            echo "</script>";
        } else {
        mysqli_query($link, "update Employee set Name = '$_POST[Name]', Email = '$_POST[Email]', Phone = '$_POST[Phone]',
        Salary = '$_POST[Salary]', Title = '$_POST[Title]', Status = '$_POST[Status]' where id = $id") or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            setTimeout(function () {
            window.location.href = "employee.php";
            }, 2500);
        </script>
        <?php
    }
    ?>

    <?php
}
?>

</div>
<?php
include "footer.php";
?>