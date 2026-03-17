<?php
/**
 * Database Configuration using MySQLi (Object-Oriented)
 * Securely establishing a connection to the MySQL Server
 */
print("<h1><center><font face=arial>Welcome to Two Days Workshop on Web Technologies using PHP and Advance PHP</font></center></h1>");
print("<center><font face=arial>13-14 March 2026</font></center>");
print("<p align=center><table>");
print("</tr><td>Resource Person</td><td>Professor Pravin Yannawar</td><td></td><td>Professor Vikas Humbe</td></tr>");
print("</tr><td></td><td>Professor, Department of Computer Science and IT, <br>Dr. B A M University, Chhatrpati Sambhajinagar</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Associate Professor, School of Technology, <br>STRM University, Latur</td></tr>");
print("</table></p>");

// 1. Configuration Constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'rcub');

// 2. Establishing the Connection
// We wrap this in a try-catch or check connect_error for graceful degradation
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// 3. Error Handling: Checking for connection failure
if ($db->connect_error) {
    // In a production environment, log this to a file; do not echo sensitive details
    error_log("Connection failed: " . $db->connect_error);
    exit("Database Connection Error. Please try again later.");
}
else
{
    echo "Note: Database connection Done and Database is in Use";
    // 0. Get the Form data
        $stud_name=$_REQUEST['student_name'];
        $stud_pass=$_REQUEST['student_password']; 
        $stud_course=$_REQUEST['student_course'];
    // to display the records
    // 1. Get the Student ID Automatically 
        $query = "SELECT max(stud_id)+1 as stud_ID FROM student_data";
        $stmt = $db->prepare($query);
        // 2. Bind parameters and execute
        $stmt->execute();

        // 3. Transfer the result set from the MySQL server to PHP
        $result = $stmt->get_result();

        // 4. Iterating through the Result Set
        if ($result->num_rows > 0) 
        {
            // fetch_assoc() moves the internal pointer and returns a row as an associative array
            while ($row = $result->fetch_assoc()) 
                {
                // Sanitize output for XSS protection
                $stud_id = htmlspecialchars($row['stud_ID']);
                }
        // 5. insert the record into the table
            $sql="insert into student_data values(".$stud_id.",'".$stud_name."','".$stud_pass."','".$stud_course."','N')";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            print("<br><font color=green><b>Record inserted successfully..!</b></font>");
        } 
        else 
        {
            echo "No records found for student table.";
        }
    
        // 5. Explicitly free the result memory (Best practice for large datasets)
        $result->free();
        $stmt->close();
}
// 5. Cleanup (Optional, as PHP closes the connection at script end)
//$stmt->close();
$db->close();
print("<br>Please Click <a href=index.php>here</a> to move to source Page");
?>