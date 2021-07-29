<?php
require_once ('tokenpage.php'); 
require_once ('linksend.php'); 

if (isset($_REQUEST['hub_challenge']))
{
  $c = $_REQUEST['hub_challenge'];
  $v = $_REQUEST['hub_verify_token'];
}

if($v =="123")
{
  echo $c;
  exit;
}
$input = json_decode(file_get_contents('php://input'),true);
//file_put_contents("text.txt", $input);

$userID = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$getstart = $input['entry'][0]['messaging'][0];
$type = $input['entry'][0]['messaging'][0]['message']['attachments'][0]['type'];
$image = $input['entry'][0]['messaging'][0]['message']['attachments'][0]['payload']['url'];
$idpage = $input['entry'][0]['id'];
$quick_reply = $input['entry'][0]['messaging'][0]['message']['quick_reply']['payload'];
$hihi = $input['entry'][0]['messaging'][0]['postback'];
$ref = $input['entry'][0]['messaging'][0]['postback']['referral']['ref'];
#print_r($message);
$page = tokenpage($idpage);
 $token = $page[0];
 $chatpage = $page[1];

// nếu người không có ai trong hàng chờ (ngẫu nhiên 1) (nam tìm nữ 2) (nữ tìm nam 3) (nam tìm nam 4) (nữ tìm nữ 5) (tim 9x 6) (tim2k 7) (timLGBT les 8) (gay 9) 

 $linkxuly='https://halochatvn.com';

 


if ($quick_reply=='Tố cáo và kết thúc') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn muốn tố cáo đối phương. Những hành vi xấu như là show ảnh nhạy cảm chat gạ chịch.Lưu ý Không lạm dụng tính năng này nếu tố cáo sai bạn sẽ bị cấm chat",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"tố cáo",
        "payload":"tocao",
      },{
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
      
    ]
  }
}';
   # sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
}

if ($quick_reply=='tocao') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
  
  
  header("Location: $linkxuly/tocaobot.php?ID=$userID&token=$token");
  die();
}

if($quick_reply=="nam"||$getstart['postback']['payload']=="nam"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
     header("Location: $linkxuly/capnhapgt.php?ID=$userID&token=$token&gt=nam");
    die();
  }
  if($quick_reply=="nữ"||$getstart['postback']['payload']=="nu"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
     header("Location: $linkxuly/capnhapgt.php?ID=$userID&token=$token&gt=nữ");
    die();
  }


if($getstart['postback']['payload']=="timgt"){
     $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Bạn muốn tìm giới tính nào",
          "buttons":[
          
            {
              "type":"postback",
              "title":"Tìm Nam",
              "payload":"timnam"
            },
             {
              "type":"postback",
              "title":"Tìm Nữ",
              "payload":"timnu"
            },
            {
              "type":"postback",
              "title":"🏳️‍🌈Tìm LGBT🏳️‍🌈",
              "payload":"timLGBT"
            },
        
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
  }

if($quick_reply=="timnam"||$getstart['postback']['payload']=="timnam"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
header("Location: $linkxuly/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timnam&loai=2");
  
    
    die();
  }
  if($quick_reply=="timnu"||$getstart['postback']['payload']=="timnu"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
header("Location: $linkxuly/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timnu&loai=2");
  #  header("Location: $linkxuly/uptimtheogtNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timnu");
    #header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    die();
  }
if ($message=='Tìm LGBT'||$getstart['postback']['payload']=="timLGBT"||$message=='🏳️‍🌈Tìm LGBT🏳️‍🌈') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
  $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"🏳️‍🌈Bạn muốn tìm nhóm LGBT nào🏳️‍🌈",
          "buttons":[
          
            {
              "type":"postback",
              "title":"👩‍❤️‍👩Lesbian (đồng tính nữ)",
              "payload":"les"
            },
             {
              "type":"postback",
              "title":"👨‍❤️‍👨Gay (đồng tính nam)",
              "payload":"gay"
            },
            
        
          ]
        }
      }
    }
  }';
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "🏳️‍🌈Bạn muốn tìm nhóm LGBT nào.🏳️‍🌈",
    "quick_replies":[
     {
        "content_type":"text",
        "title":"Lesbian (đồng tính nữ)",
        "payload":"les",
        "image_url":"https://i.ibb.co/k0w3KB5/les1.png"
      },{
        "content_type":"text",
        "title":"Gay (đồng tính nam)",
        "payload":"gay",
        "image_url":"https://i.ibb.co/qdvNQQp/gay1.png"
      },
      
    ]
  }
}';
   $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
}
if ($quick_reply=="les"||$message=='Lesbian (đồng tính nữ)'||$message=='👩‍❤️‍👩Lesbian (đồng tính nữ)'||$message=='Tìm les'||$getstart['postback']['payload']=="les") {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
header("Location: $linkxuly1/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timLGBT&loai=8");
  die();
}
if ($quick_reply=="gay"||$message=='Gay (đồng tính nam)'||$message=='👨‍❤️‍👨Gay (đồng tính nam)'||$message=='Tìm gay'||$getstart['postback']['payload']=="gay") {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
header("Location: $linkxuly1/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timLGBT&loai=9");
  die();
}



