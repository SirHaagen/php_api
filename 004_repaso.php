  <?php
    $url= "https://randomuser.me/api/?results=5";
    //$url= "https://jsonplaceholder.typicode.com/users";
    //$url= "https://api.dailymotion.com/videos?channel=sport&limit=10";
    $opciones= array("ssl"=>array("verify-peer"=>false, "verify-peer_name"=>false));
    $respuesta= file_get_contents($url, false, stream_context_create($opciones));
    $objRespuesta= json_decode($respuesta);

    //print_r($objRespuesta->results[0]->location->street);
    //print_r(count($objRespuesta->results));
    for($index= 0; $index<count($objRespuesta->results); $index++){
      print_r($objRespuesta->results[$index]);
    }
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>PHP - REPASO 4</title>
</head>
<body>
  <div class="container">
    <?php
        for($index= 0; $index<count($objRespuesta->results); $index++){?>
          <div class="person">
            <div class="picture">
              <img src="<?php echo $objRespuesta->results[$index]->picture->thumbnail ?>" alt="">
            </div>
            <div class="info1">
              <div class="name" id="<?php echo $index?>"><?php echo $objRespuesta->results[$index]->name->title." ".$objRespuesta->results[$index]->name->first." ".$objRespuesta->results[$index]->name->last;?></div>
              <div class="email"><label>Email: </label><?php echo $objRespuesta->results[$index]->email;?></div>
            </div>
            <div class="info2">
              <div class="phone"><label>Phone: </label><?php echo $objRespuesta->results[$index]->phone;?></div>
              <div class="mobile"><label>Mobile: </label><?php echo $objRespuesta->results[$index]->cell;?></div>
            </div>
            <div class="info3">
              <div class="address"><label>Address: </label><?php echo $objRespuesta->results[$index]->location->street->name. ", ".$objRespuesta->results[$index]->location->street->number;?></div>
              <div class="city"><label>City: </label><?php echo $objRespuesta->results[$index]->location->city.", ". $objRespuesta->results[$index]->location->country;?></div>
            </div>
          </div>
        <?php } ?>
  </div>
  
</body>
</html>