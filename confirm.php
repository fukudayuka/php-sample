<?php
extract($_POST);
$errors = [];
//名前
if (empty($name1)){
  $errors['name1'] = "名前（姓）が未入力です";
}
if (empty($name2)){
  $errors['name2'] = "名前（名）が未入力です";
}
if (empty($name3)){
  $errors['name3'] = "ふりがな（姓）が未入力です";
}
if (empty($name4)){
  $errors['name4'] = "ふりがな（名）が未入力です";
}
if (empty($address)){
  $errors['address'] = "住所 が未入力です";
}
if (empty($tel)){
  $errors['tel'] = "電話番号 が未入力です";
}
if (empty($time)){
  $errors['time'] = "時間 が未入力です";
}
if (empty($eiga)){
  $errors['eiga'] = "観覧映画 が未入力です";
}
if (empty($payment)){
  $errors['payment'] = "支払い方法 が未入力です";
}
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
    <h1>映画観覧予約フォーム</h1>
    <?php if(empty($errors)){ ?>
        <from action ="./complate.php" method="post">
    </from>
    <?php } else { ?>
    <div class="alert alert-danger" role="alert">
      <?php echo implode("<br>",$errors ); ?>
    </div>
    <form action="confirm.php" method="post">
      <div class="mb-3 row">
        <label for="name1" class="col-sm-2 col-form-label">名前（姓）</label>
        <div class="col-sm-10">
          <input type="text"
           name="name1" 
           class="form-control  <?php echo in_array("name1", array_keys($errors)) ? "is-invalid" : "" ?>"
           id="name1">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name2" class="col-sm-2 col-form-label">名前（名）</label>
        <div class="col-sm-10">
          <input type="text"
           name="name2"
            class="form-control <?php echo in_array("name2", array_keys($errors)) ? "is-invalid" : "" ?>"
            id="name2">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name3" class="col-sm-2 col-form-label">ふりがな（姓）</label>
        <div class="col-sm-10">
          <input type="text"
           name="name3" 
           class="form-control <?php echo in_array("name3", array_keys($errors)) ? "is-invalid" : "" ?>"
           id="name3">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name4" class="col-sm-2 col-form-label">ふりがな（名）</label>
        <div class="col-sm-10">
          <input type="text"
           name="name4" 
           class="form-control <?php echo in_array("name4", array_keys($errors)) ? "is-invalid" : "" ?>"
            id="name4">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">住所</label>
        <div class="col-sm-10">
          <input type="text"
           name="address"
            class="form-control"
            id="address">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tel" class="col-sm-2 col-form-label">電話番号</label>
        <div class="col-sm-10">
          <input type="tel"
           name="tel"
           class="form-control <?php echo in_array("tel", array_keys($errors)) ? "is-invalid" : "" ?>"
           id="tel">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="otona" class="col-sm-2 col-form-label">席（大人）</label>
        <div class="col-sm-10">
          <input type="number"
           name="otona" 
           class="form-control <?php echo in_array("otona", array_keys($errors)) ? "is-invalid" : "" ?>"
            id="otona">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kodomo" class="col-sm-2 col-form-label">席（子供）</label>
        <div class="col-sm-10">
          <input type="number" 
          name="kodomo" 
          class="form-control <?php echo in_array("kodomo", array_keys($errors)) ? "is-invalid" : "" ?>"
          id="kodomo">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="time" class="col-sm-2 col-form-label">時間</label>
        <div class="col-sm-10">
          <input type="time"
           name="time" 
           class="form-control <?php echo in_array("time", array_keys($errors)) ? "is-invalid" : "" ?>"
           id="time">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="eiga" class="col-sm-2 col-form-label">観覧映画</label>
        <div class="col-sm-10">
          <select class="form-select <?php echo in_array("eiga", array_keys($errors)) ? "is-invalid" : "" ?>"
           name="eiga"
            id="eiga">
            <option selected disabled>選択してください</option>
            <option <?php if($_POST["eiga"] === 'アバター')echo "selected"; ?> value="アバター">アバター</option>
            <option <?php if($_POST["eiga"] === 'ライアーライアー')echo "selected"; ?> value="ライアーライアー">ライアーライアー</option>
            <option <?php if($_POST["eiga"] === '君の名は')echo "selected"; ?> value="君の名は">君の名は</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="payment" class="col-sm-2 col-form-label">支払い</label>
        <div class="col-sm-10">
          <select class="form-select" name="payment" id="payment">
            <option selected disabled>選択してください</option>
            <option value="カード">カード</option>
            <option value="現金">現金</option>
            <option value="交通系">交通系</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kaiinn" class="col-sm-2 col-form-label">会員証</label>
        <div class="col-sm-10">
          <input type="text" name="kaiinn"class="form-control" id="kaiinn">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="Profession" class="col-sm-2 col-form-label">職業</label>
        <div class="col-sm-10">
          <select class="form-select" name="Profession" id="Profession">
            <option selected disabled>選択してください</option>
            <option value="経営者・役員">経営者・役員</option>
            <option value="会社員（総合、一般職）">会社員（総合、一般職）</option>
            <option value="契約社員・派遣社員">契約社員・派遣社員</option>
            <option value="パート・アルバイト">パート・アルバイト</option>
            <option value="公務員（教職員除く）">公務員（教職員除く）</option>
            <option value="教職員">教職員</option>
            <option value="医療関係者">医療関係者</option>
            <option value="自営業・自由業">自営業・自由業</option>
            <option value="専業主婦・主夫">専業主婦・主夫</option>
            <option value="学生">学生</option>
            <option value="無職（定年含む）">無職（定年含む）</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>
</body>
</html>

リアクションする

返信
