<?php
session_start();
include "connections.php";
include "header.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--content area-->
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Employee</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert" id="success" style="display: none;">
                                Employee Added successfully
                            </div>
                            <div class="alert alert-danger" role="alert" id="error" style="display: none;">
                                Duplicate Employee found
                            </div>
                            <form action="" name="form1" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Name</label>
                                    <input id="employee_name" name="employee_name" type="text" class="form-control mb-3"
                                        placeholder="Name" required>
                                    <label for="cc-payment" class="control-label mb-1">Email</label>
                                    <input id="email" name="email" type="text" class="form-control mb-3"
                                        placeholder="Email" required>
                                    <label for="cc-payment" class="control-label mb-1">Phone</label>
                                    <input id="phone" name="phone" type="text" class="form-control mb-3"
                                        placeholder="Phone" required>
                                    <label for="cc-payment" class="control-label mb-1">Salary</label>
                                    <input id="salary" name="salary" type="text" class="form-control mb-3"
                                        placeholder="Salary" required>
                                    <label for="cc-payment" class="control-label mb-1">Title</label>
                                    <select name="title" class="form-control mb-3">
                                        <?php
                                        $res = mysqli_query($link, "select * from EmployeeTitle order by Title asc");
                                        while($row = mysqli_fetch_array($res)) {
                                            echo "<option>";
                                            echo $row['Title'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"
                                        name="submit1">
                                        <span id="payment-button-amount">Add Employee</span>
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
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM Employee WHERE Name='$_POST[employee_name]'") or die(mysqli_error($link));
    $count = mysqli_num_rows($res);
    if($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "block";
            document.getElementById("success").style.display = "none";
        </script>
        <?php
    } else {

        $name = $_POST['employee_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $salary = $_POST['salary'];
        $title = $_POST['title'];

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
            mysqli_query($link, "insert into Employee values(NULL, '$_POST[employee_name]','$_POST[email]','$_POST[phone]',
            '$_POST[salary]','$_POST[title]', 'Active')") or die(mysqli_error($link));
            ?>
            <script type="text/javascript">
                document.getElementById("error").style.display = "none";
                document.getElementById("success").style.display = "block";
                setTimeout(function () {
                    window.location.href = window.location.href;
                }, 2500);
            </script>
            <?php
        }
    }
}
?>

</div>

<script src="cropping_js/bootstrap.min.js"></script>
<script src="cropping_js/croppie.js"></script>
<script src="cropping_js/exif.js"></script>

<?php
include "footer.php";
?>