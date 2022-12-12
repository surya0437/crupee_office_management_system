<?php
require_once 'header.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        require_once 'sidenav.php';
        ?>

        <div id="content">
            <?php
            require_once 'topnav.php';
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            ?>


            <div class="h4_">
                <h3>Employees</h3>
            </div>
            <div class="bg_">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <span class="h4_">
                                <h4>Employees Lists</h4>
                            </span>
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-primary btn-sm btn-notice-add" data-toggle="modal" data-target="#myModal">Add Employee</button>
                            <table id="table" data-show-columns="true">
                                <div class="table-view"></div>
                            </table>
                            <!--Creating jQuery Script for Search, Pagination and More-->

                            <div class="fixed-table-container mt-5" style="padding-bottom: 0px;">
                                <div class="fixed-table-header" style="display: none;">
                                    <table></table>
                                </div>
                                <div class="fixed-table-body">

                                    <table id="table" data-show-columns="true" class="table table-bordered table-hover">

                                        <thead class="">
                                            <tr>
                                                <th data-field="num">
                                                    <div class="th-inner sortable both">S.N</div>
                                                </th>
                                                <th data-field="department">
                                                    <div class="th-inner sortable both">Emp Code</div>
                                                </th>
                                                <th data-field="ref_needed">
                                                    <div class="th-inner sortable both">Name</div>
                                                </th>
                                                <th data-field="flname">
                                                    <div class="th-inner sortable both">Gender</div>
                                                </th>
                                                <th data-field="date">
                                                    <div class="th-inner sortable both">Address</div>
                                                </th>
                                                <th data-field="date">
                                                    <div class="th-inner sortable both">Email</div>
                                                </th>
                                                <th data-field="task_title">
                                                    <div class="th-inner sortable both">Merital Status</div>
                                                </th>
                                                <th data-field="title_desc">
                                                    <div class="th-inner sortable both">Nationality</div>
                                                </th>
                                                <th data-field="task_phase">
                                                    <div class="th-inner sortable both">Department</div>
                                                </th>
                                                <th data-field="task_progress">
                                                    <div class="th-inner sortable both">Pan No.</div>
                                                </th>
                                                <th data-field="issue_recorded">
                                                    <div class="th-inner sortable both">Bank Name</div>
                                                </th>
                                                <th data-field="task_status">
                                                    <div class="th-inner sortable both">Account No.</div>
                                                </th>
                                                <th data-field="view">
                                                    <div class="th-inner sortable both">Settings</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once '../controller/config.php';
                                            $sn = 0;
                                            $select = "SELECT * FROM `wy_employees`";
                                            $result = mysqli_query($con, $select);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $emp_code = $row['emp_code'];
                                                $name = $row['first_name'] . " " . $row['last_name'];
                                                $gender = $row['gender'];
                                                $address = $row['address'];
                                                $email = $row['email'];
                                                $merital_status = $row['merital_status'];
                                                $nationality = $row['nationality'];
                                                $department = $row['department'];
                                                $pan_no = $row['pan_no'];
                                                $bank_name = $row['bank_name'];
                                                $account_no = $row['account_no'];
                                                $sn++;
                                            ?>
                                                <tr data-index="">
                                                    <td><?php echo $sn; ?> </td>
                                                    <td><?php echo $emp_code; ?> </td>
                                                    <td><?php echo $name; ?> </td>
                                                    <td><?php echo $gender; ?> </td>
                                                    <td><?php echo $address; ?> </td>
                                                    <td><?php echo $email; ?> </td>
                                                    <td><?php echo $merital_status; ?> </td>
                                                    <td><?php echo $nationality; ?> </td>
                                                    <td><?php echo $department; ?> </td>
                                                    <td><?php echo $pan_no; ?> </td>
                                                    <td><?php echo $bank_name; ?> </td>
                                                    <td><?php echo $account_no; ?> </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="add-employee-logic.php?delete=<?php echo $emp_code; ?>" onclick="return confirm('Are you sure?')">
                                                                <input class="btn btn-outline-danger btn-sm" type="submit" name="" value="Delete">
                                                            </a>
                                                            <input class="btn btn-outline-primary btn-sm ms-5" type="submit" name="add" value="Edit">
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="fixed-table-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content close -->

    </div><!-- wrapper close -->

    <!--Start Add Task Modal-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-ml">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Employee</h2>
                </div>
                <div class="modal-body">
                    <form id="fupForm" name="form1" method="post" action="add-employee-logic.php">
                        <!-- <form id="fupForm" name="form1" method="post" action="add-employee-logic.php"> -->
                        <div class="form-group">
                            <label>Employee code:</label>
                            <input type="text" class="form-control" id="code" name="emp_code" placeholder="Enter Employee Code">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="lname" name="emp_password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" class="form-control" id="fname" name="first_name" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" id="lname" name="last_name" placeholder="Enter last Name">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth:</label>
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth (M/D/Y)">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <select id="title" class="form-control" name="gender">
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merital status:</label>
                            <select id="title" class="form-control" name="merital_status">
                                <option value='Single'>Single</option>
                                <option value='Married'>Married</option>
                                <option value='Unmarried'>Unmarried</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Nationality:</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" class="form-control" id="Address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label>City:</label>
                            <input type="text" class="form-control" id="City" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label>State:</label>
                            <input type="text" class="form-control" id="State" name="state" placeholder="State">
                        </div>
                        <div class="form-group">
                            <label>Country:</label>
                            <input type="text" class="form-control" id="Country" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Mobile No.:</label>
                            <input type="text" class="form-control" id="Mobile" name="mobile" placeholder="Mobile No">
                        </div>
                        <div class="form-group">
                            <label>Telephone No.:</label>
                            <input type="text" class="form-control" id="Telephone" name="telephone" placeholder="Telephone No">
                        </div>
                        <div class="form-group">
                            <label>Identity DOC.:</label>
                            <input type="text" class="form-control" id="Identity_DOC" name="identity_doc" placeholder="Identity DOC">
                        </div>
                        <div class="form-group">
                            <label>Identity No.:</label>
                            <input type="text" class="form-control" id="Identity_No" name="identity_no" placeholder="Identity No">
                        </div>
                        <div class="form-group">
                            <label>Employee Type:</label>
                            <input type="text" class="form-control" id="Employee_Type" name="emp_type" placeholder="Employee Type">
                        </div>
                        <div class="form-group">
                            <label>Joining Date:</label>
                            <input type="text" class="form-control" id="Joining_Date" name="joining_date" placeholder="Joining Date">
                        </div>
                        <div class="form-group">
                            <label>Blood Group:</label>
                            <input type="text" class="form-control" id="Blood_Group" name="blood_group" placeholder="Blood Group">
                        </div>
                        <div class="form-group">
                            <label>Dedsignation:</label>
                            <input type="text" class="form-control" id="Dedsignation" name="designation" placeholder="Dedsignation">
                        </div>
                        <div class="form-group">
                            <label>Department:</label>
                            <input type="text" class="form-control" id="Department" name="department" placeholder="Department">
                        </div>
                        <div class="form-group">
                            <label>Pan No.:</label>
                            <input type="text" class="form-control" id="Pan" name="pan_no" placeholder="Pan No">
                        </div>
                        <div class="form-group">
                            <label>Bank Name:</label>
                            <input type="text" class="form-control" id="Bank_Name" name="bank_name" placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <label>Account No.:</label>
                            <input type="text" class="form-control" id="Account_No" name="account_no" placeholder="Account No">
                        </div>
                        <!-- <div class="form-group">
                            <label>Photo:</label>
                            <input type="text" class="form-control" id="progress" placeholder="Enter">
                        </div> -->
                        <!--Alert-->
                        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        </div>

                        <div class="modal-footer">
                            <input class="btn btn-outline-primary btn-sm" type="submit" name="add" value="Add">
                            <button id="task-close-me" type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Add Task Modal -->




    <?php
    require_once 'footer.php';
    ?>
</body>

</html>