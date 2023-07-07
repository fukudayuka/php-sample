<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

extract($_POST);
$errors = [];

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'test';

$mysqli = @new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);
  
if ($mysqli->connect_error) {
    $errors[]="[{$mysqli->connect_errno}]::MySQLのエラーです。";

} else {
    //接続成功時の処理
  $query  = "INSERT INTO `form` (`name1`, `name2`, `name3`, `name4`, `address`, `tel`, `otona`, `kodomo`, `time`, `eiga`, `payment`, `kaiinn`, `Profession`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt   = $mysqli->prepare($query);
  try{
    $stmt->bind_param(
      'ssssssiisssss',
    $name1,$name2,$name3,$name4,$address,$tel,$otona,$kodomo,$time,$eiga,$payment,$kaiinn,$Profession
    );
    
    $stmt->execute();
  } catch(Exception $e){
    $errors[] =  "[99999]::  {$e->getMessage()}";
  }
}

$mysqli->close();
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <h1>映画観覧予約フォーム(完了) </h1>
    <?php if (empty($errors)) { ?>
        <div class="alert alert-success" role="alert">
            予約が完了しました。
    </div>
    <?php } else { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo implode("<br>",$errors ); ?>
    </div>
    <?php } ?>

    <form action="./complate.php" method="post">
      <div class="mb-3 row">
        <label for="name1" class="col-sm-2 col-form-label">名前（姓）</label>
        <div class="col-sm-10">
          <input type="text" name="name1" readonly class="form-control-plaintext" id="name1" value="<?php echo $_POST{'name1'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name2" class="col-sm-2 col-form-label">名前（名）</label>
        <div class="col-sm-10">
        <input type="text" name="name2" readonly class="form-control-plaintext" id="name2" value="<?php echo $_POST{'name2'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name3" class="col-sm-2 col-form-label">ふりがな（姓）</label>
        <div class="col-sm-10">
        <input type="text" name="name3" readonly class="form-control-plaintext" id="name3" value="<?php echo $_POST{'name3'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name4" class="col-sm-2 col-form-label">ふりがな（名）</label>
        <div class="col-sm-10">
        <input type="text" name="name4" readonly class="form-control-plaintext" id="name4" value="<?php echo $_POST{'name4'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">住所</label>
        <div class="col-sm-10">
        <input type="text" name="address" readonly class="form-control-plaintext" id="address" value="<?php echo $_POST{'address'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tel" class="col-sm-2 col-form-label">電話番号</label>
        <div class="col-sm-10">
        <input type="text" name="tel" readonly class="form-control-plaintext" id="tel" value="<?php echo $_POST{'tel'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="otona" class="col-sm-2 col-form-label">席（大人）</label>
        <div class="col-sm-10">
        <input type="text" name="otona" readonly class="form-control-plaintext" id="otona" value="<?php echo $_POST{'otona'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kodomo" class="col-sm-2 col-form-label">席（子供）</label>
        <div class="col-sm-10">
        <input type="text" name="kodomo" readonly class="form-control-plaintext" id="kodomo" value="<?php echo $_POST{'kodomo'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="time" class="col-sm-2 col-form-label">時間</label>
        <div class="col-sm-10">
        <input type="text" name="time" readonly class="form-control-plaintext" id="time" value="<?php echo $_POST{'time'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="eiga" class="col-sm-2 col-form-label">観覧映画</label>
        <div class="col-sm-10">
        <?php echo $_POST['eiga'];?>
        <input type="hidden" name="eiga" value="<?php echo $_POST['eiga']; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="payment" class="col-sm-2 col-form-label">支払い</label>
        <div class="col-sm-10">
          <?php echo $_POST['payment'];?>
          <input type="hidden" name="payment" value="<?php echo $_POST['payment']; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kaiinn" class="col-sm-2 col-form-label">会員証</label>
        <div class="col-sm-10">
        <input type="text" name="kaiinn" readonly class="form-control-plaintext" id="kaiinn" value="<?php echo $_POST{'kaiinn'}?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="Profession" class="col-sm-2 col-form-label">職業</label>
        <div class="col-sm-10">
        <?php echo $_POST['Profession'];?>
          <input type="hidden" name="Profession" value="<?php echo $_POST['Profession']; ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>