if ($message=='endchat'||$getstart['postback']['payload']=="endchat2") {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
    header("Location: $linkxuly/ketthucV3.php?ID=$userID&token=$token");

  #header("Location: $linkxuly/ketthucbotV2.php?ID=$userID&token=$token");
  die();
  
} 

if ($message=='Cập nhập giới tính'||$getstart['postback']['payload']=="capnhapgt") {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Giới tính của bạn là gì",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Nam",
        "payload":"nam",
        "image_url":"https://i.ibb.co/GRspwG6/nam1.png"

      },{
        "content_type":"text",
        "title":"Nữ",
        "payload":"nữ",
        "image_url":"https://i.ibb.co/syd0qS6/nu.png"        
      },
      
    ]
  }
}';
#sendchat($token,$jsonData);
  $data = urlencode($jsonData);
 # https://halochatbot2sendchat.herokuapp.com
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  #header("Location: https://halochatbot2sendchat.herokuapp.com/sendhalo.php?data=$data&token=$token");

die();
}

if ($message=='chattest') {
       header("Location: $linkxuly/thamgiaskip.php?ID=$userID&token=$token&chatfuel=$idpage");

 $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Pick a color:",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Red",
        "payload":"hi",
        "image_url":"http://example.com/img/red.png"
      },{
        "content_type":"text",
        "title":"Green",
        "payload":"chán",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
}';
     # sendchat($token,$jsonData);
  die();
}

if ($message=='testd1') {
 $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
    "quick_replies":[
       {
        "content_type":"text",
        "title":"Tìm Nam",
        "payload":"timnam",
      },{
        "content_type":"text",
        "title":"Tìm Nữ",
        "payload":"timnu",
      },
      {
        "content_type":"text",
        "title":"Chat ngẫu nhiên",
        "payload":"newchat",
      },
      {
        "content_type":"text",
        "title":"Tìm LGBT",
        "payload":"endchat",
      },
       
       {
        "content_type":"text",
        "title":"Team 2K+",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"9X Tâm Sự",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Cập nhập giới tính",
        "payload":"capnhapgt",
      },
      
      {
        "content_type":"text",
        "title":"Menu",
        "payload":"Menuchat",
      }
    ],
 "attachment":{
  "type":"template",
  "payload":{
    "template_type":"button",
    "text":"Cuộc trò chuyện đã kết thúc.",
    "buttons":[
      {
        "type":"postback",
        "title":"Menu",
        "payload":"Menuchat"
      }
    ]
  }
 }
}

  }';
      sendchat($token,$jsonData);
  die();
}

