<?php 
  ob_start();
  define('API_KEY','741491798:AAGAVtjhldPVKyjkPPN0qicXo3hYDfpjVFw');
  function bot($method,$json=[]){
      $url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch,CURLOPT_POSTFIELDS,$json);
      $res = curl_exec($ch);
      if(curl_error($ch)){
          var_dump(curl_error($ch));
      }else{
          return json_decode($res);
      }
  }
  
  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;


if($text){
      bot('sendMessage',['chat_id'=>$chat_id,'text'=>'work']);
}
 ?>
