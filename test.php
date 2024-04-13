
<?php

    session_start();
    include('./dbconn.php');

    echo "first part";

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $findName = $conn->prepare("
        select * from `test` where `name`='$name'
        ");
        $findName->execute();
        if($findName->fetchAll()){
            $deleteName = $conn->prepare("
            delete from `test` where `name`='$name'
            ");
            $deleteName->execute();
            echo "inside if";
        }

        $insertName = $conn->prepare("
        insert into `test` (`name`,`age`)
        values('$name','$age')
        ");
        $insertName->execute();
    }

    $name = 'prantik';

    $findName = $conn->prepare("
    select * from `test` where `name`='$name'
    ");
    $findName->execute();
    $data = $findName->fetchAll();

    if($data){
        $formName = $data[0]['name'];
        $formAge = $data[0]['age'];
        echo $formName;
        echo "Inside data";
    }
    else{
        $formName = "";
        $formAge = NULL;
    }

    $_SESSION['formName']=$formName;
    $_SESSION['formAge']=$formAge;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="./test.php">
        <input type="text" value="<?php echo $_SESSION['formName'];?>" name="name"></input>
        <input type="text" value="<?php echo $_SESSION['formAge'];?>" name="age"></input>
        <button value="button" name="button">Submit</button>
    </form>
</body>
</html>

