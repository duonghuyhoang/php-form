<?php require 'component/header.php';
$name = $email = '';
$name_error = $email_error = '';

if (isset($_POST['submit'])){
    if (empty($_POST['name'])){
            $name_error = 'Name is required';
    }else {
          $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['email'])){
        $email_error = 'Email is required';
    }else {
      $email = htmlspecialchars($_POST['email']);
    }
    $validate_sucess = empty($name_error) && empty($email_error);

    if($validate_sucess) {
        $sql = 'INSERT INTO feedback(name,email)
                                VALUES (?,?)';
        try{
            $statement = $connection->prepare($sql);
            $statement->bindParam(1,$name);
            $statement->bindParam(2,$email);
            $statement->execute();
           
            header('Location:feedback_list.php');
        }catch(PDOException $e){
            echo 'Cannot insert feedback into database'.$e->getMessage();
        }
     
    }
    
   
}
?>
<h1>FROM DANG KI</h1>
<form class="d-flex flex-column" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">User name</label>
        <input type="text" class="form-control
         <?php echo $name_error ? 'is-invalid' :''; ?> " name='name' id="exampleFormControlInput1" placeholder="">
        <p> <?php  echo $name_error; ?></p>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control 
        <?php echo $email_error ? 'is-invalid' :''; ?> " name='email' id="exampleFormControlInput1"
            placeholder="name@example.com">
        <p> <?php echo $email_error; ?></p>
    </div>

    <button class='btn btn-primary ' name="submit" type='submit'>SUBMIT</button>
</form>
<?php include 'component/footer.php'; ?>