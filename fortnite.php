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
        font-family: 'GN-KillGothic-U-KanaNB', sans-serif; 
      }
      
      .fortniteshop p{
          margin: 0;
          padding: 0;
          font-size: 1.2vw;
      }
      
      .fortniteshop .banner{
          margin: 0;
          padding: 0;
          font-size: 1.7vw;
          position:relative;
          top:1vw;
      }
      
      .fortniteshop .optionsname{
          margin: 0;
          padding: 0;
          font-size: 1.7vw;
          position:relative;
          top:3vw;
      }

      .fortniteshop .name{
          font-size: 2vw;
      }
      .fortniteshop img{
          width: 80%;
          max-width: 120px;
      }
      
      .fortniteshop .vbucks img{
          width: 2vw;
      }
      

      .fortniteshop .vbucks span{
          font-size: 1.2vw;
          position:relative;
          bottom:0.7vw;
      }
      .fortniteshop td{
          vertical-align: top;
        }

        .fortniteshop .imgcenter{
          text-align:center;
        }

.fortniteshop {
     vertical-align: top;
}

.fortniteshop .none{
background: radial-gradient(circle farthest-side,#ff9d4d,#ff7605);
}
.fortniteshop .legendary{
background: radial-gradient(circle farthest-side,#ff9d4d,#ff7605);
}
.fortniteshop .epic{
background: radial-gradient(circle farthest-side,#b17dfa,#8d3ffa);
}

.fortniteshop .rare{
    background: radial-gradient(circle farthest-side,#4171a3,#1258a2);
}
.fortniteshop .uncommon{
background: radial-gradient(circle farthest-side,#62cc21,#3a7913);
}
  </style>
</head>
<body>
  <?php
$json_string = file_get_contents('https://fortnite-api.com/shop/br?language=ja');
$json_object = json_decode($json_string ,true);
echo "<div class=\"fortniteshop\"><table border=\"1\">";
$item_list = array_merge($json_object["data"]["featured"],$json_object["data"]["daily"]);
foreach($item_list as $item_page => $value){
    if($item_page % 3 == 0){
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
}else{
    echo "<td class=\"none\">";
}
    echo "<table><tr>";
foreach ($item_list[$item_page]["items"] as $page => $value) {
    echo "<td>";
    if ($item_list[$item_page]["banner"] != null and $page == 0) {
        echo "<p class=banner>";
        echo $item_list[$item_page]["banner"];
        echo "</p>";
    }
    if ($item_list[$item_page]["items"][$page]["images"]["featured"] != null) {
        echo "<div class=\"imgcenter\">";
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][$page]["images"]["featured"]["url"];
        echo "\">";
        echo "</div>";
    }elseif($item_list[$item_page]["items"][$page]["images"]["icon"]["url"] != null){
        echo "<div class=\"imgcenter\">";
        echo "<img src=\"";
        echo $item_list[$item_page]["items"][$page]["images"]["icon"]["url"];
        echo "\"></div>";
    }

    if ($item_list[$item_page]["items"][$page]["variants"] != null) {
        foreach ($item_list[$item_page]["items"][$page]["variants"] as $typenum => $type) {
            /*
            echo "<p>";
            echo $type["type"];
            echo "</p>";
            */
            foreach ($type["options"] as $options) {
                echo "<p class=\"optionsname\">";
                echo $options["name"];
                echo "</p>";
                echo "<div class=\"imgcenter\">";
                echo "<img src=\"";
                echo $options["image"]["url"];
                echo "\"></div>";
            }
        }
    }
        echo "<p class=\"name\">";
        echo "&nbsp;".$item_list[$item_page]["items"][$page]["name"];
        echo "</p>";
    echo "<p class=\"description\">";
    echo $item_list[$item_page]["items"][$page]["description"];
    echo "</p>";
}
echo "</td></tr></table><div class=\"vbucks\"><img src=\"vbucks\"><span>".$item_list[$item_page]["finalPrice"]."</span></div></td>";
}
echo "</table></td>";
?>
    </tr>
    </table>
    </div>
</body>
</html>