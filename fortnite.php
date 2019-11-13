<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<style>



@font-face {
  font-family: 'GN-KillGothic-U-KanaNB';
  src: url('GN-KillGothic-U-KanaNB.ttf') format('truetype');
}

    .fortniteshop{
        width: 100%;
        text-align: center;
        font-family: 'GN-KillGothic-U-KanaNB', sans-serif !important; 
    line-height: 1;
    padding: 1px;
    min-width:350px;
    min-width:108px;
      }
      .fortniteshop * {
        font-family: 'GN-KillGothic-U-KanaNB', sans-serif !important; 
        color: #333;
        text-decoration:none;
      }
      
      .fortniteshop p{
          margin: 0;
          padding: 0;
          font-size: 1.2vw;
          text-align:center;
      }
      
      .fortniteshop .optionsname{
          margin: 0;
          padding: 0;
          font-size: 1.7vw;
          position:relative;
          top:3vw;
      }


      
      .fortniteshop .td{
          height:15vw;
      }




      .fortniteshop table{
          margin-bottom: 20px;
        width: 100%;
        min-width:250px;
   table-layout: fixed;
          }
          .fortniteshop table th,
          .fortniteshop table td {
              border: 2px solid #fff;
              }
      .fortniteshop .imgcenter{
          height: 11vw;
          text-align:center;
        }

      .fortniteshop td .name{
          font-size: 1.5vw;
          position:relative;
          top:0.5vw;
          transition: 0.8s;
          opacity:1;
      }
      
      .fortniteshop td:hover .name{
          transition: 0.8s;
          opacity:0.5;
      }

      .fortniteshop td .imgcenter img{
          height: 10vw;
          position:relative;
        top:0.5vw;
        transition: 0.8s;
      }
      
      .fortniteshop td:hover .imgcenter img{
          height: 17vw;
          position:relative;
          top:-2vw;
          transition: 0.8s;
      }
      .fortniteshop td .data img{
          height: 2vw;
          position:relative;
          bottom:-0.5vw;
          transition: 0.8s;
          opacity:1;
      }
      .fortniteshop td:hover .data img{
          height: 2vw;
          position:relative;
          bottom:-0.5vw;
          transition: 0.8s;
          opacity:0.5;
      }

      .fortniteshop .data span{
          text-align:left;
          font-size: 1vw;
          transition: 0.8s;
          opacity:1;
      }

      .fortniteshop td:hover .data span{
          transition: 0.8s;
          opacity:0.5;
      }

      .fortniteshop .data{
          position:relative;
          bottom:0;
          height:6vw;
    min-height:30px;
          text-align:center;
      }




      .fortniteshop td{
          vertical-align: top;
        }

.fortniteshop {
     vertical-align: top;
}

.fortniteshop .none{
background: radial-gradient(circle farthest-side,#ff9d4d,#ff7605);
}
.fortniteshop .legendary{
background: radial-gradient(circle farthest-side,#c08139,#7d3a1a);
}
.fortniteshop .epic{
background: radial-gradient(circle farthest-side,#b753f3,#56288d);
}

.fortniteshop .rare{
    background: radial-gradient(circle farthest-side,#48a6e5,#113b75);
}
.fortniteshop .uncommon{
background: radial-gradient(circle farthest-side,#59a239,#185e1a);
}

footer.article-footer.entry-footer * {
    font-family: '明朝'!important;
}

[class^="icon-"], [class*=" icon-"] {
    font-family: 'icomoon' !important;
}

</style>
</head>
<body>

 <?php
$json_string = file_get_contents('https://fortnite-api.com/shop/br?language=ja');
$json_object = json_decode($json_string, true);
echo "<div class=\"fortniteshop\"><table align=\"center\">";
$item_list = $json_object["data"]["featured"];


foreach ($item_list as $item_page => $value) {
    if ($item_page % 3 == 0) {
        echo "<tr>";
    }

    $rarity_list = [
        "legendary" => true,
        "epic" => true,
        "rare" => true,
        "uncommon" => true
    ];
    $rarity = $item_list[$item_page]["items"][0]["rarity"];
    if ($rarity_list[$rarity] == true) {
        echo "<td class=\"".$rarity."\">";
    } else {
        echo "<td class=\"none\">";
    }


    if ($item_list[$item_page]["items"][0]["images"]["featured"]["url"] == null) {
        echo "<a href=".$item_list[$item_page]["items"][0]["images"]["icon"]["url"].">";
    } else {
        echo "<a href=".$item_list[$item_page]["items"][0]["images"]["featured"]["url"].">";
    }



    echo "<div class=\"imgcenter\">";
    if ($item_list[$item_page]["items"][0]["images"]["featured"]["url"] == null) {
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][0]["images"]["icon"]["url"];
        echo "\">";
    } else {
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][0]["images"]["featured"]["url"];
        echo "\">";
    }
    echo "</div>";
    echo "<div class=\"data\">";
    echo "<p class=\"name\">";
    echo "&nbsp;".$item_list[$item_page]["items"][0]["name"];
    echo "</p>";
    echo "<img src=\"https://yuki0311.com/fortnite/shop/vbucks\"><span>".$item_list[$item_page]["finalPrice"]."</span></div></a></td>";
}
echo "</table>";


echo "<table align=\"center\">";
$item_list = $json_object["data"]["daily"];
foreach ($item_list as $item_page => $value) {
    if ($item_page % 3 == 0) {
        echo "<tr>";
    }





    $rarity_list = [
        "legendary" => true,
        "epic" => true,
        "rare" => true,
        "uncommon" => true
    ];
    $rarity = $item_list[$item_page]["items"][0]["rarity"];
    if ($rarity_list[$rarity] == true) {
        echo "<td class=\"".$rarity."\">";
    } else {
        echo "<td class=\"none\">";
    }

    if ($item_list[$item_page]["items"][0]["images"]["featured"]["url"] == null) {
        echo "<a href=".$item_list[$item_page]["items"][0]["images"]["icon"]["url"].">";
    } else {
        echo "<a href=".$item_list[$item_page]["items"][0]["images"]["featured"]["url"].">";
    }



    echo "<div class=\"imgcenter\">";
    if ($item_list[$item_page]["items"][0]["images"]["featured"]["url"] == null) {
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][0]["images"]["icon"]["url"];
        echo "\">";
    } else {
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][0]["images"]["featured"]["url"];
        echo "\">";
    }
    echo "</div>";
    echo "<div class=\"data\">";
    echo "<p class=\"name\">";
    echo "&nbsp;".$item_list[$item_page]["items"][0]["name"];
    echo "</p>";
    echo "<img src=\"https://yuki0311.com/fortnite/shop/vbucks\"><span>".$item_list[$item_page]["finalPrice"]."</span></div></a></td>";
}
echo "</table></div>";
?>
</body>
</head>