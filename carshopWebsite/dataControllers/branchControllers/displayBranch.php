<?php
// This controller will display all branch
require_once('C:\xampp\htdocs\carshopWebsite\db_connection.php');
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\carshopWebsite\branchControllers');

// Function to retrieve branches
$viewbranchSql = "SELECT * FROM branch";
$branchlist = $conn->query($viewbranchSql);

if ($branchlist->num_rows > 0) {
    while ($branchlistrow = $branchlist->fetch_assoc()) {
        $branchid = $branchlistrow['branchID'];
        $branchname = $branchlistrow['branchname'];
        $carsold = $branchlistrow['soldcars'];

        $sql = "SELECT COUNT(*) AS car_count FROM customer WHERE branch = '$branchname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $carsold = $row['car_count'];

        echo '<tr>';
        echo '<form method = "POST">';
        echo '<input type="hidden" name="branch_id" value="' . $branchid . '">';
        echo '<input type="hidden" name="branch_name" value="' . $branchname . '">';
        echo '<td>' . $branchname . '</td>';
        echo '<td>' . $carsold . ' sold cars</td>';
        echo '<td>';
        // Edit
        echo "<div class='button-container'>";
        echo "<button type='submit' name='edit_branch' class='tableBtn' id='edit_branch' style='margin-right:5px'>";
        echo "<img src='./images/edit.png' alt='Edit' style='width: 25px; height: 25px; vertical-align: middle;'>";
        echo "<span>Edit</span>";
        echo "</button>";

        // Delete
        echo '<button type="submit" name="delete_branch" style="margin-right:5px" class="tableBtn delete_branch" id="delete_branch"';
        echo 'data-branchid="' . $branchid . '" data-branchname="' . $branchname . '">';
        echo "<img src='./images/delete.png' alt='Delete' style='width: 25px; height: 25px; vertical-align: middle;'>";
        echo "<span>Delete</span>";
        echo '</button>';

        // View
        echo '<button type="submit" name="view_branch" class="tableBtn" id="view_branch" style="margin-right:5px">';
        echo "<img src='./images/view.png' alt='View' style='width: 25px; height: 25px; vertical-align: middle;'>";
        echo "<span>View</span>";
        echo '</button>';
        echo "</div>";

        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="3">No branches</td></tr>';
}
