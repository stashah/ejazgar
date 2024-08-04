<!DOCTYPE html>
<html lang="en">


<head>
    <style>
        .tt td:hover{
            font-size: 30px;
        }
       .tt a:link {
            color: black;

        }

        /* visited link */
      .tt  a:visited {
            color: green;
        }

        /* mouse over link */
       .tt a:hover {
            color: hotpink;
            font-size: 30px;
        }

        /* selected link */
      .tt a:active {
            color: blue;
        }

       .tt a:link {
            text-decoration: none;
        }

       .tt a:visited {
            text-decoration: none;
        }

       .tt a:hover {
            text-decoration: underline;
        }

        .tt a:active {
            text-decoration: underline;
        }
    
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
        include "../../partials/title.php";
    ?>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- for datatable from data tabelfolder-->
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php
        include "../../partials/_navbar.php";
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            <?php
            include "../../partials/_settings-panel.php";
            ?>
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <?php
            include "../../partials/_sidebar.php";
            ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:right">
                                            </div>
                                    <h4 class="card-title">Back Database</h4>
                                    <p class="card-description">
                                        Backup <code>.detabase</code>

                                    </p>

                                    
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');    // 0 or 1 set 1 if unable to download database it will show all possible errors
ini_set('max_execution_time', 0);  // setting 0 for no time limit