if ($message=='bxhdiem'||$getstart['postback']['payload']=="bxhdiem") {
  die();
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
  
  
  header("Location: $linkxuly/bxhchiase.php?ID=$userID&token=$token");
  die();
}
if ($message=='testdiemdanh') {
  $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Làm nhiệm vụ để nhận xu mỗi ngày\n Chia sẻ trang nhận ngay 100xu",
          "buttons":[
          
            {
              "type":"web_url",
              "url":"'.$linkxuly.'/chiasetrang.php?ID='.$userID.'&token='.$token.'",
              "title":"Chia sẻ trang nhận xu"
            },
            {
                "type":"web_url",
                "url":"https://halochatvn.herokuapp.com/diemdanhhaloV3.php?ID='.$userID.'&token='.$idpage.'",
                "title":"Điểm danh nhận xu"
              },
        
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  
 # header("Location: https://sendhalo5.herokuapp.com/sendhalo.php?data=$data&token=$token");
  die();
}
if($getstart['postback']['payload']=="hdkiemdiem")
{
  $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Tích điểm nhận quà:\nCách 1: Chia sẻ link của bạn cho bạn bè khi có bạn bè mới vào sử dụng bạn sẽ nhận được +2 điểm.\nCách 2: Khi Bạn xác nhận Tôi không phải người máy khi bắt đầu chat thành công sẽ được +1 điểm.",
          "buttons":[
            {
              "type":"Postback",
              "title":"Nhận Link Chia sẻ",
              "payload":"chiase"
            },
             {
                "type":"postback",
                "title":"BXH điểm",
                "payload":"bxhdiem"
              }, 
            {
                "type":"web_url",
                "url":"https://www.facebook.com/groups/3321905804486436/",
                "title":"Tham gia Group"
              }, 
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
}

if($userID < 995820817863468 )
{
  die();
}
/*
////////

if(isset($getstart['postback'])||isset($ref)||isset($quick_reply)||isset($message)){
  $jsonData ="{
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'Bảo trì nâng cấp hệ thống việc này sẽ mất vài phút.'
     }
 }";
 sendchat($token,$jsonData);
  die();
}

///////////
*/
if($getstart['postback']['payload']=="mokhoa"){
 header("Location: https://halochatvn.herokuapp.com/mokhoa.php?ID=$userID&token=$token");
    die();
}
  //////moi

if($getstart['postback']['payload']=="nhiemvu"||$message=='nhiemvu' ){
 $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Làm nhiệm vụ để nhận xu mỗi ngày\n Chia sẻ trang nhận ngay 100xu",
          "buttons":[
            
            {
              "type":"Postback",
              "title":"Nhận xu miễn phí",
              "payload":"chiase"
            },
            {
              "type":"web_url",
              "url":"'.$linkxuly.'/chiasetrang.php?ID='.$userID.'&token='.$token.'",
              "title":"Chia sẻ trang nhận xu"
            },
            {
                "type":"web_url",
                "url":"https://halochatvn.herokuapp.com/diemdanhhaloV3.php?ID='.$userID.'&token='.$idpage.'",
                "title":"Điểm danh nhận xu"
              },
        
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
}
  //////moi

if(isset($getstart['postback'])){


  if($getstart['postback']['payload']=="ketnoilai" ){
 $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Cần ID của người lạ để gửi yêu cầu kết nối lại\n Cần 100xu cho mỗi lần gửi yêu cầu.",
          "buttons":[
          
            {
              "type":"web_url",
              "url":"https://halochatvn.herokuapp.com/nhantin.php?ID='.$userID.'&token='.$idpage.'",
              "title":"Gửi yêu cầu kết nối"
            },
        
          ]
        }
      }
    }
  }';
  sendchat($token,$jsonData);
  #  $data = urlencode($jsonData);
  #header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
}

  if($getstart['postback']['title']=="Ket noi")
  {
  $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'm.me/Halochat.VN1?ref=".$userID." ".$getstart['postback']['payload']." '
     }
 }";
    $partner = $getstart['postback']['payload'];
 #sendchat($token,$jsonData);
    #$userID&token=$token&chatfuel=$idpage&gt=0&loai=1
   header("Location: $linkxuly/ketnoilai.php?ID=$userID&token=$token&chatfuel=$idpage&partner=$partner");
    die();
  }
  if($getstart['postback']['payload']=="ketnoichinhminh")
  {
    sendchat($token,$jsonData);
  $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'Bạn không thể kết nối với chính mình.'
     }
 }";
 #sendchat($token,$jsonData);
    $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
  }
  
}

if(isset($ref))
{
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
   #header("Location: $linkxuly/chiaseref.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&ref=$ref");
  header("Location: $linkxuly/chiaserefNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&ref=$ref");
  $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Chào bạn! \nChat giúp bạn kết nối và trò chuyện với người lạ.\n Người lạ ngẫu nhiên và không thấy thông tin của nhau.\n Thật thú vị!.Bạn đến từ link chia sẻ.ID chia sẻ:'.$ref.'0",
          "buttons":[
            {
              "type":"Postback",
              "title":"Bắt đầu",
              "payload":"newchat"
            }
          ]
        }
      }
    }
  }';
  #$jsonData1 ='{ "recipient":{ "id": "'.$userID.'" }, "message":{ "attachment":{ "type":"template", "payload":{ "template_type":"button", "text":"Chào bạn! \nChat giúp bạn kết nối và trò chuyện với người lạ. Thật thú vị!.Bạn đến từ link chia sẻ.", "buttons":[ { "type":"Postback", "title":"Bắt đầu", "payload":"newchat" } ] } } } }';
  #header("Location: https://sendhalo1.herokuapp.com/sendhalo.php?data=$jsonData1&token=$token");
  sendchat($token,$jsonData);
  die();
}




