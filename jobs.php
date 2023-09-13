<?php
include "connection.php"; // Include your database connection script
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        
 body, html {
  margin: 0;
  padding: 0;

font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  background-color:white;
}

/* whole div of page  */

div.whole{
  display: flex;
  flex-direction: column;
}

/* nav css  */
.red-icon {
    color: #f41d2f;
}

/* Move the hamburger menu to the right */
/*.navbar-toggler {
  order: 1;
}

/* Move the logo to the left */

/* Adjust the spacing between the logo and the hamburger menu */
.navbar-collapse {
  justify-content: flex-end;
  background-color:white;
  margin-top:0px;
  padding:0px;
}

.navbar {
background-color: #ed1010;
color: white;
border-bottom: 2px solid #ed1010;
border-color: #ed1010;
height: 60px;
}
/* Add this CSS to your stylesheet */
.container-fluid {
padding-left: 0%;
}
.navbar-brand {
margin-right: 0;
}

/* Style for the logo image */
img[src="images/logo-modified.png"] {
width: 22%; /* Adjust the width as needed */
height: 81px;
margin-top: 14px; /* Remove all margins */
margin-right: 20px;
padding-left: 0px; /* Remove all padding */
display: inline-block; /* Ensure it doesn't take up extra space */
vertical-align: middle; /* Vertically center the logo within the navbar */
}


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
  /* font-size:'1em; */
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}


li.nav#item{
  font-size:7px;

}


