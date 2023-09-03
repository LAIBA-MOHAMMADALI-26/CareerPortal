<?php
include "connection.php"; // Include your database connection script

// Initialize variables
$title = $fullName = $dob = $gender = $cnic = $email = $contactNumber = $country = $city = $qualification = $majors = $institute = $passingYear = $experience = $employerName = $designation = $workCountry = $workCity = $totalExperience = $aboutYourself = '';

if (isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    $jobId = $_GET['job_id'];

    // Fetch job details based on job ID
    $sql = "SELECT Title FROM jobs WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $jobId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $title);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
} else {
    // Redirect to job listing if job ID is not provided
    header("Location: job_listing.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    // $id=$_POST['job_id'];
    $title = $_POST["position"];
    $fullName = $_POST["full_name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contact_number"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $qualification = $_POST["qualification"];
    $majors = $_POST["majors"];
    $institute = $_POST["institute"];
    $passingYear = $_POST["passing_year"];
    $employerName = $_POST["employer_name"];
    $designation = $_POST["designation"];
    $workCountry = $_POST["work_country"];
    $workCity = $_POST["work_city"];
    $totalExperience = $_POST["total_experience"];
    $aboutYourself = $_POST["about_yourself"];

    // File upload handling
    $uploadDirectory = 'uploads/'; // Specify the directory where you want to store uploaded files
    $resumeFileName = $_FILES["resume"]["name"];
    $resumeFilePath = $uploadDirectory . $resumeFileName;
    move_uploaded_file($_FILES["resume"]["tmp_name"], $resumeFilePath);

    // Insert data into the database
    $sql = "INSERT INTO apply (ID, Title, CandidateName, DateOfBirth, Gender, CNIC, Email, ContactNo, HomeCountry, HomeCity, LastQualification, Majors, Institute, PassingYear, LastEmployerName, LastDesignation, WorkCountry, WorkCity, Experience, About, CV) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Binding parameters and executing the statement
        mysqli_stmt_bind_param($stmt, "issssssssssssssssssss", $jobId, $title, $fullName, $dob, $gender, $cnic, $email, $contactNumber, $country, $city, $qualification, $majors, $institute, $passingYear, $employerName, $designation, $workCountry, $workCity, $totalExperience, $aboutYourself, $resumeFilePath);
    
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
        } else {
            $success = false;
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }
    
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Include your CSS and other meta tags -->

  <style>
    body{
        font-family:  serif;
    }
    /* Style for form container */
    form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }

    /* Style for form labels */
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: red;
    }

    /* Style for text input fields */
    input[type="text"],
    input[type="email"],
    input[type="file"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      border:1px solid grey;
    }

    /* Style for select dropdown */
    select {
      appearance: none;
      background: url("down-arrow.png") no-repeat right center;
      background-size: 20px;
      padding-right: 30px;
    }

    /* Style for submit button */
    input[type="submit"] {
      background-color: #ff0000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #cc0000;
    }

    /* Style for form section headers */
    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    /* Style for file input label */
    input[type="file"] + label {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ff0000;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="file"] + label:hover {
      background-color: #cc0000;
    }
    /* Modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.7);
  overflow: auto;
}

.modal-content {
  background-color: #fff;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover, .close:focus {
  color: black;
  text-decoration: none;
}

/* Notification styles */
.notification {
  display: none;
  background-color: #4CAF50;
  color: white;
  text-align: center;
  padding: 16px;
  position: fixed;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  z-index: 999;
  width: 100%;
}
h2{
    text-align:center;
}

  </style>
</head>
<body>
<h2>Apply for Job: <?php echo $title; ?></h2>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?job_id=' . $jobId; ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">

  <!-- Position Applying For -->
  <label for="position">Position Applying For *</label>
  <br>
  <input type="text" id="position" name="position" required readonly value="<?php echo $title; ?>">

  <!-- Personal Information -->
  <label for="full_name">Name of Candidate *</label>
  <input type="text" id="full_name" name="full_name" required>

  <label for="dob">Date of Birth *</label>
  <input type="date" id="dob" name="dob" placeholder="mm/dd/yyyy" required>

  <label for="gender">Gender</label>
  <select id="gender" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>

  <label for="cnic">CNIC / ID / Passport No *</label>
  <input type="text" id="cnic" name="cnic" required>

  <label for="email">Email Address *</label>
  <input type="email" id="email" name="email" required>

  <label for="contact_number">Contact Number *</label>
  <input type="text" id="contact_number" name="contact_number" required>

  <label for="country">Home Location - Country *</label>
  <input type="text" id="country" name="country" required>

  <label for="city">Home Location – City *</label>
  <input type="text" id="city" name="city" required>

  <!-- Qualification Information -->
  <label for="qualification">Recent / Last Qualification *</label>
  <input type="text" id="qualification" name="qualification" required>

  <label for="majors">Majors *</label>
  <input type="text" id="majors" name="majors" required>

  <label for="institute">Institute *</label>
  <input type="text" id="institute" name="institute" required>

  <label for="passing_year">Passing Year *</label>
  <input type="text" id="passing_year" name="passing_year" required>

  <!-- Experience Information -->
  <label for="employer_name">Recent / Last Employer Name *</label>
  <input type="text" id="employer_name" name="employer_name" required>

  <label for="designation">Recent / Last Designation *</label>
  <input type="text" id="designation" name="designation" required>

  <label for="work_country">Work Location - Country *</label>
  <input type="text" id="work_country" name="work_country" required>

  <label for="work_city">Work Location – City *</label>
  <input type="text" id="work_city" name="work_city" required>

  <label for="total_experience">Total Experience (in years) *</label>
  <input type="text" id="total_experience" name="total_experience" required>

  <label for="about_yourself">Tell us About Yourself *</label>
  <textarea id="about_yourself" name="about_yourself" required></textarea>

  <!-- Resume Upload -->
  <label for="resume">Upload CV (doc, pdf, image only) *</label>
  <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx">

  <input type="submit" value="Submit Application">
</form>
<div id="success-modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <p>Application successfully submitted!</p>
  </div>
</div>


</body>
<script>
// Get the modal
var modal = document.getElementById('success-modal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// Check if the success flag is set and show the modal
if (<?php echo isset($success) && $success ? 'true' : 'false'; ?>) {
  showModal();
}

// Function to show the modal
function showModal() {
  modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
  modal.style.display = 'none';
}


</script>


</html>