if(isset($getstart['postback'])){ ///////////////////////////////////////////////////////////////////////////////////////////

  if($getstart['postback']['payload']=="boquaqc"){
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
    //header("Location: $linkxuly/thamgiaskip.php?ID=$userID&token=$token&chatfuel=$idpage");
    header("Location: $linkxuly/vipboquaqc.php?ID=$userID&token=$token&chatfuel=$idpage");
   
    die();
}
  if($getstart['postback']['payload']=="boqua" ){
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
    //header("Location: $linkxuly/thamgiaskip.php?ID=$userID&token=$token&chatfuel=$idpage");
    header("Location: $linkxuly/vipboqua.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");
   
    die();
}
  
 
  
  if($getstart['postback']['payload']=="chiase" ){
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
    $jsonData ='{
   "messaging_type" : "RESPONSE",
   "recipient":{
     "id": "'.$userID.'"
   },
   "message":{
     "text": "Khi có 1 người bấm vào link của bạn, hệ thống sẽ tự động gửi tin nhắn thông báo cho bạn, đồng thời cộng xu ngay cho bạn.\n-Sao chép liên kiết và mời bạn bè sử dụng Halochat. Khi có người mới tham gia Halochat qua liên kết giới thiệu này, bạn sẽ được thưởng 100 xu."
     }
 }';
 sendchat($token,$jsonData);
  $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'm.me/HaloChatVN?ref=".$userID."'
     }
 }";
 sendchat($token,$jsonData);
    die();
}

  if($getstart['postback']['payload']=="Getstared"||$hihi['title']=="Get Started"||$getstart['postback']['payload']=="GetStared"||$getstart['postback']['payload']=="Get Stared"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);  
    $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Chào bạn! \nChat giúp bạn kết nối và trò chuyện với người lạ.\n Người lạ ngẫu nhiên và không thấy thông tin của nhau. Thật thú vị!",
          "buttons":[
            {
              "type":"Postback",
              "title":"Bắt đầu",
              "payload":"newchat"
            }
          ]
        }
      }
    }
  }';
      sendchat($token,$jsonData);
    
     # header("Location: $linkxuly/updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");
      die();
  }

  if($getstart['postback']['payload']=="newchat"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
     #header("Location: $linkxuly/updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");
    die();
  }

 if($getstart['postback']['payload']=="thongtin"){
   $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
    $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Hiện tại chat bot đang cần nâng cấp hệ thống để khắc phục lỗi, cần sự trợ giúp của các bạn để có giây phút chat vui vẻ hơn. Hãy Donate cho chúng tôi chúng tôi sẽ không làm bạn thất vọng.\nHãy ủng hộ chúng tôi Link Donate : 0061001155911 Vietcombank",
          "buttons":[
          
            {
              "type":"web_url",
              "url":"https://unghotoi.com/1585289035xy8fn#",
              "title":"Donate"
            },
            {
              "type":"web_url",
              "url":"https://playerduo.com/5f564b493c86516679a73b75",
              "title":"Donate PlayerDuo"
            }
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
   $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
  }
  
  if($getstart['postback']['payload']=="Menuchat"||$getstart['postback']['payload']=="Menu1"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  header("Location: $linkxuly/sendmenu.php?ID=$userID&token=$token");
    /*
    $jsonData1 ='{
  "recipient":{
    "id":"'.$userID.'"
  },
   "message":{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"generic",
        "elements":[
           {
            "title":"Này bạn ơi...",
            "subtitle":"Bạn tham gia Group để tìm lại bạn chat\nGroup mới tạo nên bạn vào giúp Group lớn mạnh nhé.",
            "default_action": {
              "type": "web_url",
              "url": "m.me/halochatvn2",
              "webview_height_ratio": "tall"
              
            },
            "buttons":[
              {
                "type":"web_url",
                "url":"https://www.facebook.com/groups/3321905804486436/",
                "title":"Tìm lại bạn chat"
              },
              {
                "type":"web_url",
                "url":"m.me/ThinhChatVN",
                "title":"Thêm bạn chat"
              },
              {
                "type":"web_url",
                "url":"https://www.facebook.com/groups/3321905804486436/",
                "title":"Tham gia Group"
              }, 
            ]      
          }
        ]
      }
    }
  }
}';
sendchat($token,$jsonData1);
    $jsonData1 ='{
  "recipient":{
    "id":"'.$userID.'"
  },
   "message":{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"generic",
        "elements":[
           {
            "title":"ID của bạn:'.$userID.'",
            "subtitle":"Liên hệ admin để tìm bạn lại chat nhanh hơn và góp ý kiến của bạn và kiếm xu",
            "buttons":[
              {
                "type":"web_url",
                "url":"m.me/105606831256172",
                "title":"Liên hệ admin"
              },
              {
                "type":"web_url",
                "url":"https://docs.google.com/forms/d/e/1FAIpQLSfv-J9Yu5L2X20UylAV6dsCzkgMxcMWL2f-3SiqOdWawTV24Q/viewform",
                "title":"Góp ý kiến"
              },
              {
                "type":"postback",
                "title":"Ủng hộ donate",
                "payload":"donate"
              },     
            ]      
          }
        ]
      }
    }
  }
}';
sendchat($token,$jsonData1);
*/
    die();
  }
if($getstart['postback']['payload']=="donate"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
    $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Chat bot đang cần nâng cấp và thêm 1 số tính năng nếu bạn ủng hộ thì hãy giúp team chúng tôi để làm tốt hơn😍\nHãy ủng hộ chúng tôi Link Donate : 0061001155911 Vietcombank ",
          "buttons":[
          
            {
              "type":"web_url",
              "url":"https://unghotoi.com/1585289035xy8fn#",
              "title":"Donate"
            },
            {
              "type":"web_url",
              "url":"https://playerduo.com/5f564b493c86516679a73b75",
              "title":"Donate PlayerDuo"
            },
            {
              "type":"web_url",
              "url":"https://forms.gle/sMv4tTyk9dSSW8rT9",
              "title":"Góp ý kiến"
            },
          ]
        }
      }
    }
  }';
    #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
   
    die();
  }
  if($getstart['postback']['payload']=="endchat"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
    $jsonData ='{
    "recipient":{
      "id":"'.$userID.'"
    },
    "messaging_type": "RESPONSE",
    "message":{
      "text": "Bạn muốn kết thúc cuộc trò chuyện?\nHoặc gõ Endchat để kết thúc nhanh",
      "quick_replies":[
        {
          "content_type":"text",
          "title":"Kết thúc",
          "payload":"endchat",
        },
        {
          "content_type":"text",
          "title":"BLOCK",
          "payload":"endchat",
        },
         
        {
          "content_type":"text",
          "title":"Không.",
          "payload":"Khong",
        }
        
      ]
    }
  }';
     $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
    $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
    "quick_replies":[
       {
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"BLOCK",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"Tố cáo và kết thúc",
        "payload":"Tố cáo và kết thúc",
      },
      {
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
    ],
 "attachment":{
  "type":"template",
  "payload":{
    "template_type":"button",
    "text":"Bạn muốn kết thúc cuộc trò chuyện?",
    "buttons":[
    
      {
        "type":"postback",
        "title":"End Chat",
        "payload":"endchat2"
      },
    ]
  }
 }
}
  }';
      
 #   sendchat($token,$jsonData);
