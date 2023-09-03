<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="mediaqueries5.css">
  <!-- fonts links  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />




  <!-- bootstrap links -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- aos links -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- font font-awesome and font family cdns  -->
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

<!-- aos links  -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


  <title>Job Listings</title>
  <style>
    body, html {
  margin: 0;
  padding: 0;
  /* font-family: 'Josefin Sans', sans-serif; */
  font-family:  serif;
  background-color:white;
}

/* whole div of page  */

div.whole{
  display: flex;
  flex-direction: column;
}

/* nav css  */

.nav-link {
  font-weight: bold;
  /* font-size: 14px; */
  text-transform: uppercase;
  text-decoration: none;
  color:white;
  padding: 10px 0px;
  margin: 0px 7px;
  display: inline-block;
  position: relative;
  opacity: 0.75;
  /* font-size:1em; */
  font-family: 'Josefin Sans', sans-serif;
}

.nav-link:hover {
  opacity: 1;
}
.nav-link::before {
  transition: 300ms;
  height: 3px;
  content: "";
  position: absolute;
  background-color:red;
}

.nav-link-ltr::before {
  width: 0%;
  bottom: 6px;
}

.nav-link-ltr:hover::before {
  width: 100%;
}
li.nav#item{
  font-size:7px;
}
a.nav-link.nav-link-ltr.active{
  color:white;
  font-size: 15px;

}
.nav-toggler{
  display: none;
  color: #ff0000;
}
.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  background-image: var(--bs-navbar-toggler-icon-bg);
  background-repeat: no-repeat;
  background-color: rgb(243, 241, 241);
  background-position: center;
  background-size: 100%;
}
/* nav css ends  */

    body {
      font-family: 'Josefin Sans', sans-serif;
      margin-top: 87px;
      padding: 0;
    }
    h2.job{
      text-align: center;
      font-style:bold;
      font-weight:bolder;
    }

    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 0;
    }

    .container {
      max-width: 100%;
      margin: 0 auto;
      padding: 20px;
      /* background-color: #f2f2f2; */
    }

    table {
      width: 100%;
      /* border-collapse: collapse; */
      margin-top: 20px;
      border: 2px solid black;
    }
tbody{
  background-color: white;
  /* color:black; */
}
tr,td{background-color: white;
  /* color:black; */

}
    th,
    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      
    }

    th {
      background-color: black;
      color: white;
      text-align: center;
    }

    .apply-btn {
      background-color: #ff0000;
      color: #fff;
      padding: 10px 30px;
      border: none;
      cursor: pointer;
      width: 100%;
      height: 30px;
      border-radius:5%;
      /* width: auto; Allow the button to expand based on content */
    }

    form input[type="text"] {
      height: 30px;
      /* Increase the height of the search fields */
    }

    input#submit {
      width: 10%;
      height: 30px;
      background-color: red;
      color: white;
      border-radius: 5px;
    }

    /* media queries  */
    @media screen and (max-width:1024px){


h1{
   font-size: 30px;
   padding-bottom: 20px;
}

 form input[type="text"] {
   height: 30px;
   width: 100px;
   /* Increase the height of the search fields */
 }
}
@media screen and (max-width:768px){
  table{
    width:100%;
  }
  header{
    width:110%;
  }

   h1{
      font-size: 30px;
      padding-bottom: 20px;
   }

    form input[type="text"] {
      height: 25px;
      width: 80px;
      /* Increase the height of the search fields */
    }

    label {
       font-size: 14px;
       margin-bottom: 5px;
     }
     th {
       background-color: black;
       color: white;
       font-size: 11px;
       text-align: center;
     }
     
 
  }
  @media screen and (max-width:425px){
    table#jobs-table{
    width:80%;
  }
    nav{
      width:100%;
    }
   
  th {
      /* background-color: black; */
      /* color: white; */
      font-size: 5px;
      text-align: center;
  }
  h1{
   font-size: 1px;
   padding-bottom: 20px;
}
button.apply-btn{
  width:10px;
  height:10px;
  font-size:7px;
  text-align:center;
}

form input[type="text"] {
   height: 25px;
   width: 70px;
   /* Increase the height of the search fields */
 }
 input#submit {
   width: 20%;
   height: 30px;
   background-color: red;
   color: white;
   border-radius: 5px;
 }
 div.navbar{
  width:100%;
 }
 td{
  font-size:5px;
 }

}
@media screen and (max-width:375px){

  header{
    margin:0px;
    padding-top:0px;
  }
  
    table#jobs-table{
    width:70%;
  }
    nav{
      width:100%;
    }
   
  th {
      /* background-color: black; */
      /* color: white; */
      font-size: 3px;
      text-align: center;
  }
  h1{
   font-size: 1px;
   padding-bottom: 20px;
}
button.apply-btn{
  width:10px;
  height:10px;
  font-size:7px;
  text-align:center;
}

form input[type="text"] {
   height: 25px;
   width: 70px;
   /* Increase the height of the search fields */
 }
 input#submit {
   width: 20%;
   height: 30px;
   background-color: red;
   color: white;
   border-radius: 5px;
 }
 div.navbar{
  width:100%;
 }
 td{
  font-size:5px;
 }
a{
  text-decoration:none;
}
}



  </style>

</head>