define('BACKUP_DIR', './myBackups' ) ;
$username='tahir';
$password='shah.123';
if(isset($_GET['logout'])){    unset($_SESSION['login']);session_destroy(); }
$txtUsername=isset($_POST['txtUsername'])?trim($_POST['txtUsername']):'';
$txtPassword=isset($_POST['txtPassword'])?trim($_POST['txtPassword']):'';
if ( $txtUsername== $username && $txtPassword == $password) {
    $_SESSION['login']=true;
}
if(isset($_SESSION['login'])){
if(isset($_GET['task'])&& $_GET['task']=='clear'){
    $file_name=$_GET['file'];
    $file=BACKUP_DIR.DIRECTORY_SEPARATOR.$file_name;
    if(file_exists($file)){ if(unlink($file)) $rmsg="$file_name Deleted successfully";}
    else { $rmsg="<b>$file_name </b>Not found already removed";}
}

if(isset($_REQUEST['submit'])){
##################### 
//CONFIGURATIONS  
#####################
// Define the name of the backup directory
$host=trim($_POST['host']);
$user=trim($_POST['user']);
$password=trim($_POST['password']);
$database=trim($_POST['database']);
//if(!empty($host)&&!empty($user)&&!empty($password)&&!empty($database))
// Define  Database Credentials
define('HOST', $host ) ; 
define('USER', $user ) ; 
define('PASSWORD', $password ) ; 
define('DB_NAME', $database ) ; 
/*
Define the filename for the sql file
If you plan to upload the  file to Amazon's S3 service , use only lower-case letters 
*/
$fileName = 'mysqlbackup--' . date('d-m-Y') . '@'.date('h.i.s').'.sql' ; 
// Set execution time limit
if(function_exists('max_execution_time')) {
if( ini_get('max_execution_time') > 0 ) 	set_time_limit(0) ;
}

// Check if directory is already created and has the proper permissions
if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ; 

// Create an ".htaccess" file , it will restrict direct accss to the backup-directory . 
$content = 'Allow from all' ; 
$file = new SplFileObject(BACKUP_DIR . '/.htaccess', "w") ;
$file->fwrite($content) ;

$mysqli = new mysqli(HOST , USER , PASSWORD , DB_NAME) ;
if (mysqli_connect_errno())
{
   printf("Connect failed: %s", mysqli_connect_error());
   exit();
}
 // Introduction information
$return='';
 $return .= "--\n";
$return .= "-- A Mysql Backup System \n";
$return .= "--\n";
$return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
$return = "--\n";
$return .= "-- Database : " . DB_NAME . "\n";
$return .= "--\n";
$return .= "-- --------------------------------------------------\n";
$return .= "-- ---------------------------------------------------\n";
$return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
$return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
$tables = array() ; 
// Exploring what tables this database has
$result = $mysqli->query('SHOW TABLES' ) ; 
// Cycle through "$result" and put content into an array
while ($row = $result->fetch_row()) 
{
    $tables[] = $row[0] ;
}
// Cycle through each  table
foreach($tables as $table)
{ 
    // Get content of each table
    $result = $mysqli->query('SELECT * FROM '. $table) ; 
    // Get number of fields (columns) of each table
    $num_fields = $mysqli->field_count  ;
    // Add table information
    $return .= "--\n" ;
    $return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
    $return .= "--\n" ;
    $return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ; 
    // Get the table-shema
    $shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
    // Extract table shema 
    $tableshema = $shema->fetch_row() ; 
    // Append table-shema into code
    $return.= $tableshema[1].";" . "\n\n" ; 
    // Cycle through each table-row
    while($rowdata = $result->fetch_row()) 
    { 
        // Prepare code that will insert data into table 
        $return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
        // Extract data of each row 
        for($i=0; $i<$num_fields; $i++)
        {   
            escape($rowdata[$i];
        }
        // Let's remove the last comma 
        $return = substr("$return", 0, -1) ; 
        $return .= ");" ."\n" ;
    } 
 $return .= "\n\n" ; 
}

function escape($value) {
    $return = '';
    for($i = 0; $i < strlen($value); ++$i) {
        $char = $value[$i];
        $ord = ord($char);
        if($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
            $return .= $char;
        else
            $return .= '\\x' . dechex($ord);
    }
    return $return;
}
// Close the connection
$mysqli->close() ;
$return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ; 
$return .= 'COMMIT ; '  . "\n" ;
$return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ; 
//$file = file_put_contents($fileName , $return) ; 
$zip = new ZipArchive() ;
$resOpen = $zip->open(BACKUP_DIR . '/' .$fileName.".zip" , ZIPARCHIVE::CREATE) ;
if( $resOpen ){
$zip->addFromString( $fileName , "$return" ) ;
    }
$zip->close() ;
$fileSize = get_file_size_unit(filesize(BACKUP_DIR . "/". $fileName . '.zip')) ; 
// Function to append proper Unit after file-size . 
}

?>
<section class="forms">
  <div class="container-fluid">
         
  <div class="row">
            <div class="col-lg-12">
              
                
                
<div class="backup_main">
   
    <div class="main">
                    <div class="overlay"><div class="overlay-load"><div class="overlay-msg">
                      Please wait database backup is being generated. It may take a few minute depending on database size, please do not refresh or close the browser window.        
                </div></div></div>
        
            <form name="backup" id="backup" method="post">
              <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Host:</label>
                      <div class="col-sm-10">
                        <input type="text" name="host" value="sql213.infinityfree.com" class="form-control" />
                      </div>
                    </div>
              <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Database name:</label>
                      <div class="col-sm-10">
                        
                        <input type="text" name="database" value="if0_34969300_ejazshop1" class="form-control" />
                      </div>
                    </div>
                <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Database User:</label>
                      <div class="col-sm-10">
                        <input type="text" name="user" value="if0_34969300" class="form-control" />
                      </div>
                    </div>
                <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Database Password:</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" value="PpQCRRBbXkj1C" class="form-control"/>
                      </div>
                    </div>
                <div class="form-group row">
                     
                      <div class="col-sm-12">
                        <input onclick="vky(this)" type="submit" id="getdb" name="submit" value="Get database" class="btn btn-primary pull-right " />
                      </div>
                    </div>
               
                
                
            </form>
        
    </div> 
  
    <script type="text/javascript">
    function vky(x){
        x.value='Wait processing..';
        document.getElementsByClassName("overlay")[0].style.display="block";
    }
    </script>
  
  
   <div class="line"></div>
    <div class="backup_list">
        <div class=""><?php echo isset($rmsg)?$rmsg:''; ?></div>
        <?php echo display_download(BACKUP_DIR); ?>
    </div>   
</div>
                
              
    </div>
  </div>
  </div>
  </section>
<?php }else{ 
?>
<section class="forms">
  

       
            <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
              <div class="form-group row">
                      <strong><label >Username:</label></strong>
                      <input type="text" title="Enter your Username" name="txtUsername" value="tahir" class="form-control"/>
               </div>
                <div class="form-group row">
                  <strong><label >Password:</label></strong>
                      <input type="password" title="Enter your password" name="txtPassword" value="shah.123" class="form-control" />
               </div>
              <div class="col-sm-12">
                <input type="submit" name="Submit" value="Login" class="btn btn-primary pull-right " />
                        
                      </div>
                
                
                
            </form> 
        <i>Contact Administrator</i>
  
        
  </section>              

<?php } ?>
<style type="text/css">
/* HTML5 display-role reset for older browsers */

a.tooltips {  position: relative;  display: inline;}
a.tooltips span {position: absolute;width:140px;color: #000000;background: #FFFFFF;border: 2px solid #CCCCCC;height: 32px;line-height: 32px;text-align: center;visibility: hidden;border-radius: 6px;box-shadow: 0px 0px 7px #808080;}
a.tooltips span:before {content: '';position: absolute;top: 100%;left: 50%;margin-left: -12px;width: 0; height: 0;border-top: 12px solid #CCCCCC;border-right: 12px solid transparent;border-left: 12px solid transparent;}
a.tooltips span:after {content: '';position: absolute;top: 100%;left: 50%;margin-left: -8px;width: 0; height: 0;border-top: 8px solid #FFFFFF;border-right: 8px solid transparent;border-left: 8px solid transparent;}
a:hover.tooltips span {visibility: visible;opacity: 1;bottom: 30px;left: 50%;margin-left: -76px;z-index: 999;}
.logout{text-align: right;width:100%;height: 25px;background: #1A1111;line-height: 25px;}
.logout a{color:#fff;margin-right: 50px;}
/*.overlay{position: absolute;width:100%;height: 100%;background: red;opacity: .50;top:0px;left: 0px;display: none;}*/
.overlay {display: none;position: absolute;width: 100%;height: 100%;top: 0px;left: 0px;background: #ccc;z-index: 1001;opacity: .95;}
.overlay-load {width: 350px;height: 100px;margin: auto;top: 0px;bottom: 0px;position: absolute;left: 0px;right: 0px;
           border: solid 1px #060522;text-align: center;
           
background-repeat: no-repeat;          
}
.overlay-msg{margin-bottom: 10px;bottom: 0px;position: absolute;font-style: italic;color: rgb(19, 19, 19);}             
</style>
<?php 
function get_file_size_unit($file_size){
switch (true) {
    case ($file_size/1024 < 1) :
        return intval($file_size ) ." Bytes" ;
        break;
    case ($file_size/1024 >= 1 && $file_size/(1024*1024) < 1)  :
        return intval($file_size/1024) ." KB" ;
        break;
	default:
	return intval($file_size/(1024*1024)) ." MB" ;
}
}
function display_download($BACKUP_DIR){
$msg='';
$msg.='<h2>Backup List</h2>
 <table id="example" class="table table-bordered table-hover table-striped dataTable"  style="width:100%"><thead><tr><th>File</th><th>Size</th><th>&nbsp;</th></tr> 
</thead><tbody>';
$downloads=getDownloads($BACKUP_DIR);
if(count($downloads)>0)
foreach ($downloads as $k => $v) {
$msg.= '<tr><td>'.$v['name'].'</td><td>'.$v['size'].'</td><td>
<a class="tooltips mdi mdi-cloud-download" href="'.BACKUP_DIR . "/". $v['name'] .'" target="_blank"><span>Click to download</span></a>
&nbsp;|&nbsp;<a onclick="return confirm(\'Are you sure want to remove this file ?\')" class="tooltips mdi mdi-delete" href="index.php?task=clear&file='.$v['name'].'"><span>Click to Remove</span></a>
</td></tr>';   
}
return $msg.='</tbody></table>';
}
function getDownloads($dir="./myBackups"){
    if (is_dir($dir)){
    $dh  = opendir($dir);
    $files=array();
    $i=0;
    $xclude=array('.','..','.htaccess');
    while (false !== ($filename = readdir($dh))) {
       if(!in_array($filename, $xclude))
       {
        $files[$i]['name'] = $filename;
        $files[$i]['size'] = get_file_size_unit(filesize($dir.'/'.$filename));
        $i++;
       }
    }
    return $files;
}}?>
<?php require '../../assets/footer.php'?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                            BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="jquery.js"></script>

    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>




    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->

    <script src="jqajax.js"></script>
    <!-- from datatable folder-->

    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</body>

</html>