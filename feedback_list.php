<?php
     require 'component/header.php';
  
    $sql = 'SELECT name, email from feedback;';
    
    if($connection !== null) {
        try {
            $statement = $connection->prepare($sql); 
            $statement->execute();
            $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
            $feedbacks = $statement->fetchAll();
            echo '<ul  class="list-group">';
            foreach($feedbacks as $feedback) {
                $name = $feedback['name'] ?? '';
                $email = $feedback['email'] ?? '';
                echo "<li class='list-group-item'>";
                echo "<p>$name</p>" ; 
                echo "<p>$email</p>" ; 
                echo "</li>";
            }
            echo "</ul>";
        }catch(PDOException $e) {
            echo "Cannot query data. Error: " .$e->getMessage();
        }
    }
  
    include 'component/footer.php'; 
?>