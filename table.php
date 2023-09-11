<?php
include "connection.php"; // Include your database connection script
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
        table.tab{
            font-size:10px;
        }
    </style>
</head>
<body>
<div class="available-jobs-section container-fluid">
        <h2 class="available-jobs-heading">Available Jobs</h2>
        <table border='1' class="table table-striped tab">
            <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Location</th>
                <th>Minimum Qualification</th>
                <th>Experience</th>
                <th>Job Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT * FROM `jobs`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $jobID = $row["ID"]; // Fetch the job ID from the database
    if ($jobID !== null) {
        $row["ID"] = $jobID; // Add the ID property to the job object

        // Convert data to uppercase
        $row["Title"] = strtoupper($row["Title"]);
        $row["Department"] = strtoupper($row["Department"]);
        $row["Location"] = strtoupper($row["Location"]);
        $row["MinimumQualification"] = strtoupper($row["MinimumQualification"]);
        $row["Experience"] = strtoupper($row["Experience"]);
        $row["JobDescription"] = strtoupper($row["JobDescription"]);
        $row["StartDate"] = strtoupper($row["StartDate"]);
        $row["EndDate"] = strtoupper($row["EndDate"]);

        $jobArray[] = $row; // Add the job object to the array
    }
    ?>
    <tr>
        <td><?php echo $row["Title"] ?></td>
        <td><?php echo $row["Department"] ?></td>
        <td><?php echo $row["Location"] ?></td>
        <td><?php echo $row["MinimumQualification"] ?></td>
        <td><?php echo $row["Experience"] ?></td>
        <td class="job-description"><?php echo nl2br($row["JobDescription"]) ?></td>
        <td><?php echo $row["StartDate"] ?></td>
        <td><?php echo $row["EndDate"] ?></td>
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
        var table = $('.table').DataTable();

        // Add event listeners to search input fields
        $('#titleSearch, #deptSearch, #locationSearch').on('keyup', function () {
            table
                .columns(0).search($('#titleSearch').val())
                .columns(1).search($('#deptSearch').val())
                .columns(2).search($('#locationSearch').val())
                .draw();
        });
    });
</script>


    
</body>
</html>