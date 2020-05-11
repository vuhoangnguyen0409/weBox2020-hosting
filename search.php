<?php
require("phpnc75_platform.php");
loadLibs(array("none_uni_alias.php"));
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$conn = mysqli_connect($hostname, $hostuser, $hostpass);
$link = mysqli_connect($hostname, $hostuser, $hostpass, $dbname);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM detail as d, category as c WHERE detail_name LIKE ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $link = '/' .$row["cateid"]. '-' .noneUniAlias($row["cate_name"], true). '/' .$row["detailid"]. '-' .noneUniAlias($row["detail_name"], true). '.html';
                    echo '<p><a href="'.$link.'">' . $row["detail_name"] . '</a></p>';
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
//mysqli_close($link);
?>
