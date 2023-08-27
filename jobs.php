 <?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fonts links  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

  <title>Job Listings</title>
  <link rel="stylesheet" href="jobs.css">
</head>

<body>
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
      <td>  <button class='apply-btn'>Apply Now</button></td>
    
           
          
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
    return cell;
  });

  const applyCell = row.insertCell();
  applyCell.innerHTML = "<button class='apply-btn'>Apply Now</button>";
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

</body>

</html>