//     $data = urlencode($jsonData);
//   header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
}

if($getstart['postback']['payload']=="sualoi"){
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
    header("Location: $linkxuly/upxuloi.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    die();
}
  if($getstart['postback']['payload']=="iphone" ){
  $jsonData ='{ 
    "recipient":{
    "id": "'.$userID.'"
  },
  "message":{
    "attachment":{
      "type":"image", 
      "payload":{
        "url":"https://scontent.xx.fbcdn.net/v/t1.15752-9/107800634_275005093824055_7505363074398219503_n.jpg?_nc_cat=111&_nc_sid=b96e70&_nc_ohc=wRKD2jJCx74AX-un3xB&_nc_ad=z-m&_nc_cid=0&_nc_zor=&_nc_ht=scontent.xx&oh=2aaf26f4bc69587af1fd5feb22d93816&oe=5F2B0CE1", 
        "is_reusable":true
      }
    }
  }
}';
sendchat($token,$jsonData);
  die();
}

}//////////////////////////$getstart['postback']///////////////////////////////////////////////////////////////////////////////////////////////////





  if(isset($quick_reply)){//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if($quick_reply=="test"){
    $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn đã tham gia Group chưa hãy tham gia để kết thêm nhiều bạn nào.Tham gia để tìm lại bạn chat.",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Chat ngẫu nhiên",
        "payload":"newchat",
      },{
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Hướng dẫn",
        "payload":"huongdan",
      },
      {
        "content_type":"text",
        "title":"Menu",
        "payload":"Menuchat",
      }
    ]
  }
}';
    #sendchat($token,$jsonData);
    $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
  }

  if($quick_reply=="nam"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
     header("Location: $linkxuly/capnhapgt.php?ID=$userID&token=$token&gt=$quick_reply");
    die();
  }
  if($quick_reply=="nữ"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
     header("Location: $linkxuly/capnhapgt.php?ID=$userID&token=$token&gt=$quick_reply");
    die();
  }
  
  if($quick_reply=="timnam"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
     #header("Location: thamgiabotgt.php?ID=$userID&token=$token&gt=$quick_reply");
    #header("Location: updatebot.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=0");
    #header("Location: updatebotgt.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=$quick_reply");
    #header("Location: updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
   # header("Location: $linkxuly/uptimtheogt.php?ID=$userID&token=$token&chatfuel=$idpage&gt=$quick_reply");
    
    
    header("Location: $linkxuly1/uptimtheogtNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=$quick_reply");
   # header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    
    
    die();
  }
  if($quick_reply=="timnu"){
    $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
     #header("Location: thamgiabotgt.php?ID=$userID&token=$token&gt=$quick_reply");
    #header("Location: updatebot.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=0");
    #header("Location: updatebotgt.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=$quick_reply");
   # header("Location: $linkxuly/uptimtheogt.php?ID=$userID&token=$token&chatfuel=$idpage&gt=$quick_reply");
    
    
    header("Location: $linkxuly1/uptimtheogtNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=$quick_reply");
    #header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    
    die();
  }

  if($quick_reply=="Khong"){
    $jsonData ='{
   "messaging_type" : "RESPONSE",
   "recipient":{
     "id": "'.$userID.'"
   },
   "message":{
     "text": "Bạn đã quyết định không kết thúc trò chuyện 👍\n\nTiếp tục trò chuyện bên dưới 👇"
     }
 }';
 #sendchat($token,$jsonData);
    $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
  }
    
    //$quick_reply ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 }
    

  
   if(isset($type)){/////////////////////////////////////////////////////////////////////////////////
     file_put_contents("text.txt", $input);
     $myfile = fopen("names.txt", "w");
    
   
    fwrite($myfile, $input);
     
    fclose($myfile);
if ($type=="image")
{
  /*new
   $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'Đã gửi'
     }
 }";
 
 sendchat($token,$jsonData);
  */
  $image = str_replace("&","dangnhap0935",$image);
  header("Location: $linkxuly/sendimagenew.php?id=$userID&noidung=$image");
  #sendchat2($image,$userID,$token);
    die();
}
if ($type=="audio")
{
//   /////////1234
//   $jsonData ="{
//    'messaging_type' : 'RESPONSE',
//    'recipient':{
//      'id': $userID
//    },
//    'message':{
//      'text': '".$image."'
//      }
//  }";
//  sendchat($token,$jsonData);
//   $jsonData ='{
//   "recipient":{
//     "id": "'.$userID.'"
//   },
//   "message":{
//     "attachment":{
//       "type":"audio", 
//       "payload":{
//         "url":"'.$image.'", 
//       }
//     }
//   }
// }';
//    sendchat($token,$jsonData);

  
  $image = str_replace("&","dangnhap0935",$image);
  header("Location: $linkxuly/sendaudionew.php?id=$userID&noidung=$image");
    die();
}
    
if ($type=="video")
{
 /* $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'Hiện đang lỗi gửi video chờ sửa lỗi trong vài phút'
     }
 }";
 sendchat($token,$jsonData);*/
  #header("Location: sendimage.php?id=$userID&noidung=$image");
 $image = str_replace("&","dangnhap0935",$image);
  header("Location: $linkxuly/sendvideonew.php?id=$userID&noidung=$image");
    die();
}
     

   }////////////(isset($type))/////////////////////////////////////////////////////////////////////////////////


 if(isset($message)){//////////////////////////////////////////////////////////

if ($message=='upxuloi') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
  header("Location: $linkxuly/upxuloi.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
  die();
}

if ($message=='Kết thúc'||$message =='End chat'||$message =='end chat'||$message =='endchat'||$message =='Endchat'||$message =='END') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
  #header("Location: $linkxuly/ketthucbot.php?ID=$userID&token=$token");
  #header("Location: $linkxuly/ketthucbotV2.php?ID=$userID&token=$token");
    header("Location: $linkxuly/ketthucV3.php?ID=$userID&token=$token");

  die();
}

