<!-- Following php code example shows how to open a database connection for MySQL database -->

<?php

$con = mysql_connect("localhost","root","");
     if(!$con){
           die("Database Connection failed".mysql_error());
}else{
$db_select = mysql_select_db("pregcare", $con);
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{

   }
}

$records = mysql_query("SELECT * FROM course");

 

?>

<!-- This piece of PHP code defines the structure of the html table -->

 

<!DOCTYPE html>
<html>
    <head>
        <title> Fetching data </title>
    </head>

    <body>

        <table width="400" border="2" cellpadding="2" cellspacing='1'>

           <tr bgcolor="#2ECCFA">
                     <th> CourseID</th>
                     <th>Course Title</th>
                     <th>Duration</th>
           </tr>

<!-- We use while loop to fetch data and display rows of date on html table -->

<?php

     while ($course = mysql_fetch_assoc($records)){

           echo "<tr>";
               echo "<td>".$course['courseID']."</td>";
               echo "<td>".$course['CourseTitle']."</td>";
               echo "<td>".$course['Duration']."</td>";
           echo "</tr>";

     }
?>
        </table>

   </body>

</html>