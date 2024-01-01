

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand">Pet Services</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Login</h2>
        <form action="/login" method="post">
          <div class="form-group mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
          </div>
          <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
          </div>
          <div class="form-group mb-3">
            <label for="role">Login As:</label>
            <select class="form-control" id="role" name="role" required>
              <option value="customer">Customer</option>
              <option value="pet_sitter">Pet Sitter</option>
              <option value="manager">Manager</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name ="signin">Login</button>
        </form>
      </div>
    </div>
  </div>

  <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
      <p class="text-center text-body-secondary">&copy; 2023 Database Project</p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
// Assuming you have a database connection, replace these variables with your actual database connection details
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Perform authentication based on the selected role
    $table = "";
    $redirectPage = "";

    switch ($role) {
        case "customer":
            $table = "customers";
            $redirectPage = "customer_dashboard.php";
            break;
        case "pet_sitter":
            $table = "petsitters";
            $redirectPage = "pet_sitter_dashboard.php";
            break;
        case "manager":
            $table = "admins";
            $redirectPage = "manager_dashboard.php";
            break;
        default:
            // Handle other cases or show an error message
            break;
    }

    // Query to check if the username and password match in the selected table
    $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Successful login, redirect to the corresponding dashboard
        header("Location: $redirectPage");
        exit();
    } else {
        // Invalid login, handle accordingly (e.g., display an error message)
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();
?>