if ($message=='block') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
  #header("Location: $linkxuly/blockbot.php?ID=$userID&token=$token");
    header("Location: $linkxuly/ketthucV3.php?ID=$userID&token=$token");

  die();
}

if ($message=='testthamgia') {
  header("Location: thamgiabotV2.php?ID=$userID&token=$token");
  die();
}
if ($message=='napxutest') {
 $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
  $jsonData ='{
   "messaging_type" : "RESPONSE",
   "recipient":{
     "id": "'.$userID.'"
   },
   "message":{
     "text": "https://halochatvn.herokuapp.com/napthe.php?ID='.$userID.'"
     }
 }';
 sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: https://sendhalo1.herokuapp.com/sendhalo.php?data=$data&token=$token");
  
  die();
}
if ($message=='testthamgia1') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
  
  
  header("Location: thamgiabotV1.php?ID=$userID&token=$token");
  die();
}
if ($message=='Team 2K+') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
  #header("Location:  thamgiabot2k.php?ID=$userID&token=$token");
  #header("Location: updatebot2k.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=0");
  
  #header("Location: $linkxuly/uptim2k.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
 # header("Location: $linkxuly/uptim2kNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
        header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=7");

  
  die();
}
if ($message=='9X Tâm Sự') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
  #header("Location:  thamgiabot9x.php?ID=$userID&token=$token");
  #header("Location: updatebot9x.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=0");
 #header("Location: updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
 # header("Location: $linkxuly/uptim9x.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
  #header("Location: $linkxuly/uptim9xNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
        header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=6");

  die();
}

if ($message=='Tìm LGBT') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  
  #header("Location:  thamgiabot9x.php?ID=$userID&token=$token");
  #header("Location: updatebot9x.php?ID=$userID&token=$token&chatfuel=$chatpage&gt=0");
 #header("Location: updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
  #header("Location: $linkxuly/uptimLGBT.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
 # header("Location: $linkxuly/uptimLGBTNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
        header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");

  die();
}

if ($message=='Chat ngẫu nhiên'||$message =='Start'||$message =='start'||$message =='Bắt đầu') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
# sendchat($token,$jsonData);
  
  #header("Location: $linkxuly/updatebot.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
  #header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
      header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");

  die(); 
}

