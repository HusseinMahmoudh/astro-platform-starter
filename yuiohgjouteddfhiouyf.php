<?php

ob_start();
define('API_KEY','5392818507:AAEOFctRQjNr3q9Q9tUqma0NbM0jWzUuzR0');
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));

$message = $update->message;

$chat_id = $message->chat->id;
$text = $message->text;

$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;

$data = $update->callback_query->data;
$welc = file_get_contents('welcome.txt');
$get_welc = file_get_contents('setwelc.txt');
$u = explode("\n",file_get_contents("matthew.txt"));
$c = count($u)-1;
$modxe = file_get_contents("mattheew.txt");
$admin = $chat_id;
if ($update && !in_array($chat_id, $u)) {
    file_put_contents("matthew.txt", $chat_id."\n",FILE_APPEND);
  }

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text1 = $message->text;
$admin = ("$chat_id");
include_once "save.php";
if($text1=="⚙┋عمل ويبهوك"){
bot('sendmessage', [
'chat_id'=>$chat_id,
'text'=>"☑️┋مرحبا بك في قسم الويبهوك",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
         [
          ['text'=>'عمل ويب هوك 🔺','callback_data'=>'q']
        ],
       [
       ['text'=>'ازالة ويب هوك 🗑','callback_data'=>'delete']
        ],
       [
        ]
      ]
    ])
]);
}


if(isset($update->callback_query)){
    $callbackMessage = '';
    var_dump(bot('answerCallbackQuery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>$callbackMessage
    ]));
    $chat_id = $update->callback_query->message->chat->id;
    $message_id = $update->callback_query->message->message_id;
    $data = $update->callback_query->data;

if($data=="begin"){
bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"☑️┋مرحبا بك في قسم الويبهوك",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
         [
          ['text'=>'عمل ويب هوك 🔺','callback_data'=>'q']
        ],
       [
       ['text'=>'ازالة ويب هوك 🗑','callback_data'=>'delete']
        ],
       [
        ]
      ]
    ])
]);
}

if($data=="q"){
   bot('editmessagetext',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
    'text'=>"🚸┋اضغط التالي،",
     'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'التالي ◀️', 'callback_data'=>"q1"]
        ],
[
['text'=>"الصفحة الرئيسية 📩", 'callback_data'=>"begin"]
]

]
])
]);
}

if($data=="delete"){
   bot('editmessagetext',[
   'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>" سوف تقوم الان بحذف ال webhook ✨",
     'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'التالي ◀️', 'callback_data'=>"delete1"]
        ],
[
['text'=>"الصفحة الرئيسية 📩", 'callback_data'=>"begin"]
]

]
])
]);
}



if($data=="q1"){


bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل 📩 التوكن واسفله رابط الملف ‼️",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"التالي ◀️", 'callback_data'=>"q2"]
],
[
['text'=>'كيفية الاستخدام 🔧','callback_data'=>'how']
],
[
['text'=>"الصفحة الرئيسية 📩", 'callback_data'=>"begin"]
]
]
])
]);
}


if($data=="delete1"){


bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ارسل 📩 التوكن واسفله رابط الملف ‼️ ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"التالي ◀️", 'callback_data'=>"delete2"]
],
[
['text'=>'كيفية الاستخدام 🔧' , 'callback_data'=>'how']
],
[
['text'=>"الصفحة الرئيسية 📩", 'callback_data'=>"begin"]
]
]
])
]);
}


if($data=="delete2"){
bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'parse_mode'=>'Markdown',
'text'=>"الان ❗️قم بل ضغط على الرابط ❕وفتحه في احدى المتصفحات 📵 لاتمام عملية حذف ال webhook 🔹  " . 
"\n\n[اضغط هنا للدخول للرابط](https://api.telegram.org/bot$ex[0]/deletewebhook?url=$ex[1]",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"مرة اخرى 🔄", 'callback_data'=>"delete1"]
],
[
['text'=>"الصفحة الرئيسية 📩 ", 'callback_data'=>"begin"]
]
]
])
]);
}
if($data=="q2"){
bot('editmessagetext', [
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'parse_mode'=>'Markdown',
'text'=>"" . 
"\n\n[🚸┋اضغط هنا لعمل الويبوك💯](https://api.telegram.org/bot$ex[0]/setwebhook?url=$ex[1]",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"مرة اخرى 🔄", 'callback_data'=>"q1"]
],
[
['text'=>"الصفحة الرئيسية 📩 ", 'callback_data'=>"begin"]
]
]
])
]);
}
}

  
$arr = explode("'", $text1);
$tak = explode("@", $text1);
$error = explode("  ", $text1);


$number = strlen($text1);

$setweb = explode("\n\n", $text1);

