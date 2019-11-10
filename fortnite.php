<html>
    <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>


  <style>
      .fortniteshop{
        width: 100%;
        text-align: center;
      }
      
      .fortniteshop p{
          margin: 0;
          padding: 0;
        font-size: 2vw;
      }
      
      .fortniteshop img{
width: 100%;
      }
      
      .fortniteshop .vbucks{
width: 10%;
      }
      
      .fortniteshop span{
          margin: 0;
          padding: 0;
        font-size: 2vw;
position:relative;
top:-5px;
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
        #APIの読み込み　できるだけ上に書く
$json_string = file_get_contents('https://fortnite-api.com/shop/br?language=ja');
$json_object = json_decode($json_string ,true);
?>
        <div class="fortniteshop"><table border="1">
            <?php
foreach($json_object["data"]["featured"] as $item_page => $value){

    if($item_page % 3 == 0){
        echo "<tr>";
    }
    $rarity_list = [
        "legendary" => true,
        "epic" => true,
        "rare" => true,
        "uncommon" => true
    ];
$rarity = $json_object["data"]["featured"][$item_page]["items"][0]["rarity"];
if ($rarity_list[$rarity] == true) {
    echo "<td class=\"".$rarity."\">";
}else{
    echo "<td class=\"none\">";
}
    echo "<table><tr>";
foreach ($json_object["data"]["featured"][$item_page]["items"] as $page => $value) {
    echo "<td>";
    if ($json_object["data"]["featured"][$item_page]["banner"] != null) {
        echo "<p class=banner>";
        echo $json_object["data"]["featured"][$item_page]["banner"];
        echo "</p>";
    }
    if ($json_object["data"]["featured"][$item_page]["items"][$page]["images"]["featured"] != null) {
        echo "<img src=\"";
        echo $json_object["data"]["featured"][$item_page]["items"][$page]["images"]["featured"]["url"];
        echo "\">";
    }elseif($json_object["data"]["featured"][$item_page]["items"][$page]["variants"] != null){
        foreach ($json_object["data"]["featured"][$item_page]["items"][$page]["variants"] as $typenum => $type) {
            /*
            echo "<p>";
            echo $type["type"];
            echo "</p>";
            */
            foreach ($type["options"] as $options) {
                echo "<p>";
                echo $options["name"];
                echo "</p>";
                echo "<img src=\"";
                echo $options["image"]["url"];
                echo "\">";

            }
        }
    }elseif($json_object["data"]["featured"][$item_page]["items"][$page]["images"]["icon"]["url"] != null){
        echo "<img src=\"";
        echo $json_object["data"]["featured"][$item_page]["items"][$page]["images"]["icon"]["url"];
        echo "\">";
    }
    if ($page == 0) {
        echo "<p class=name>";
        echo $json_object["data"]["featured"][$item_page]["items"][$page]["set"];
        echo "</p>";
    }
    echo "<p class=description>";
    echo $json_object["data"]["featured"][$item_page]["items"][$page]["description"];
    echo "</p>";
}
echo "</td>";
echo "</tr></table>"; 

echo "<img src=\"vbucks\" class=\"vbucks\">";
echo "<span>".$json_object["data"]["featured"][$item_page]["finalPrice"]."</span>";
echo "</td>";
}

echo "</table></td>";
?>
</tr></table></div>
</body>
</html>