<body>
  
     <!-- navbar starts -->
   

   
   
     <nav id="myNavbar" class="navbar fixed-top navbar-expand-lg  text-dark" style="background-color:black;color:white">
    <div class=" container-fluid">
      <!-- <img src="LOGO.png"  alt="Logo" width="60" height="60" class=" d-inline-block align-text-top" > -->
            <span class=" badge mx-2 fs-2" ><img style="border-radius: 50%;" width="50px" height="50px" src="images/navbarlogo.png" ></span>
      <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=" navbar-toggler-icon"></span>
      </button>
      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class=" navbar-nav me-auto mb-2 mb-lg-0">
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" aria-current="page" href="index.php#image"><b>  Home</b>
              </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" aria-current="page" href="index.php#pur"><b>Why Jaffer Group</b>
              </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" href="index.php#ceo"><b>Chairman's Message</b>
            </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="index.php#culture"><b>Culture</b>
               </a>
            </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="index.php#benefits"><b>Employee Benefits</b>
               </a>
            </li>
            
                <li class=" nav-item">
                    <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="#"><b>Job listing</b>
                       </a>
                    </li>
            
          </ul>
          <!-- <form class=" d-flex" role="search">
            <input class=" form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class=" btn btn-outline-success bg-dark text-light" type="submit"><b>   Search</b>
           </button>
          </form> -->
        </div>
      </div>
    </nav> 
<!-- nav ends -->


  
  <header>
    <h1>Open Vaccancies</h1>
    <form id="filter-form">
      <label for="title">Search by Title:</label>
      <input type="text" name="title" id="Title">

      <label for="position">Search by Department:</label>
      <input type="text" name="position" id="Department">

      <label for="city">Search by Location:</label>
      <input type="text" name="city" id="Location">

      <input id="submit" type="submit" value="Search">
    </form>
  </header>

  <div class="container">
    <h2 class="job">Available Jobs</h2>
   
    <table border="1" class="table table-hover text-center" id="jobs-table">
      <thead class="table-dark">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Department</th>
          <th scope="col">Location</th>
          <th scope="col">Minimum Qualification</th>
		  <th scope="col">Experience</th>
		  <th scope="col">Job Description</th>
		  <th scope="col">Start Date</th> <!-- New column -->
    <th scope="col">End Date</th> <!-- New column -->

 <th scope="col">Apply Now</th>
          <!-- <th scope="col">Actions</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `jobs`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["Title"] ?></td>
            <td><?php echo $row["Department"] ?></td>
            <td><?php echo $row["Location"] ?></td>
            <td><?php echo $row["MinimumQualification"] ?></td>
			<td><?php echo $row["Experience"] ?></td>
			<td class="job-description"><?php echo nl2br($row["JobDescription"]) ?></td>

			<td><?php echo $row["StartDate"] ?></td> <!-- Display Start Date -->
      <td><?php echo $row["EndDate"] ?></td> <!-- Display End Date -->
      <td><a href="apply.php?job_id=<?php echo $row['ID']; ?>" class="apply-btn">Apply Now</a></td>

    
           
          
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


<script>
  // Define constants
const filterForm = document.getElementById("filter-form");
const jobsTable = document.getElementById("jobs-table");
const input1 = document.getElementById("Title");
const input2 = document.getElementById("Department");
const input3 = document.getElementById("Location");

// Array to store job data
const jobArray = [];

// Collect job data from the initial table
const rows = document.querySelectorAll('tbody tr');
rows.forEach(row => {
  const tds = row.querySelectorAll('td');
  const jobObject = {
    Title: tds[0].textContent,
    Department: tds[1].textContent,
    Location: tds[2].textContent,
    MinimumQualification: tds[3].textContent,
    Experience: tds[4].textContent,
    JobDescription: tds[5].textContent,
    StartDate: tds[6].textContent,
    EndDate: tds[7].textContent
  };
  jobArray.push(jobObject);
});

// Function to update the jobs table based on filters
function updateJobsTable() {
  resetJobsTable();

  const titleFilter = input1.value.toLowerCase();
  const positionFilter = input2.value.toLowerCase();
  const cityFilter = input3.value.toLowerCase();

  jobArray.forEach(job => {
    const titleMatch = empty(titleFilter) || job.Title.toLowerCase().includes(titleFilter);
    const positionMatch = empty(positionFilter) || job.Department.toLowerCase().includes(positionFilter);
    const cityMatch = empty(cityFilter) || job.Location.toLowerCase().includes(cityFilter);

    if (titleMatch && positionMatch && cityMatch) {
      addJobToTable(job);
    }
  });
}

// Function to reset the jobs table to its original state
function resetJobsTable() {
  while (jobsTable.rows.length > 1) {
    jobsTable.deleteRow(1);
  }
}

// Function to add a job to the jobs table
function addJobToTable(job) {
  const row = jobsTable.insertRow();
  const cells = Object.values(job).map(value => {
    const cell = row.insertCell();
    cell.textContent = value;
    cell.style.backgroundColor = "white"; // Set the background color
    cell.style.color = "black"; // Set the text color
    return cell;
  });

  const applyCell = row.insertCell();
  applyCell.innerHTML = "<button class='apply-btn'>Apply Now</button>";
  applyCell.style.backgroundColor="white";
  
}

// Function to check if a string is empty
function empty(string) {
  return string.trim() === '';
}

// Event listeners for input changes and form submission
input1.addEventListener("input", updateJobsTable);
input2.addEventListener("input", updateJobsTable);
input3.addEventListener("input", updateJobsTable);
filterForm.addEventListener("submit", function (event) {
  event.preventDefault();
  updateJobsTable();
});

  </script>
  <!-- Required Bootstrap JavaScript files -->


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>
function closeNavbar() {
 var navbarToggler = document.querySelector(".navbar-toggler");
 if (navbarToggler.getAttribute("aria-expanded") === "true") {
   navbarToggler.click();
 }
}
   AOS.init();

 </script>

</body>

</html>