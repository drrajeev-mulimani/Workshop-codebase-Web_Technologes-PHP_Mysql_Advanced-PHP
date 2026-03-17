<?php
// Dealing with Classes
class myClass
{
    public function showGreetings($localVariable)
    {
        return $localVariable;
    }

}

print("<h1><center><font face=arial>Welcome to Two Days Workshop on Web Technologies using PHP and Advance PHP</font></center></h1>");
print("<center><font face=arial>13-14 March 2026</font></center>");
print("<p align=center><table>");
print("</tr><td>Resource Person</td><td>Professor Pravin Yannawar</td><td></td><td>Professor Vikas Humbe</td></tr>");
print("</tr><td></td><td>Professor, Department of Computer Science and IT, <br>Dr. B A M University, Chhatrpati Sambhajinagar</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Associate Professor, School of Technology, <br>STRM University, Latur</td></tr>");
print("</table></p>");
print("<br> Message to Class <br>");
// Creating Object of CLass
$ob=new myClass();
print("".$ob->showGreetings("Hello World Let us Learn Advance PHP"));

print("<br>Please Click <a href=index.php>here</a> to move to source Page");
?>