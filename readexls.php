<?php
/**
 * Professional CSV Reader using Stream Processing
 * Secure and Memory-Efficient
 */

$filename = './stud_data.csv';
print("<h1><center><font face=arial>Welcome to Two Days Workshop on Web Technologies using PHP and Advance PHP</font></center></h1>");
print("<center><font face=arial>13-14 March 2026</font></center>");
print("<p align=center><table>");
print("</tr><td>Resource Person</td><td>Professor Pravin Yannawar</td><td></td><td>Professor Vikas Humbe</td></tr>");
print("</tr><td></td><td>Professor, Department of Computer Science and IT, <br>Dr. B A M University, Chhatrpati Sambhajinagar</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Associate Professor, School of Technology, <br>STRM University, Latur</td></tr>");
print("</table></p>");

echo "".$filename;
// 1. Open the file for reading ('r' mode)
// fopen returns a resource pointer
if (($handle = fopen($filename, "r")) !== FALSE) {
    
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";

    $isHeader = true;

    // 2. Loop through each row using fgetcsv
    // fgetcsv(resource, length, separator, enclosure)
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "<tr>";
        
        foreach ($data as $cell) {
            // Logic: Distinguish between Header (th) and Data (td)
            $tag = $isHeader ? 'th' : 'td';
            
            // 3. Security: Sanitize output to prevent XSS
            echo "<$tag>" . htmlspecialchars($cell) . "</$tag>";
        }
        
        echo "</tr>";
        $isHeader = false; // After first iteration, all rows are data
    }

    echo "</table>";

    // 4. Close the stream to free the file lock
    fclose($handle);
} else {
    echo "Error: Could not open the file $filename.";
}
print("<br>Please Click <a href=index.php>here</a> to move to source Page");
?>