if ($message=='Menu') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
    header("Location: $linkxuly/sendmenu.php?ID=$userID&token=$token");
die();
  
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn đã tham gia Group chưa hãy tham gia để kết thêm nhiều bạn nào.Tham gia để tìm lại bạn chat.\nhttps://www.facebook.com/groups/halochatvoinguoila/",
    "quick_replies":[
    
      {
        "content_type":"text",
        "title":"Hướng dẫn",
        "payload":"huongdan",
      },
      {
        "content_type":"text",
        "title":"Cập nhập giới tính",
        "payload":"capnhapgt",
      },
       {
        "content_type":"text",
        "title":"Tìm theo giới tính",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Chat ngẫu nhiên",
        "payload":"newchat",
      },
      {
        "content_type":"text",
        "title":"Tìm LGBT",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"9X Tâm Sự",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"Team 2K+",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Kết Thúc",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Menu",
        "payload":"Menuchat",
      }
    ]
  }
}';
    sendchat($token,$jsonData);
    die();
}

if ($message=='Cập nhập giới tính') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Giới tính của bạn là gì",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Nam",
        "payload":"nam",
      },{
        "content_type":"text",
        "title":"Nữ",
        "payload":"nữ",
      },
      
    ]
  }
}';
#sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
die();
}
if ($message=='Tìm theo giới tính') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn muốn tìm giới tính nào",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Tìm Nam",
        "payload":"timnam",
      },{
        "content_type":"text",
        "title":"Tìm Nữ",
        "payload":"timnu",
      },
      {
        "content_type":"text",
        "title":"Cập nhập giới tính",
        "payload":"capnhapgt",
      },
      
    ]
  }
}';
    #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    
    die();
}
if ($message=='Hướng dẫn'||$message =='HUONGDAN') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Gõ ký tự bất kỳ để bắt đầu chat. Gõ pp hoặc end chat để kết thúc cuộc trò chuyện.Hiện tại Chat có hỗ trợ gửi ảnh, video, chatvoice, và file đính kèm.",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Chat ngẫu nhiên",
        "payload":"newchat",
      },{
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Hướng dẫn",
        "payload":"huongdan",
      },
      {
        "content_type":"text",
        "title":"Menu",
        "payload":"Menuchat",
      }
    ]
  }
}';
   # sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
}
if ($message=='pp'||$message =='Pp'||$message =='End'||$message =='end'||$message =='Kết Thúc') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn muốn kết thúc cuộc trò chuyện?\nHoặc gõ Endchat để kết thúc nhanh",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"BLOCK",
        "payload":"endchat",
      },
      
       
      {
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
      
    ]
  }
}';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  ///////////////
 $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
    "quick_replies":[
       {
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"BLOCK",
        "payload":"endchat",
      },
       {
        "content_type":"text",
        "title":"Tố cáo và kết thúc",
        "payload":"Tố cáo và kết thúc",
      }, 
      {
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
    ],
 "attachment":{
  "type":"template",
  "payload":{
    "template_type":"button",
    "text":"Bạn muốn kết thúc cuộc trò chuyện?",
    "buttons":[
    
      {
        "type":"postback",
        "title":"End Chat",
        "payload":"endchat2"
      },
    ]
  }
 }
}
  }';
//      sendchat($token,$jsonData);
//   $data = urlencode($jsonData);
 # header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
}
if ($message=='BLOCK') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn muốn block đối phương khi đã block bạn sẽ không gặp lại người lạ này nữa",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"block",
        "payload":"endchat",
      },{
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
      
    ]
  }
}';
   # sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
}
   /*
if ($message=='Tố cáo'||$message=='Tố cáo và kết thúc') {
  $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Bạn muốn tố cáo đối phương. Những hành vi xấu như là show ảnh nhạy cảm chat gạ chịch.Lưu ý Không lạm dụng tính năng này nếu tố cáo sai bạn sẽ bị cấm chat",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"tố cáo",
        "payload":"tocao",
      },{
        "content_type":"text",
        "title":"Không.",
        "payload":"Khong",
      }
      
    ]
  }
}';
  #  sendchat($token,$jsonData);
  die();
}
if ($message=='tố cáo') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
  
  
 # header("Location: $linkxuly/tocaobot.php?ID=$userID&token=$token");
  die();
}
*/

if ($message=='dangnhap0935') {
 $jsonData ='{
  "recipient":{
    "id":"'.$userID.'"
  },
  "message":{
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Chat ngẫu nhiên",
        "payload":"newchat",
      },{
        "content_type":"text",
        "title":"Kết thúc",
        "payload":"endchat",
      },
      {
        "content_type":"text",
        "title":"Hướng dẫn",
        "payload":"huongdan",
      },
      {
        "content_type":"text",
        "title":"Menu",
        "payload":"Menuchat",
      }
    ]
  }
}';
    #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
