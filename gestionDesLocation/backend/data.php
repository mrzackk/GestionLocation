<?Php
      //check out the php manual for more about this
      //This is just for database connection
    $dbhost = 'localhost';
    $dbname = 'projet';
    $dbuser = 'root';
    $dbpass = '';


    try{

        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $ex){

        die($ex->getMessage());
    }
     //from here we select the table and display records of table using while loop
    $stmt=$dbcon->prepare("SELECT * FROM reservation");
    $stmt->execute();
    $json = [];
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $json[]= [(int)$numLocation , (int)$montant];
    }
    echo json_encode($json);
?>
