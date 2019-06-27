<?php
    session_start();
    if($_SESSION["username"]){
      $username = $_SESSION["username"];
    }
    else{
       echo "<script> alert('You need to login first');location.href='login.html' </script>";
    }

    $mysqli = new MySQLi("localhost","solidifiedray","Ray826589!","solidifiedray");
    $sql = "SELECT * FROM staff NATURAL JOIN staff_phone WHERE user_name = '{$username}'";
    $result = $mysqli->query($sql);
    while ($row = $result -> fetch_assoc()){
        $username = $row["user_name"];
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $date_of_birth = $row["date_of_birth"];
        $phone_number = $row["phone"];
        $airline_name = $row["al_name"];
    }

    print <<<EOT

    <!doctype html>
    <html lang="en">
       <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <title>Online Air Ticket Reservation System</title>
          <link rel="shortcut icon" href="img/icon/web_icon.png" type="image/x-icon"/>
          <link href="files/css/index.css" rel="stylesheet" type="text/css">

          <!-- 引入 Bootstrap -->
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
          <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
          <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
          <!--[if lt IE 9]>
             <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
             <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
       </head>
       <body background="img/background.jpg" class="index-background">

          <div id="nav">
              <public-header></public-header>
          </div> 
          <?php
            
          ?>
          <div class="content-box">
              <br/><br/><br/><br/><br/><br/><br/>
              <div class="container" style="width: 100%">
                <div class="row">
                  <table class="login-table">
                    <tr>
                      <td width="64%" class="login-table-left">
                        <font class="login-title">Welcome Staff!</font>
                        <hr/>
                        <br/>
                        <p style="font-size: 22px;">
                          username: $username<br/>
                          name: $first_name $last_name<br/>
                          airline: $airline_name<br/>
                          phone number: $phone_number<br/>
                          date of birth: $date_of_birth<br/>
                        </p>
                        <br/><br/><br/><br/>
                      </td>
                      <td width="1%"></td>
                      <td width="35%" class="login-table-right">
                        <font class="login-text">
                          View flights<br/>
                          Create new flights<br/>
                          Change flight's status<br/>
                          Add airplane<br/>
                          Add new airport<br/>
                          View flight ratings<br/>
                          View frequent customers<br/>
                          View reports<br/>
                          View quarterly revenue earned<br/>
                          View Top destinations<br/>
                          <a href="logout.php"><font class="login-text"><u>Logout</u></font></a><br/>
                        </font>
                          <br/><br/>
                        <font class="login-text">
                          <span class="glyphicon glyphicon-user main-icon" aria-hidden="true"></span><br/><br/>
                        </font>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              
              <br/><br/><br/><br/><br/><br/><br/>
          </div>

          <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
          <script src="https://code.jquery.com/jquery.js"></script>
          <script src="components/navigation.js?v=1.1"></script>
       </body>
    </html>

EOT;
?>