<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db = "gary";

$conn = new mysqli($servername,$user,$pass,$db);

if($conn->error){
    echo "DB error ".$conn->error."";
}
else{
    echo "Connection successful";
}

//inserting data into our database

if(isset($_POST['save'])){
    echo "<br>";

    #$id = $_POST['id'];
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "insert into contacts (Name,Email,Message) values 
    ('$name','$email','$message')";

    if($conn->query($sql)){
        echo '<div class="alert alert-primary" role="alert"> Message Saved SUCCESSFULLY!!!! </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert"> Error is here: ".$conn->error." </div>';
    }

}
//displaying data code
if(isset($_POST['display'])){


    $sql = "select * from contacts";

    $myquery = $conn->query($sql);
    
    while($result = $myquery->fetch_assoc()){
        
        echo '<footer>';
        echo '<table class="table bg-warning"">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>';
                    echo '<th scope="row">'.$result['ID'].'</th>';
                    echo '<td>'.$result['Name'].'</td>';
                    echo '<td>'.$result['Email'].'</td>';
                    echo '<td>'.$result['Message'].'</td>
                </tr>
                </tbody>
            </table>';
                
        echo '</footer>';
        
    }

}

?>

<html>

 <head>
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="style.css">
  <title>Nkuraija Gary</title>

 </head>

    
<body>
        
   <img src="gary.jpg" alt="my photo">

   <h1>Nkuraija Gary Matthew BSCS2</h1>
   <div class="know">
       
    <h3>I know the following programming languages</h3>
       
    <p>Java</p>
 
    <p>JavaScript</p>
         
    <p>CSS</p>
         
    <p>Php</p>
         
    <p>Python</p>
   </div>
   <div class="hobby">
  <h2>My interests and Hobbies are;</h2>
         
   <p>Football </p>
         
   <p>Playing my Guitar</p>
</div>

    <form action="index.php" method="POST">

        <div class="form-group container">
          <label for="name">Name: </label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name">
          <label for="email">Email: </label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email">
          
          <label for="message">Message: </label>
          
            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Enter your message here!"></textarea>
           <input class="btn btn-success" type="submit" name="save" value="Send"/>
           <input class="btn btn-warning" type="submit" name="display" value="Show"/>
        </div>

      </form>
      <br>

</body>


</html>