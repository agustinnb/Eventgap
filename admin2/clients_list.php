<?php 
session_start();
if (isset($_SESSION['username'])){

include 'includes/document_head.php'?>
		<div id="wrapper">
			<?php include 'includes/topbar.php'?>		
			<?php include 'includes/sidebar.php'?>
				<div id="main_container" class="main_container container_16 clearfix">
					<?php include 'includes/navigation.php'?>
					<div class="flat_area grid_16">
						<h2>Clients List</h2>
					</div>
                    <div class="box grid_16 round_all">
				<table class="display table"> 
					<thead> 
						<tr>
						  	<th>ID</th> 
							<th>Company Name</th> 
							<th>Address</th> 
							<th>City</th> 
							<th>State</th> 
							<th>Phone</th>
                            <th>Delete</th>
						</tr> 
					</thead> 
					<tbody> 
                    <?php 
					include "libraries/mysqlconnect.php";
					$query="SELECT * FROM users";
					$result=@mysql_query($query);
					while ($row=@mysql_fetch_assoc($result)){
					echo "	<tr>
                        
						 	<td>" . $row['id'] . "</td> 
							<td><a href='create_new_client.php?id=" . $row['id'] . "'>{$row['CN']}</a></td> 
							<td>{$row['address']}</td> 
							<td>{$row['city']}</td> 
							<td class='center'>{$row['state']}</td> 
							<td class='center'>{$row['phone']}</td>
									<td><a href='delcl.php?id={$row['id']}'>Delete</a></td> 
						</tr> ";
					}
					
					include "libraries/closecon.php";
					
					?>
				<!--		<tr>
                        
						 	<td>1</td> 
							<td><a href="create_new_client.php">Letmon Agency</a></td> 
							<td>San Andres 1774</td> 
							<td>San Martin</td> 
							<td class="center">Buenos Aires</td> 
							<td class="center">+54 011 45089054</td>
						</tr> 
						<tr class="gradeB">
						  	<td>2</td> 
							<td><a href="create_new_client.php">Letmon Agency</a></td> 
							<td>San Andres 1774</td> 
							<td>San Martin</td> 
							<td class="center">Buenos Aires</td> 
							<td class="center">+54 011 45089054</td>
						</tr> 
						<tr class="gradeC">
						  	<td>3</td> 
							<td><a href="create_new_client.php">Letmon Agency</a></td> 
							<td>San Andres 1774</td> 
							<td>San Martin</td> 
							<td class="center">Buenos Aires</td> 
							<td class="center">+54 011 45089054</td>
						</tr>  -->
					</tbody> 
				</table>
			</div>
				</div>
			</div>
		</div>
<?php include 'includes/closing_items.php';
}else{
header("Location:login.php");
}


?>