<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
  <img src="images/logo.png">
  <?php
   
$pdo = new PDO('mysql:host=localhost;dbname=asoda;charset=utf8','root','root');

$sql = "SELECT * FROM users WHERE user_mail = ? ";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_POST['mail'],PDO::PARAM_STR);
$ps->execute();
$userData = $ps->fetchAll();

    foreach($userData as $row){
           if($_POST['pass'] == $row['password']){
            header('URL=home.php');
            }else{
            echo "パスワードが一致しません";
            }
    }

    if(count($userData)==0){
        echo "アカウントが存在しません";
    }
?>
    <form action="home.php" method="POST">
      <p>メールアドレス：<input type="text" name="mail"></p>
      <p>パスワード：<input type="password" name="pass"></p>
      <button type="submit" name="login">
        ログイン
      </button>
    </form>
    <a href="sinnki">新規登録<a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<style>
  body{
    background-color:#B164FF;
    text-align:center
  }
  p{
    width: 650px;
    margin-left: auto;
    margin-right: auto;
    border-bottom:2px solid #660099;
    color:white;
    font-size:40px;
    text-align:center
  }
  input{
    background-color:#B164FF;
    border: none;
    outline: none;
    font-size:30px;
  }
  button{
    margin-top:50px;
    width:200px;
    height:50px;
    border-radius:10px;
    font-size: 30px;
    background-color:#660099;
    color:white;
  }
  a{
    text-decoration: none;
    margin-top:50px;
    font-size:30px;
    color:white;
  }
</style>
</html>