die();
}
if($message=='ketnoitest'){
   $jsonData ='{
    "recipient":{
      "id": "'.$userID.'"
    },
    "message":{
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Cần ID của người lạ để gửi yêu cầu kết nối lại\n Cần 100xu cho mỗi lần gửi yêu cầu.",
          "buttons":[
          
            {
              "type":"web_url",
              "url":"https://halochatvn.herokuapp.com/nhantin.php?ID='.$userID.'&token='.$idpage.'",
              "title":"kết nối"
            },
        
          ]
        }
      }
    }
  }';
  #sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
    die();
 }
if($message=='chiase'){
   $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'https://m.me/HaloChatVN?ref=".$userID."'
     }
 }";
# sendchat($token,$jsonData);
  $data = urlencode($jsonData);
  header("Location: $link1/sendhalo.php?data=$data&token=$token");
  die();
 }
 ////////////////////////////////
if ($message=='end1') {
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 #sendchat($token,$jsonData);
  
  
  header("Location: $linkxuly/ketthucV3.php?ID=$userID&token=$token");
  die();
}
if($message=='menutest'){
  $jsonData ='{
    "recipient":{
    "id":"'.$userID.'"
  },
  "sender_action":"typing_on"
}';
 sendchat($token,$jsonData);
  
  
    header("Location: $linkxuly/sendmenu.php?ID=$userID&token=$token");
    die();
}
if ($message=='diemdanhtest') {
  header("Location: $linkxuly/diemdanh.php?ID=$userID&token=$token");
  die();
}
//////////////////////////////

   if($message=='timnam'){
   
        #header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");

    header("Location: $linkxuly/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timnam&loai=2");
 # header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    
    die();
  }
   if($message=='timnu'){
   
        #header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");

    header("Location: $linkxuly/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timnu&loai=2");
 # header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    
    die();
  }
    if($message=='timLGBT'){
   
        #header("Location: $linkxuly/updatebotV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0&loai=1");

    header("Location: $linkxuly/updatebotxuV3.php?ID=$userID&token=$token&chatfuel=$idpage&gt=timLGBT&loai=8");
 # header("Location: $linkxuly/updatebotNew.php?ID=$userID&token=$token&chatfuel=$idpage&gt=0");
    
    die();
  }
if($message=='kiemtra2'){
   $jsonData1 ="{'messaging_type' : 'RESPONSE','recipient':{'id': $userID},'message':{'text': 'userid1:".$userID." tin nhắn :".$message." idpage:".$idpage."'}}";
   $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'userid:".$userID." tin nhắn :".$message." idpage:".$idpage."'
     }
 }";
 #header("Location: https://sendhalo1.herokuapp.com/sendhalo.php?data=$jsonData1&token=$token");
 sendchat($token,$jsonData);
  die();
 }

if(isset($message)){
  $sub ='m.me/HaloChatVN?ref=';
   if (strlen(strstr($message, $sub)) > 0) {
     
    $jsonData ="{
   'messaging_type' : 'RESPONSE',
   'recipient':{
     'id': $userID
   },
   'message':{
     'text': 'Không được spam link này tại đây.'
     }
 }";
 
 sendchat($token,$jsonData);
  die();
     
  } 
  
  $message = preg_replace('/\n+/', '\n', $message);
 
  #header("Location: https://halosession001.herokuapp.com/chatss.php?id=$userID&noidung=$message&token=$token&idpage=$idpage"); 
  #header("Location: https://halosession001.herokuapp.com/chatss.php?id=$userID&noidung=$message&token=$token&idpage=$idpage"); 
  header("Location: https://halochatvn.com/chatss.php?id=$userID&noidung=$message&token=$token&idpage=$idpage"); 

  
  die();
 }


}////////////////////////isset $message/////////////////////////////////////////////////////



 function sendchat($token,$jsonData)
{
$url = "https://graph.facebook.com/v11.0/me/messages?access_token=$token";
  $ch = curl_init($url);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, html_entity_decode($jsonData));
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//   curl_exec($ch);
//    curl_close($ch);
  ////////////////////////
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $st=curl_exec($ch);

    $errors = curl_error($ch);
    $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    var_dump($errors);
    var_dump($response);



    curl_close($ch);

//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
//     $st=curl_exec($ch);
//     $errors = curl_error($ch);
//     $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//     var_dump($errors);
//     var_dump($response);
    
//     curl_close($ch);
   
}
function sendchat2($message,$userID,$token)
{

$url = "https://graph.facebook.com/v7.0/me/messages?access_token=$token";
  $jsonData ="{
  
  'recipient':{
    'id': $userID
  },
  'message':{
    'text':'".$message."'
    }
}";
  $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $st=curl_exec($ch);

    $errors = curl_error($ch);
    $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    var_dump($errors);
    var_dump($response);



    curl_close($ch);
    

}
die();
?>
