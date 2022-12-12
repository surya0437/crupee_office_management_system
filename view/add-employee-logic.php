<?php
require_once '../Controller/config.php';
// Add a new employee


if (isset($_POST['add'])) {
    $emp_code = $_POST['emp_code'];
    $emp_password = $_POST['emp_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $merital_status = $_POST['merital_status'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $telephone = $_POST['telephone'];
    $identity_doc = $_POST['identity_doc'];
    $identity_no = $_POST['identity_no'];
    $emp_type = $_POST['emp_type'];
    $joining_date = $_POST['joining_date'];
    $blood_group = $_POST['blood_group'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $pan_no = $_POST['pan_no'];
    $bank_name = $_POST['bank_name'];
    $account_no = $_POST['account_no'];

    if ($emp_code == "" || $emp_password == "" || $first_name == "" || $last_name == "" || $dob == "" || $gender == "" || $merital_status == "" || $nationality == "" || $address == "" || $city == "" || $state == "" || $country == "" || $email == "" || $mobile == "" || $telephone == "" || $identity_doc == "" || $identity_no == "" || $emp_type == "" || $joining_date == "" || $blood_group == "" || $designation == "" || $department == "" || $pan_no == "" || $bank_name == "" || $account_no == "") {
        echo "<script>
        alert('Please fill all fields');
        window.history.back();
        </script>";
    } else {
    $query = "select * from `wy_employees` where `emp_code`='$emp_code'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "<script>
        alert('Employee code is already exit');
        window.history.back();
        </script>";
    } else {
        $query = "select * from `wy_employees` where `email`='$email'";
        $result = mysqli_query($con, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "<script>
        alert('Email is already exit');
        window.history.back();
        </script>";
        } else {

            $encrepted_password = password_hash($emp_password, PASSWORD_DEFAULT);
            $add_employee = "INSERT INTO `wy_employees`(`emp_code`, `emp_password`, `first_name`, `last_name`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `blood_group`, `designation`, `department`, `pan_no`, `bank_name`, `account_no`) VALUES('$emp_code','$emp_password','$first_name','$last_name','$dob','$gender','$merital_status','$nationality','$address','$city','$state','$country','$email','$mobile','$telephone','$identity_doc','$identity_no','$emp_type','$joining_date','$blood_group','$designation','$department','$pan_no','$bank_name','$account_no')";

            $added = mysqli_query($con, $add_employee);

            $user_type = "normal";
            $add_user = "INSERT INTO `wy_users`(`emp_code`, `emp_password`, `user_type`, `first_name`, `last_name`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `blood_group`, `designation`, `department`, `pan_no`, `bank_name`, `account_no`) VALUES('$emp_code','$encrepted_password','$user_type','$first_name','$last_name','$dob','$gender','$merital_status','$nationality','$address','$city','$state','$country','$email','$mobile','$telephone','$identity_doc','$identity_no','$emp_type','$joining_date','$blood_group','$designation','$department','$pan_no','$bank_name','$account_no')";
           
            $user_added = mysqli_query($con, $add_user);

            if (!$added && !$user_added) {
                echo "<script> 
                alert('adding failed');
                window.history.back();
                                </script>";
            } else {
                echo "<script> 
                alert('added');
                            window.history.back();
                                </script>";
            }
        }
    }
}
}



// delete employees

if (isset($_GET['delete'])) {
    $emp_code = $_GET['delete'];
    $delete_query = "DELETE FROM `wy_employees` WHERE `emp_code` = '$emp_code'";

    $deleted = mysqli_query($con, $delete_query);
    if ($deleted) {
        echo "<script> 
                alert('Record Deleted');
                window.history.back();
                                </script>";
    } else {
        echo "<script>
        alert('Delation Failed');
        window.history.back();
        </script>";
    }
}
