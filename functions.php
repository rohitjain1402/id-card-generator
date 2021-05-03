 <?php
 include 'url.php';
 session_start();
// include('vendor/autoload.php');
// if ( $xlsx = SimpleXLSX::parse('100 Sales Records.xlsx') ) {
//   echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
//   foreach( $xlsx->rows() as $r ) {
//     echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
//   }
//   echo '</table>';
//   // or $xlsx->toHTML();  
// } else {
//   echo SimpleXLSX::parseError();
// }
// -----------------------------------------------

// Load the database configuration file
include_once 'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain' );
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $Firstname   = $line[0];
                $Lastname   = $line[1];
                $Address = $line[2];
                $Department  = $line[3];
                $Designation = $line[4];
                $Emp_ID = $line[5];
                $DOB = $line[6];
                $Mobile = $line[7];
                $Emergency = $line[8];
                $Blood_group = $line[9];
                $Dateofissue = $line[10];
                $Dateofexpiry = $line[11];
                $Filename = $line[12];
                // Check whether member already exists in the database with the same email
                //$prevQuery = "SELECT user_id FROM employeedata WHERE Emp_ID = '".$line[4]."'";
               // $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE employeedata SET First name = '".$Firstname."', Lastname = '".$Lastname."', Address = '".$Address."', Department = '".$Department."', Designation = '".$Designation."'  ,Emp_ID = '".$Emp_ID."' DOB = '".$DOB."', Mobile = '".$Mobile."', Emergency = '".$Emergency."',  Blood_group = '".$Blood_group."' , Dateofissue = '".$Dateofissue."' , Dateofexpiry = '".$Dateofexpiry."',  Filename = '".$Filename."' ");
                }else{
                     $db->query("INSERT INTO employeedata (Firstname, Lastname, Address, Department, Designation, Emp_ID, DOB, Mobile, Emergency, Blood_group ,Dateofissue ,Dateofexpiry, Filename) VALUES ('".$Firstname."', '".$Lastname."', '".$Address."', '".$Department."', '".$Designation."', '".$Emp_ID."', '".$DOB."' ,'".$Mobile."', '".$Emergency."', '".$Blood_group."' ,'".$Dateofissue."', '".$Dateofexpiry."' , '".$Filename."' )");
                }
                     
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header('Location: '.BASE_URL.'admin.php'.$qstring);
?>

