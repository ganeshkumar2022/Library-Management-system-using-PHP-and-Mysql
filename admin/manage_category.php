<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php
include('aheader.php');
?>
<div class="container">
<h4 class="mt-4">MANAGE CATEGORY</h4>
<div class="row">
<div class="col-md-12">

<div class="card shadow-lg mt-4" style="margin-bottom:70px;">
<div class="card-header bg-secondary text-white">Category list</div>
<div class="card-body">
<table id="example" class=" table table-striped table-bordered" style="width:100%">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Status</th>
    <th>Create time</th>
    <th>Update time</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php
include('db.php');
$sql="select * from category";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
while($row=mysqli_fetch_assoc($result))
{
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?=$row['name']?></td>
        <td>
            <?php if($row["status"]=="active") {
                ?>
                <span class="badge badge-success"><?=$row['status']?></span></td>
                <?php
            }
            else
            {
                ?>
                <span class="badge badge-danger"><?=$row['status']?></span></td>
                <?php
            } 
            ?>
            
        <td><?=$row['create_time']?></td>
        <td><?=$row['update_time']?></td>
    <td>
        <a href="edit_category.php?id=<?=$row['id']?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <a href="delete_category.php?id=<?=$row['id']?>" class="btn btn-danger"><i class="fa-solid fa-eraser"></i> Delete</a>
    </td>
    </tr>
    <?php
    $i++;
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row bg-dark p-4 text-white text-right">
<div class="col">
&copy; <?php echo date('Y'); ?> R.Ganesh kumar copyrights reserved
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>