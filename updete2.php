<?php
    include_once "db_conn.php";
    $key = array_search ('更新', $_POST);
    $Name = mb_split("@",$key)[0];
    $Price =  mb_split("@",$key)[1];
    $Platform =  mb_split("@",$key)[2];
    $Description =  mb_split("@",$key)[3];
    $Developer =  mb_split("@",$key)[4];
    $Developer_description =  mb_split("@",$key)[5];

    print "<html>
    <head>
        <meta charset=\"utf-8\">
    <title>Game search</title>
    <style type=\"text/CSS\">
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
        <ul class=\"flex-nav\">
            <li><a href=\"http://localhost/index.html\">首頁</a></li>
            <li><a href=\"http://localhost/game_search.html\">遊戲比價</a></li>
            <li><a href=\"http://localhost/data_update.php\">更新資料</a></li>
        </ul>
    </nav>
    <body background=\"https://i.ibb.co/CsMxYy0/tDQMOc.jpg\">
        <br></br>
    
    <div  id=\"shadowbox2\">
    
        <table class=\"order-table\">
          <thead>
            <form action=\"http://localhost/update3.php\" method=\"post\">
            <tr>";
            echo" <th>遊戲名稱:<input type=\"hidden\" name=\"Namet\" value=".$Name."  ></th>";
             echo" <th>遊戲名稱:<input type=\"text\" name=\"Namef\" value=".$Name." disabled ></th>";
             echo" <th>價錢:<input type=\"text\" name=\"Price\"  value=".$Price."></th>";
             echo" <th>平台:<input type=\"hidden\" name=\"Platform\"  value=".$Platform."></th>";
             echo" <th>平台:<input type=\"text\" name=\"Platformt\"  value=".$Platform." disabled></th>";
             echo" <th>敘述:<input type=\"text\" name=\"Description\" value=".$Description."></th>";
             echo" <th>開發者:<input type=\"text\" name=\"Developer\"  value=".$Developer."></th>";
             echo" <th>上市時間:<input type=\"text\" name=\"Developer_description\" value=".$Developer_description."></th>";
             echo" <th> <input type=\"submit\" value=\"確定更動\"></th>
            </tr>
        </form>
          </thead>
        </table>
        </form>
    </div>
    
    
    </body>
    </html>";
    ?>
