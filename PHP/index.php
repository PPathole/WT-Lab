<?php include('server.php');  ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM employee WHERE ID=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['Name'];
			$eid = $n['ID'];
            $exp = $n['experience'];
            $area = $n['Area'];
            $doj = $n['doj'];
		}
	}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Employee records</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>
        <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
    <?php endif ?>
        
        <?php $results = mysqli_query($db, "SELECT * FROM employee"); ?>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Year of Experience</th>
                    <th>Area</th>
                    <th>DOJ</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($results)){?>
                    
           <tr>
			<td><?php echo $row['Name']; ?></td>
			<td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['experience']; ?></td>
            <td><?php echo $row['Area']; ?></td>
            <td><?php echo $row['doj']; ?></td>   
			<td>
				<a href="index.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
                
        
            <?php }?>
            </tbody>
            
        </table>
        
        
        <form method="post" action="server.php">
            Name: <input type="text" name="name" value=""><br >
            <br >
            Employee ID: <input type="number" name="eid" value=""><br >
            <br >
            Year of Experience: <input type="number" name="exp" value=""><br >
            <br >
            Area: <input type="text" name="area" value=""><br >
            <br >
            DOJ: <input type="date" name="doj" value=""><br >
            <br >
            <?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
            
            
<input type="hidden" name="id" value="<?php echo $id; ?>">


<input type="text" name="name" value="<?php echo $name; ?>"><br >
<input type="text" name="eid" value="<?php echo $eid; ?>"><br >
            <input type="text" name="exp" value="<?php echo $exp; ?>"><br >
            <input type="text" name="area" value="<?php echo $area; ?>"><br >
            <input type="text" name="doj" value="<?php echo $doj; ?>"><br >
            
            
        </form>
        
    </body>
    
</html>