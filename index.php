<?php include 'foo.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/888b3d4d6b.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5e245c1875.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>CRUD</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
<h1 style="text-align: center;">CRUD</h1>
<div class="container-fluid">
<div class="row">
<div class="col-12">
<button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#crt"><i class="fa-solid fa-plus"> Добавить сообщение</i></button>
<table class="table table-striped table-hover">
	<thead>
		<th>ID</th>
		<th>Заголовок</th>
		<th>Сообщение</th>
    <th>Лайки</th>
		<th>Действие</th>
	</thead>
	<tbody>
    <?php 
    $result=array_reverse($result);
    foreach ($result as $res) { ?>
		<tr id="st<?php echo $res->id ?>">
		<td> <span id="span<?php echo $res->id ?>"> <?php echo $res->id ?> </span></td>
		<td><?php echo $res->name ?></td>
		<td><?php echo $res->text ?></td>
    <td><?php echo $res->likes ?></td>

		<td><form action="?id=<?php echo $res->id ?>" method="post"><button type="submit" name="likein" class="btn btn-success"><i class="fa-solid fa-thumbs-up"></i></button></form></td>
		</tr>
  <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="crt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        	<div class="form-group">
        		<small>Заголовок</small>
        		<input type="text" class="form-control" name="name">
    		</div>
        	<div class="form-group">
        		<small>Текст</small>
        		<input type="text" class="form-control" name="text">
    		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
		</form>
      </div>
    </div>
  </div>
</div>

  </body>
</html>