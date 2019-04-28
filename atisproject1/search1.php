<script type="text/javascript">
</script>
<?php include "db.php" ?>
<style type="text/css">
h1 {
	color:blue;
	text-align: center;
	font-size: 70px;
}
h3 {
	color: red;
}
table {
	font-size: 40px;
	margin-left: 420px;
	color:red;
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Hotel Guests</title>
    <h1> Welcome to the hotel SHKULAKU</h1>
</head>
<body>
	<form action = "" method = "post">
       <div style = "margin-left: 420px;" class="input-group">
            <input style=" color:red; font-size: 20px;" name = "search" type="text" class="form-control" placeholder="Search hotel guests">
            <span class="input-group-btn">
            <button style = "color:blue; font-size: 20px;" style = "color:blue;" name = "submit"  type="submit"value ="search">Search</button></span>
       </div>
<table border="1" class = "table table-bordered table-hover table">
<thead>
	<tr>
		<th>Name</th>
		<th>Surname</th>
		<th>Check</th>
    </tr>
</thead>
<tbody>
  <?php
 if(isset($_POST['submit'])){
    $search_guest = $_POST['search'];
    if($search_guest == ""){
    	  echo '<script language="javascript">';
	           echo 'alert("Search something")';
	           echo '</script>';
    }
    else {
    $query = "SELECT * FROM guests WHERE user_checked = 'no' AND firstname LIKE '%$search_guest' OR user_checked = 'no' AND lastname LIKE '%$search_guest' ";
    $search_query = mysqli_query($connection, $query);
    if(!$search_query){
      die("Error");
     }
     $count = mysqli_num_rows($search_query);
      if($count == 0){
	     	   echo '<script language="javascript">';
	           echo 'alert("No Result")';
	           echo '</script>';
         } 
   else{
      while($row = mysqli_fetch_assoc($search_query)){
		     $guest_id = $row['id'];
		     $guest_firstname = $row['firstname'];
		     $guest_lastname = $row['lastname'];
		     $guest_checked = $row ['user_checked'];
		       echo "<tr>";
			   echo "<td>$guest_firstname </td>";
			   echo "<td>$guest_lastname </td>";
  ?>
	   <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]'>
	    <?php
	    echo "</tr>";
	  }
	}
  }
}
?>
</tbody>
</table>
</form>	
</body>
</html>