.nav-link.nav-link-ltr.active {
  color: #040708;
  padding: 6px 0 0 0;
  font-size: 15px;
  text-transform: none;
  margin-right: 20px;
  font-weight: normal; /* Add this line to set font weight to normal */
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
.container-fluid{
  height: 10%;
}
/* nav css ends  */

        /* Styles for the container and flex layout */
        div.cont {
            display: flex;
            flex-direction: column;
            margin-top: 60px;
            padding:0px;
            /* width:100%; */
            /* align-items: center; */
        }

        /* Styles for the search bar section */
        .search-bar-section {
            width: 100%;
            background-color: #333;
            padding: 20px;
            /* border-radius: 5px; */
            margin:0px;
            /* margin-bottom: 20px; */
            /* background-color:gray; */
            color: white;
            text-align: center;
           
        }
     

        .search-bar {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            width:90%;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-label {
            font-weight: bold;
             color: white;
            width:100%;
        }
        .form-control{
            width:150%;
        }
        /* Styles for the available jobs section */
        .available-jobs-section {
            /* width: 114%; */
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top:0px;
            padding-top:0px;
        }

        .available-jobs-heading {
         
            color: black;
            /* padding: 10px; */
            text-align: center;
            font-weight: bold;
            width:100%;
        }

        /* .table {
            width: 100%;
            border: 2px solid black;
        } */

        .table th {
            background-color: black;
            color: white;
        }

        .apply-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }


        .apply-btn:hover {
            background-color: darkred;
        }
        @media screen and (max-width:1024px){
          .form-control{
            width:120%;
        }
        .available-jobs-section {
             width: 102%; 
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top:0px;
            padding-top:0px;
        }
        td a{
          font-size:10px;
         
        }

        .apply-btn{
          width:20px;
          background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size:9px;
        }
        .search-bar-section {
            width: 100%;
            background-color: #333;
         
            /* border-radius: 5px; */
            margin:0px;
            margin-top:0px;
            /* margin-bottom: 20px; */
            /* background-color:gray; */
            color: white;
            text-align: center;
           
        }
        .search-bar {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            width:90%;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        table{
          width:100%;
        }

        .nav-link.nav-link-ltr.active{
          font-size: 12px;
        }
        }
        @media screen and (max-width:768px){
          .navbar {
  height: 24%; /* Remove fixed height */
  padding-top: 0; /* Remove top padding */
  padding-bottom: 0; /* Remove bottom padding */
  border-bottom: none; /* Remove border */
  border-bottom: 2px solid #ed1010;
border-color: #eb0505;
}

          .search-bar-section {
            width: 103%;
            background-color: #333;
            padding: 15px;
            /* border-radius: 5px; */
            margin:0px;
            /* margin-bottom: 20px; */
            /* background-color:gray; */
            color: white;
            text-align: center;
          }
          .form-control{
            width:100%;
        }
          table.tab{
            font-size:8px;
        }
        .search-bar {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            width:100%;
            justify-content: space-between;
            margin-bottom: 20px;
        }

          .available-jobs-section {
             /* width: 124%;  */
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top:0px;
            padding-top:0px;
            font-size:10px;
        }
        .apply-btn{
          width:20px;
          background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size:6px;
        }

        table{
          width:80%;
        }
        .navbar-collapse {
  justify-content: flex-end;
  background-color:white;
  margin-top:-18px;
  padding:0px;
}
        }
        @media screen and (max-width:425px){
          .search-bar-section {
            width: 116%;
          }

        div.cont {
            display: flex;
            flex-direction: column;
            margin-top:60px;
            padding:0px;
             width:185%; 
            /* align-items: center; */
        }
        .available-jobs-section {
            width: 116%; 
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top:0px;
            padding-top:0px;
        }
      }
      @media screen and (max-width:375px){

div.cont {
    display: flex;
    flex-direction: column;
    margin-top: 88px;
    padding:0px;
     width:208%; 
    /* align-items: center; */
}
.available-jobs-section {
    width: 116%; 
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    margin-top:0px;
    padding-top:0px;
}
table.tab{
            font-size:8px;
        }
}
   

table.tab{
            font-size:12px;
        }
        @media screen and (max-width:320px){
          .search-bar-section {
            width: 119%;
          }
        }
    </style>
</head>
<body>
    

 

     <!-- navbar starts -->
     <nav id="myNavbar" class="navbar fixed-top navbar-expand-lg text-dark" style="background-color: white;>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Place the logo directly inside the container without any surrounding elements -->
    <img src="images/logo-modified.png" alt="Logo" width="330px" height="80px" class="d-inline-block align-text-top">

  
      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class=" navbar-nav me-auto mb-2 mb-lg-0">
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" aria-current="page" href="index.php#image">  Home
              </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" aria-current="page" href="index.php#pur">Why Jaffer Group
              </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" href="index.php#ceo">Chairman's Message 
            </a>
          </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="index.php#culture">Culture
               </a>
            </li>
          <li class=" nav-item">
            <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="index.php#benefits">Employee Benefits
               </a>
            </li>
            
                <li class=" nav-item">
                    <a class="nav-link nav-link-ltr nav-link active" onclick="closeNavbar()" onclick="closeNavbar()"  href="jobs.php">Job Listing
                       </a>
                    </li>
                   
         
          <!-- <form class=" d-flex" role="search">
            <input class=" form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class=" btn btn-outline-success bg-dark text-light" type="submit"><b>   Search</b>
           </button>
          </form> -->
          
          </ul>
   
          <a href="http://www.youtube.com/channel/UC6B6cyabURnjp1Jr7EmUgoQ/videos?disable_polymer=1" target="_blank">
    <span class="fa-stack fa-lg red-icon">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-play fa-stack-1x fa-inverse" aria-hidden="true" style="left: 1px; font-size: 0.7em;"></i>
    </span>
</a>
<a href="http://www.facebook.com/jaffergroup" target="_blank">
    <span class="fa-stack fa-lg red-icon">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
    </span>
</a>
<a href="http://www.twitter.com/jaffergroup" target="_blank">
    <span class="fa-stack fa-lg red-icon">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
    </span>
</a>
<a href="http://www.linkedin.com/company/jaffer-brothers-pvt-limited" target="_blank">
    <span class="fa-stack fa-lg red-icon">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-linkedin fa-stack-1x fa-inverse" aria-hidden="true"></i>
    </span>
</a>

        </div>
      </div>
    </nav> 
   

<!-- nav ends -->
   
<div class="container-fluid cont">
<div class="search-bar-section">
        <h2>Available Jobs</h2>
        <div class="search-bar">
            <div>
                <label for="titleSearch" class="search-label">Search by Title:</label>
                <input type="text" class="form-control" id="titleSearch">
            </div>
            <div>
                <label for="deptSearch" class="search-label">Search by Department:</label>
                <input type="text" class="form-control" id="deptSearch">
            </div>
            <div>
                <label for="locationSearch" class="search-label">Search by Location:</label>
                <input type="text" class="form-control" id="locationSearch">
            </div>
        </div>
    </div>

    <div class="available-jobs-section container-fluid">
      
        <table border='1' class="table table-striped tab">
            <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Location</th>
                <th>Qualification</th>
                <th>Experience</th>
                <!-- <th>Job Description</th> -->
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT * FROM `jobs`
ORDER BY ID DESC;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $jobID = $row["ID"]; // Fetch the job ID from the database
    if ($jobID !== null) {
        $row["ID"] = $jobID; // Add the ID property to the job object
        $jobArray[] = $row; // Add the job object to the array
    }
    ?>
    <tr>
        <td><?php echo strtoupper($row["Title"]) ?></td>
        <td><?php echo strtoupper($row["Department"]) ?></td>
        <td><?php echo strtoupper($row["Location"]) ?></td>
        <td><?php echo strtoupper($row["MinimumQualification"]) ?></td>
        <td><?php echo strtoupper($row["Experience"]) ?></td>
        <!-- <td class="job-description"><?php echo nl2br(strtoupper($row["JobDescription"])) ?></td> -->
        <td><?php echo strtoupper($row["StartDate"]) ?></td>
        <td><?php echo strtoupper($row["EndDate"]) ?></td>
        <td><a href="apply.php?job_id=<?php echo $jobID; ?>" class="apply-btn"
               data-job-id="<?php echo $jobID; ?>">Apply Now</a></td>
    </tr>
    <?php
}
?>

            <!-- Your PHP loop to populate the table goes here -->
            </tbody>
        </table>
    </div>
    
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(document).ready(function () {
        var table = $('.table').DataTable({
            "order": [], // Disable initial sorting
            "columnDefs": [
                { "orderable": false, "targets": "_all" } // Disable sorting for all columns
            ]
        });

        // Add event listeners to search input fields
        $('#titleSearch, #deptSearch, #locationSearch').on('keyup', function () {
            table
                .columns(0).search($('#titleSearch').val()) // Search the title column (index 0)
                .columns(1).search($('#deptSearch').val())
                .columns(2).search($('#locationSearch').val())
                .draw();
        });
    });
</script>
 

</body>
</html