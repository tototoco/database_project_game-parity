<?php
    include "db_conn.php";

    $game_platform = $_POST["Platform"];
    $query = ("select * 
               from game NATURAL JOIN developer NATURAL JOIN information
               where Platform=?");
    $stmt = $db->prepare($query);
    $error = $stmt->execute(array($game_platform));
    $result = $stmt->fetchAll();

    print '<html>
    <head>
        <meta charset="utf-8">
    <title>Game search</title>
    <style type="text/CSS">
    html { box-sizing: border-box; }
    *, *::before, *::after { box-sizing: inherit; }
    
    body {
        padding: 20px 0;
    }
    
    h1, h2 {
        margin: 0;
        padding: 34px 0 14px 40px;
    }
    
    nav > ul {
        background-color: rgb(230, 230, 230);
        list-style: none;   /* 移除項目符號 */
        margin: 0;
        padding: 0;
    }
    
    nav a {
        color: inherit; /* 移除超連結顏色 */
        display: block; /* 讓 <a> 填滿 <li> */
        font-size: 1.2rem;
        padding: 10px;
        text-decoration: none;  /* 移除超連結底線 */
    }
    
    /* 滑鼠移到 <a> 時變成深底淺色 */
    nav li:hover {
        background-color: rgb(115, 115, 115);
        color: white;
    }
    
    .flex-nav {
        display: flex;
        /* justify-content: center;*/
    }
    #shadowbox2 {
      border: 1px solid #333;
      box-shadow: 8px 8px 5px #444;
      padding: 8px 12px;
      background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
      text-align: center;
      margin:5px 130px 15px 130px;
      font-size:15px;
      
    }
    #shadowbox {
      width: 18em;
      border: 1px solid #333;
      box-shadow: 8px 8px 5px #444;
      padding: 8px 12px;
      background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
      text-align: center;
      margin:5px 130px 15px 130px;
      font-size:15px;
      
    }
    
    /*https://medium.com/@mingjunlu/building-a-simple-navbar-with-html-and-css-using-flexbox-and-inline-block-dfb9b10782d4*/
    
    
    </style>
    
    
    </head>
    <nav>
        <ul class="flex-nav">
            <li><a href="http://localhost/index.html">首頁</a></li>
            <li><a href="http://localhost/game_search.html">遊戲比價</a></li>
            <li><a href="http://localhost/data_update.php">更新資料</a></li>
        </ul>
    </nav>
    <body background="https://i.ibb.co/CsMxYy0/tDQMOc.jpg">
        <br></br>
        <div  id="shadowbox2">
        <form action="http://localhost/insert.php" method="post">
        <a>遊戲名稱：<input type="text" name="Name"></a>
        <a>價格：<input type="text" name="price"></a>
            <a>平台：<input type="text" name="Platform"></a>
                <a>敘述：<input type="text" name="Description"></a>
                    <a>開發者：<input type="text" name="Developer"></a>
                        <a>上市時間：<input type="text" name="Developer_description"></a>
                        <a><input type="submit" value="新增"></a>
                        <br></br>
                        <a>同遊戲只需輸入前三項</a>
                      </form>
    </div>
    <div  id="shadowbox2">
    <form action="http://localhost/update-platform.php" method="post">
      <a>搜尋平台：<input type="text" name="Platform" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字"></a>
      <a> <input type="submit" value="送出"></a>
  </form>

  <form action="http://localhost/update-name.php" method="post">
      <a>搜尋遊戲：<input type="text" name="Name" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字"></a>
      <a><input type="submit" value="送出"></a>
    </form>

    <form action="http://localhost/update-developer.php" method="post">
      <a>搜尋開發商：<input type="text" name="Developer" class="light-table-filter" data-table="order-table" placeholder="請輸入關鍵字"></a>
      <a><input type="submit" value="送出"></a>
    </form>
        <table class="order-table">
          <thead>
            <tr>
            <th>遊戲</th>
            <th>價錢</th>
            <th>平台</th>
            <th>敘述</th>
            <th>開發者</th>
            <th>上市時間</th>
            </tr>
          </thead>
          <tbody>';
          for($i=0;$i<count($result);$i++)
          {
          
            echo'<tr>';
            echo'<td>'.$result[$i]['Name'].'</td>';
            echo'<td>'.$result[$i]['Price'].'</td>';
            echo'<td>'.$result[$i]['Platform'].'</td>';
            echo'<td>'.$result[$i]['Description'].'</td>';
            echo'<td>'.$result[$i]['Developer'].'</td>';
            echo'<td>'.$result[$i]['Developer_description'].'</td>';

            echo "<td>  
            <form action=\"http://localhost/updete2.php\" method=\"post\">
                 <input type=\"submit\" name=\"".$result[$i]['Name']."@".$result[$i]['Price']."@".$result[$i]['Platform']."@".$result[$i]['Description']."@".$result[$i]['Developer']."@".$result[$i]['Developer_description']."\" value=\"更新\"/>
            </form>                    
          </td>";

            echo "<td>  
            <form action=\"http://localhost/delete.php\" method=\"post\">
                 <input type=\"submit\" name=\"".$result[$i]['Name']."@".$result[$i]['Price']."@".$result[$i]['Platform']."\" value=\"刪除\"/>
            </form>                    
          </td>";
          echo'</tr>';
          }
          echo'</tbody>
        </table>
        
    </div>
    
    
    
    
    </body>
    </html>';
    ?>
