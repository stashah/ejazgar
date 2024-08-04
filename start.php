<?php
session_start();

// Initialize variables
$message = '';

// Include PDO connection (ensure this file is secure and not publicly accessible)
require 'assets/pdo.php';

// Check if user is already logged in
if (!empty($_SESSION["logindetailsshop"])) {
    header("Location: pages/dash/");
    exit();
} else {
    // Handle form submission
    if (isset($_POST['iduname']) && isset($_POST['idpassword'])) {
        $message = "Clicked";

        // Sanitize user inputs
        $username = htmlspecialchars($_POST['iduname']); // Example of input sanitization
        $password = htmlspecialchars($_POST['idpassword']); // Example of input sanitization
        $shopno = $_POST['idShop'];

        try {
            // Validate inputs
            if (!empty($username) && !empty($password)) {

                // Prepare SQL statement with placeholders to prevent SQL injection
                $sql = 'SELECT userid AS id, name AS name, username AS uname, usertype AS urole FROM shopusers WHERE username=:username AND password=:password';
                
                // Prepare statement
                $statement = $connection->prepare($sql);

                // Execute statement with bound parameters
                $statement->execute([':username' => $username, ':password' => $password]);

                // Fetch results
                $credential = $statement->fetchAll(PDO::FETCH_OBJ);

                // Initialize variables for user details
                $name = "";
                $id = "";
                $role = "";

                // Process fetched credentials
                foreach ($credential as $credent) {
                    $name = $credent->name;
                    $role = $credent->urole;
                    $id = $credent->id;
                }

                // Check if credentials matched
                if (!empty($credential)) {
                    // Store user details in session (ensure sensitive data is handled securely)
                    $emparray = array(
                        'id' => $id,
                        'name' => $name,
                        'role' => $role,
                        'shop' => $shopno
                    );

                    $_SESSION["logindetailsshop"] = $emparray;

                    // Redirect user after successful login
                    header("Location: pages/dash/");
                    exit();
                } else {
                    // Display error message for invalid credentials (prevent detailed error messages in production)
                    $message = '<div class="p-3 mb-2 bg-danger text-white">Invalid username or password..</div>';
                }
            } else {
                // Display warning message if fields are not filled (improve UX by providing clear instructions)
                $message = '<div class="p-3 mb-2 bg-warning text-white">Fill all fields...</div>';
            }
        } catch (PDOException $e) {
            // Handle database errors (log or display generic error message)
            echo "Error: " . $e->getMessage();
            // Log the error instead of displaying it in production
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ejaz Garments </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>
              <!-- Display messages from server-side validation or authentication -->
              <div id="msg"><?= $message ?></div>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <!-- Dropdown for selecting shop (ensure default option is secure and validated) -->
                  <select id="idShop" name="idShop" class="form-control form-control-lg">
                    <option value="1">Shop 1</option>
                    <option value="2">Shop 2</option>
                  </select>
                  <br>
                  <!-- Input field for username (sanitized on server-side) -->
                  <input type="text" class="form-control form-control-lg" id="iduname" name="iduname" placeholder="Username">
                </div>
                <div class="form-group">
                  <!-- Input field for password (sanitized on server-side) -->
                  <input type="password" class="form-control form-control-lg" id="idpassword" name="idpassword" placeholder="Password">
                </div>
                <div class="mt-3">
                  <!-- Submit button for form submission -->
                  <input class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" id="btnLogin" name="btnLogin" value="Sign In"/>
                </div>

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <!-- Link for password recovery (ensure security practices are followed) -->
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>
