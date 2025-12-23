<?php include __DIR__ . '/../common/database.php';
?>
<div class="container">
    <h1>Answer :</h1>
    <?php 
    $query = "SELECT * from answers where question_id = $qid";
    $result = $conn->query($query);
    foreach($result as $row){
        $answer = $row['answer'];
         echo "<div class ='row'>
         <p>$answer</p>
         </div>";
    }
    ?>
</div>