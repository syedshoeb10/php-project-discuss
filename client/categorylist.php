<div class="container">
    <h1 class="heading">Category :</h1>
    <?php
    include __DIR__ . '/../common/database.php';
 $query = "SELECT * from category ";
    $result = $conn->query($query);
    foreach($result as $row){
        $name = ucfirst($row['name']) ;
        $id = $row['id'];
        echo "<div class ='row '>
      <h4><a href=?c-id=$id>$name</a></h4>
         </div>"; 
    }
 
