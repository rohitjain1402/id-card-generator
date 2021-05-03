<?php
include 'url.php';
session_start();
include_once 'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if(!empty($_GET['status'])){
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.'; 
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
         default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport", content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Form upload</title>
</head>
<body>
<?php if(!empty($statusMsg)){ ?>
 <div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
 </div>
<?php } ?>

 <div class="row">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="functions.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
     <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#User id</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Address</th>
                <th>Department</th>
                <th>Designation(optional)</th>
                <th>Emp ID</th>
                <th>DOB</th>
                <th>Mobile</th>
                <th>Emergency number</th>
                <th>Blood group</th>
                <th>Date of issue</th>
                <th>Date of expiry</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        $result = $db->query("SELECT * FROM employeedata ORDER BY user_id DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['Firstname']; ?></td>
                <td><?php echo $row['Lastname']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['Department']; ?></td>
                <td><?php echo $row['Designation']; ?></td>
                <td><?php echo $row['Emp_ID']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
                <td><?php echo $row['Mobile']; ?></td>
                <td><?php echo $row['Emergency']; ?></td>
                <td><?php echo $row['Blood_group']; ?></td>
                <td><?php echo $row['Dateofissue']; ?></td>
                <td><?php echo $row['Dateofexpiry']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="12">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}

</script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>