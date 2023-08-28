<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('fhead.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<h3> Welcome Judge : <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo $fname; ?></span></a></h3>
			<?php
			include( 'database.php' );
			$varid = $_REQUEST[ 'myfid' ];
			//selecting data of Judge from faculty table
			$sql = "select * from  facutlytable where FID='$varid'";
			$result = mysqli_query( $connect, $sql );
			//loop below will print details of Judge
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<fieldset>
				<legend>My Details</legend>
				<form action="" method="POST" name="update">
					<table class="table table-hover">

						<tr>
							<td><strong>ID : </strong>
							</td>
							<td>
								<?php echo $row['FID']; ?>
							</td>

						</tr>
						<tr>
							<td><strong>Name :</strong> </td>
							<td>
								<?php echo $row['FName']; ?>
							</td>
						</tr>
						</tr>
						<tr>
							<td><strong>Father Name :</strong> </td>
							<td>
								<?PHP echo $row['FaName'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Address : </strong>
							</td>
							<td>
								<?PHP echo $row['Addrs'];?> </td>
						</tr>
						<tr>
							<td><strong>Gender :</strong>
							</td>
							<td>
								<?PHP echo $row['Gender'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Date Of Joining :</strong>
							</td>
							<td>
								<?PHP echo $row['JDate'];?>
							</td>
						</tr>
						<tr>
							<td><strong>City : </strong>
							</td>
							<td>
								<?PHP echo $row['City'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Phone Number :</strong>
							</td>
							<td>
								<?PHP echo $row['PhNo'];?> </td>
						</tr>
						
						<tr>
							<td><a href="updatedetailsfromfaculty.php?myfid=<?php echo $row['FID']; ?>"><input type="button" Value="Edit" style="border-radius:0%" class="btn btn-info"></a></td>
							
						</tr>
					</table>
				</form>
			</fieldset>
			<?php
			}
			?>
		</div>

		<div class="col-md-2"></div>
	</div>
	<?php include('allfoot.php'); ?>