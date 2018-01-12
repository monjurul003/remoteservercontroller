<!DOCTYPE html>
<html lang="en">
<head>
  <title>Remote Server Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <body>
    <div class="container">
        
 	<?php
 	    if(isset($_GET['result'])){
            echo '<div class=""><pre>'.$_GET['result'].'</pre></div>';
        }

        echo "<table class='table table-bordered'><tr><th>Server Name</th><th>Address</th></tr>";
        $file_handle = fopen("lan-servers.txt", "r");
        while (!feof($file_handle)) {
            $line = fgets($file_handle);
            $data = explode(" ", $line);
            echo "<tr><td>".$data[0]."</td><td>".$data[count($data)-1]."</td></tr>";
        }
        fclose($file_handle);
 	?>
    </table>
    <h3 class="align-center">Select Action</h3>
    <form method="post" action="exec_shell.php"> 
    	<select name="action_to_do">
    		<option value="">Select</option>
    		<option value="shutdown">Shutdown</option>
    		<option value="reboot">Reboot</option>
    	</select>
        <INPUT TYPE="submit" VALUE="Submit" NAME="Submit"> 
    </form>
    </div>
 </body>
</html>