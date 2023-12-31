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
    $lastdropsalary=$_POST['last_drop_salary'];
    $grosssalary=$_POST['expected_salary'];
    // File upload handling
    $uploadDirectory = 'uploads/'; // Specify the directory where you want to store uploaded files
    $resumeFileName = $_FILES["resume"]["name"];
    $resumeFilePath = $uploadDirectory . $resumeFileName;
    move_uploaded_file($_FILES["resume"]["tmp_name"], $resumeFilePath);

    // Insert data into the database
    $sql = "INSERT INTO apply (ID, Title, CandidateName, DateOfBirth, Gender, CNIC, Email, ContactNo, HomeCountry, HomeCity, LastQualification, Majors, Institute, PassingYear, LastEmployerName, LastDesignation,LastDropSalary,GrossSalary, WorkCountry, WorkCity, Experience, About, CV) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Binding parameters and executing the statement
        mysqli_stmt_bind_param($stmt, "issssssssssssssssssssss", $jobId, $title, $fullName, $dob, $gender, $cnic, $email, $contactNumber, $country, $city, $qualification, $majors, $institute, $passingYear, $employerName, $designation,
        $lastdropsalary,$grosssalary, $workCountry, $workCity, $totalExperience, $aboutYourself, $resumeFilePath);
    
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
    body {
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    /* Style for form container */
    form {
      max-width:90%;
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
      border: 1px solid grey;
      font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
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
      background-color: rgba(0, 0, 0, 0.7);
      overflow: auto;
    }

    .modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
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

    /* Additional style for invalid input fields */
    .invalid-input {
      border: 2px solid red;
    }
    /* Style for form rows */
.form-row {
  display: flex;
  justify-content: space-between;
  margin
}
/* Style for form rows */
.form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

/* Style for form groups (each field and its label) */
.form-group {
  flex: 1;
  margin-right: 10px; /* Adjust the spacing between fields */
}

/* Ensure the last form group doesn't have extra margin */
.form-row:last-child .form-group {
  margin-right: 0;
}

/* Style for text input fields */
input[type="text"],
input[type="email"],
input[type="file"],
select,
textarea {
  width: 80%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  border: 1px solid grey;
}
.header-container {
      display: flex;
      align-items: center;
    }

    /* Style for the h2 heading */
    h1 {
    
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
      text-align: center;
    
      /* margin-left: 0px;  */
      /* Add some spacing between the logo and heading */
    }
    /* Custom style for wider input fields */
.wide-input {
  width: 85%;/* Adjust the width as needed */
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 16px;
  border: 1px solid grey;
}
 /* Style for the custom dropdown container */
 .custom-dropdown {
            position: relative;
            width: 100%;
        }

        /* Style for the hidden select element */
        .custom-dropdown select {
            appearance: none; /* Remove default appearance */
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background: transparent;
            cursor: pointer;
        }

        /* Style for the arrow indicator */
        .custom-dropdown::after {
            content: "\25BC"; /* Downward-pointing triangle character */
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none; /* Ensure the arrow doesn't interfere with clicks on the select */
        }

  </style>
</head>

<body>
<div class="header-container">
  <!-- Add a logo image here -->
  <img src="images/jafferlogo.png" alt="Your Logo" width="100" height="100">
  <h1>Apply for Job:<?php echo strtoupper($title); ?></h1>
</div>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?job_id=' . $jobId; ?>" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="job_id" value="<?php echo $jobId; ?>">

  <!-- Position Applying For -->
  <label for="position">Position Applying For *</label>
  <br>
  <input type="text" id="position" name="position" required readonly value="<?php echo $title; ?>">

 <!-- Full Name (CandidateName) and Date of Birth (DateOfBirth) -->
<div class="form-row">
  <div class="form-group">
    <label for="full_name">Name of Candidate *</label>
    <input type="text" id="full_name" name="full_name" class="letters-only" pattern="^[a-zA-Z. ]+$" required placeholder="Your Name" maxlength="20">
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth *</label>
    <input type="date" id="dob" name="dob" class="wide-input" required>
  </div>
</div>

<!-- Gender and CNIC -->
<div class="form-row">
  <div class="form-group">
    <label for="gender">Gender</label>
    <select class="wide-input" id="gender" name="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="cnic">CNIC *</label>
    <input type="text" id="cnic" name="cnic" class="num-and-hyphen" pattern="^\d{5}-\d{7}-\d$" required placeholder="12345-1234567-1" maxlength="15">
  </div>
</div>

<!-- Email Address (Email) and Contact Number (ContactNo) -->
<div class="form-row">
  <div class="form-group">
    <label for="email">Email Address *</label>
    <input type="email" id="email" name="email" required placeholder="example@example.com" maxlength="50">
  </div>
  <div class="form-group">
    <label for="contact_number">Contact Number *</label>
    <input type="text" id="contact_number" class="num-only" name="contact_number" pattern="^03\d{9}$" required placeholder="03XXXXXXXXX" maxlength="11">
  </div>
</div>

<!-- Home Country (HomeCountry) and Home City (HomeCity) -->
<div class="form-row">
  <div class="form-group">
    <label for="country">Home Location - Country *</label>
    <input type="text" id="country" name="country" class="letters-only" required placeholder="Pakistan" maxlength="15">
  </div>
  <div class="form-group">
    <label for="city">Home Location – City *</label>
    <input type="text" id="city" name="city" class="letters-only" required placeholder="Karachi" maxlength="15">
  </div>
</div>

<!-- Last Qualification (LastQualification) and Majors -->
<div class="form-row">
  <div class="form-group">
    <label for="qualification">Recent / Last Qualification *</label>
    <!-- <select class="wide-input" id="qualification" name="qualification" class="letters-only" required placeholder="Bachelor's Degree" maxlength="20"> -->
      
    
    <input type="text" id="qualification" name="qualification" class="letters-only" required placeholder="Bachelor's Degree" maxlength="20">
  </div>
  <div class="form-group">
    <label for="majors">Majors *</label>
    <input type="text" id="majors" name="majors" class="letters-only" pattern="^[a-zA-Z. ]+$" required placeholder="Computer Science" maxlength="50">
  </div>
</div>

<!-- Institute and Passing Year (PassingYear) -->
<div class="form-row">
  <div class="form-group">
    <label for="institute">Institute *</label>
    <input type="text" id="institute" name="institute" class="letters-only" pattern="^[a-zA-Z. ]+$" required placeholder="ABC University" maxlength="20">
  </div>
  <div class="form-group">
    <label for="passing_year">Passing Year *</label>
    <input type="number"class="wide-input" id="passing_year" name="passing_year" min="1900" max="2099" step="1" required placeholder="YYYY" maxlength="4">
  </div>
</div>

<!-- Last Employer Name (LastEmployerName) and Last Designation (LastDesignation) -->
<div class="form-row">
  <div class="form-group">
    <label for="employer_name">Recent / Last Employer Name *</label>
    <input type="text" id="employer_name" name="employer_name" class="letters-only" required placeholder="XYZ Corporation" maxlength="10">
  </div>
  <div class="form-group">
    <label for="designation">Recent / Last Designation *</label>
    <input type="text" id="designation" name="designation" class="letters-only" required placeholder="Software Engineer" maxlength="10">
  </div>
</div>
<!-- Gross Salary and Last Drop Salary -->
<div class="form-row">
  <div class="form-group">
    <label for="gross_salary">Last Gross Salary *</label>
    <input type="text" id="gross_salary" name="gross_salary" class="number-only" required maxlength="7" placeholder="Enter Gross Salary (Numeric, up to 7 digits)">
  </div>
  <div class="form-group">
    <label for="Expected Salary">Expected Salary *</label>
  <input type="text" id="Expected_Salary" name="expected_salary" class="number-only" required maxlength="7" placeholder="Enter Expected Salary (Numeric, up to 7 digits)">
  </div>
</div>



<!-- Work Country (WorkCountry) and Work City (WorkCity) -->
<div class="form-row">
  <div class="form-group">
    <label for="work_country">Work Location - Country *</label>
    <input type="text" id="work_country" name="work_country" class="letters-only" required placeholder="United States" maxlength="15">
  </div>
  <div class="form-group">
    <label for="work_city">Work Location – City *</label>
    <input type="text" id="work_city" name="work_city" class="letters-only" required placeholder="New York" maxlength="15">
  </div>
</div>

<!-- Total Experience (Experience) and About Yourself (About) -->
<div class="form-row">
  <div class="form-group">
    <label for="total_experience">Total Experience (in years) *</label>
    <input type="text" id="total_experience" name="total_experience" min="0" class="num-only" max="99" required placeholder="0" maxlength="2">
  </div>
  <div class="form-group">
    <label for="about_yourself">Tell us About Yourself *</label>
    <textarea id="about_yourself" name="about_yourself" class="letters-only" placeholder="Briefly describe yourself (100 words)" pattern="^[a-zA-Z. ]+$" required maxlength="100"></textarea>
  </div>
</div>

<!-- Resume Upload -->
<div class="form-row">
  <div class="form-group">
    <label for="resume">Upload CV (doc, pdf only) *</label>
    <input type="file" id="resume" name="resume" accept=".doc,.docx,.pdf" required>
  </div>
</div>

<!-- Submit Button -->
<div class="form-row">
  <div class="form-group">
    <input type="submit" value="Submit Application">
  </div>
</div>

<!-- <input type="submit" value="Submit Application"> -->
</form>

<div id="success-modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <p>Application successfully submitted!</p>
  </div>
</div>

</body>


<script>
  // console.log("hello");
  // JavaScript to allow only letters and characters in specified input fields
const letterInputFields = document.querySelectorAll('.letters-only');

letterInputFields.forEach((field) => {
  field.addEventListener('input', function () {
    // Remove any non-letter and non-character characters
    this.value = this.value.replace(/[^a-zA-Z. ]/g, '');

    // Display a prompt if numbers are entered
    if (/[^a-zA-Z. ]/.test(this.value)) {
      alert('Only letters and characters are allowed. Numbers are not permitted.');
      this.value = this.value.replace(/[^a-zA-Z. ]/g, ''); // Remove numbers
    }
  });
});



const numberAndHyphenInputFields = document.querySelectorAll('.num-and-hyphen');
numberAndHyphenInputFields.forEach((field) => {
  field.addEventListener('input', function () {
    // Remove any non-numeric characters and hyphens
    this.value = this.value.replace(/[^\d-]/g, '');

    // Display a prompt if non-numeric characters are entered
    if (/[^\d-]/.test(this.value)) {
      alert('Only numbers and hyphens are allowed in this field.');
      this.value = this.value.replace(/[^\d-]/g, ''); // Remove non-numeric characters and hyphens
    }
  });
});

const numberInputFields = document.querySelectorAll('.num-only');
numberInputFields.forEach((field) => {
  field.addEventListener('input', function () {
    // Remove any non-numeric characters
    this.value = this.value.replace(/[^\d]/g, '');

    // Display a prompt if non-numeric characters are entered
    if (/[^\d]/.test(this.value)) {
      alert('Only numbers are allowed in this field.');
      this.value = this.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
    }
  });
});
// Numeric input and max length validation for Gross Salary and Last Drop Salary
const numInputFields = document.querySelectorAll('.number-only');

numInputFields.forEach((field) => {
  field.addEventListener('input', function () {
    // Remove any non-numeric characters
    this.value = this.value.replace(/[^\d]/g, '');

    // Disable input after 7 characters
    if (this.value.length >= 7) {
      this.value = this.value.slice(0, 7); // Truncate to 7 characters
      this.setAttribute('maxlength', '7'); // Set maxlength to 7 to prevent further input
    } else {
      this.removeAttribute('maxlength'); // Remove maxlength to allow input
    }
  });
});







// Get the modal
var modal = document.getElementById('success-modal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// Check if the success flag is set and show the modal
if (<?php echo (isset($success) && $success) ? 'true' : 'false'; ?>) {
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
