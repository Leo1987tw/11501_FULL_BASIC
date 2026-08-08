<?php

if(isset($_POST['account']) && $_POST['account'] == "admin" && isset($_POST['password']) && $_POST['password'] == "1234"){
  $_SESSION['login'] = "admin";
}elseif((isset($_POST['account']) && $_POST['account'] !== "admin") || (isset($_POST['password']) && $_POST['password'] !== "1234")) {
  echo "<p class='ct'>帳號或密碼錯誤</p>";
}

if(isset($_SESSION['login'])):

?>

<div id="mm">
  <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> 
    <a href="?do=tit">網站標題管理</a>| 
    <a href="?do=go">動態文字管理</a>| 
    <a href="?do=poster">預告片海報管理</a>| 
    <a href="?do=movie">院線片管理</a>| 
    <a href="?do=order">電影訂票管理</a> </div>
  <div class="rb tab">
    <?php

    $do = $_GET['do'] ?? '';
    $file = "./back/" . $do . ".php";
    if(file_exists($file) && $do != "main"){
      include_once $file;
    }else {
      echo "<h2 class='ct'>請選擇所需功能</h2>";
    }
    ?>
  </div>
</div>

<?php

else:

?>

<form action="./admin.php" method="post">
  <table class="ct">
    <tr>
      <td>
        帳號：
        <input type="text" id="account" name="account">
      </td>
    </tr>
    <tr>
      <td>
        密碼：
        <input type="password" id="password" name="password">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="送出">
      </td>
    </tr>
  </table>
</form>

<?php

endif;

?>