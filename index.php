<!DOCTYPE html>
<html>

<head>
	<title>testing</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="resources/style.css">
</head>

<body>
	<?php require_once 'process.php'; ?>
	<?php
if(isset($_SESSION['message'])): ?>
	<div class="alert alert-<?=$_SESSION['msg_type']; ?>">
		<?php
     echo $_SESSION['message'];
     unset($_SESSION['message']);
     ?>
	</div>
	<?php endif ?>
	<div class="container">
		<?php 
        $mysqli=new mysqli('localhost','root','','test') or die($mysqli->error());
				$result=$mysqli->query("SELECT empID,empName,iqamaNo,passportNo,JobDesc FROM employeetable,typetable WHERE employeetable.jobID=typetable.jobID") or die($mysqli->error());
				$select=$mysqli->query("SELECT * FROM typetable");
    ?>
		<form action="process.php" method="post">
			<div class="row sep">
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control" name="txteID" value="<?php echo $empid; ?>">
					</div>
				</div>
			</div>
			<div class="row sep">
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control" value="<?php echo $ename; ?>" name="txtempname"
							placeholder="Employee Name">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control" value="<?php echo $iNo; ?>" name="txtiNo"
							placeholder="Iqama No.">
					</div>
				</div>
			</div>
			<div class="row sep">
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control" value="<?php echo $typeid;?>" name="txtetypeID">
					</div>
				</div>
			</div>
			<div class="row sep">
				<div class="col">
					<div class="form-group">
						<input type="text" class="form-control" value="<?php echo $passNo; ?>" name="txtPassNo"
							placeholder="Passport No.">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<select class="form-control" name="txttype">
							<option value="">Job Description</option>
							<?php while($row=$select->fetch_array()): ?>
							<option value=""><?php echo $row['JobDesc']; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row sep text-right">
				<div class="col">
					<?php 
				if($update==true):
				?>
					<button type="submit" class="btn btn-info" name="update">Update</button>
					<?php else: ?>
					<button type="submit" class="btn btn-primary" name="insert">Save</button>
					<?php endif; ?>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<div class="card-mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Table
			</div>
			<div class="card-body">
				<div class="table-responsive scrollable">
					<table class="table table-striped table-bordered text-center" width="100%">
						<thead>
							<tr>

								<th>Employee Name</th>
								<th>Iqama No.</th>
								<th>Passport No.</th>
								<th>Job Description</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row=$result->fetch_assoc()):?>
							<tr>
								<td><?php echo $row['empName']; ?></td>
								<td><?php echo $row['iqamaNo']; ?></td>
								<td><?php echo $row['passportNo']; ?></td>
								<td><?php echo $row['JobDesc']; ?></td>
								<td>
									<a href="index.php?edit=<?php echo $row['empID']; ?>" class="btn btn-info">Edit</a>
									<a href="process.php?delete=<?php echo $row['empID']; ?>"
										class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
</body>

</html>