if($number > 5 && $setweb && in_array($text1, $tak) && in_array($text1, $arr)  &&  in_array($text1, $error)){
file_put_contents("save.php", "<?php" . "\n" . '$ex[0] = ' . "'$setweb[0]'" . ";" . "\n" . '$ex[1] = ' . "'$setweb[1]'" . ";");

}
if($text == '/start'){ 
bot('sendMessage', [
'chat_id'=>$admin,
'text'=>"📥┋مرحبا بك في بوت *webhost*",
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$msid,
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[["text"=>"🗂┋رفع ملف"]],
[["text"=>"💎┋مساعدة"]],
[["text"=>"⚙┋عمل ويبهوك"]],
] 
]) 
]); 
} 

  
  if ($text == "/admin" and $chat_id == 1873951160 ) {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
      'text'=>"📜┋مرحبا بك في الاوامر،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'📮┋اذاعه،','callback_data'=>'ce']],
[['text'=>'👥┋عدد المشتركين،','callback_data'=>'co']],
            ]
            ])
        ]);
}
if($data == 'off'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
      'text'=>"📜┋مرحبا بك في الاوامر،",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
[['text'=>'📮┋اذاعه،','callback_data'=>'ce']],
[['text'=>'👥┋عدد المشتركين،','callback_data'=>'co']],
            ]
            ])
]);
file_put_contents('usr.txt', '');
}
#                   المشتركين                   #
if($data == "co" and $update->callback_query->message->chat->id == $admin ){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
        عدد مشتركين البوت📢 :- [ $c ] .
        ",
        'show_alert'=>true,
]);
}
#                   رسالة للكل                   #
if($data == "ce" and $update->callback_query->message->chat->id == $admin){ 
    file_put_contents("usr.txt","yas");
    bot('EditMessageText',[
    'chat_id'=>$update->callback_query->message->chat->id,
    'message_id'=>$update->callback_query->message->message_id,
    'text'=>"▪️ ارسل رسالتك الان 📩 وسيتم نشرها لـ [ $c ] مشترك . 
   ",
    'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>'رجوع','callback_data'=>'off']]    
        ]
    ])
    ]);
}

if($text and $modxe == "yas" and $chat_id == $admin ){
    for ($i=0; $i < count($u); $i++) { 
        bot('sendMessage',[
          'chat_id'=>$u[$i],
          'text'=>"$text",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);
    file_put_contents("usr.txt","no");

} 
}


$sudo = $chat_id; // ايديك

if($message->from->id == $sudo){
    if($text == '🚸┋نسخة للبوت'){
	bot('sendDocument',[
	'chat_id'=>$admin,
	'document'=>new CURLFile(__FILE__)
]);
}
	 if(preg_match('/جلب ملف .*/',$text)){
	 	$text = str_replace('جلب ملف','',$text);
	 	bot('sendDocumet',[
	 		'chat_id'=>$admin,
	 		'document'=>new CURLFile(trim($text))
	 	]);
	}
if(preg_match('/جلب ملف .*/',$text)){
	 	$text = str_replace('جلب ملف','',$text);
	 	bot('deleteDocumet',[
	 		'chat_id'=>$admin,
	 		'document'=>new CURLFile(trim($text))
	 	]);
	}
	if($text == '📮┋نسخة احتياطيه'){
		$sc = scandir(__DIR__);
		for($i=0;$i<count($sc);$i++){
			if(is_file($sc[$i])){
				bot('sendDocument',[
					'chat_id'=>$admin,
					'document'=>new CURLFile($sc[$i])
				]);
			}
		}
	}
	//لــ ماثيو┇(مٰٰ̲     
if($message->reply_to_message->document and $text == 'رفع الملف'){
     $file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->reply_to_message->document->file_id])->result->file_path;
     file_put_contents($message->reply_to_message->document->file_name,file_get_contents($file));
     bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>'- تم رفع الملف 
• رابط الملف ↙️
https://dev-alhayealmsare.pantheonsite.io/'.$message->reply_to_message->document->file_name
         ]);
 }
}	
if($text == "😎💪Proاحصل عل نسخة"){
bot('sendMessage',[
'chat_id'=>$admin, 
'text'=>"راسل المطور @husseiny2",
'reply_to_message_id'=>$message->message_id, 
  'parse_mode'=>'MARKDOWN',
]);
}

if($text == "🗂┋رفع ملف"){
bot('sendMessage',[
'chat_id'=>$admin, 
'text'=>"
☑️┋ارسل الملف الان
  ☑️┋بعدها قم بعمل رد على الملف واكتب `رفع الملف 
  قم بي تشفير اسم الملف لتجنب توقف البوت 
  تجنب وجود مسافه او اي حروف غير الانجليزيه حتي يعمل معك بشكل صحيح`",
'reply_to_message_id'=>$message->message_id, 
  'parse_mode'=>'MARKDOWN',
]);
}
if($text == "💎┋مساعدة"){
bot('sendMessage',[
'chat_id'=>$admin, 
'text'=>"🚸┋مرحبا بك في قسم المساعده
✔️┋كيف رفع ملف؟
┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ 
 🔘┋طريقه الرفع
┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ 
1- قم بأرسال الملف الى البوت
2- قم بعمل رد واختر في الكيبورد رفع ملف
3- هكذا قمت برفع ملف على الاستضافه
┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ 
🔘┋كيف استخراج رابط الاستضافه
┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ 
1- قم بـ الظغط على `اضف رابط استضافه`
2- بعدها ارسل رابط الاستضافه الخاص بك
- رابط الاستضافه يكون هكذا
https://dev-alhayealmsare.pantheonsite.io/اسم الملف
- كمثال☑️
https://dev-alhayealmsare.pantheonsite.io/alhayealmsare.php
┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ┉ ",
'reply_to_message_id'=>$message->message_id, 
]);
}
