<?php
/** ------------ BPT Version ------------ */
$version = 1.04;
/** ------------ BPT Version ------------ */
/** ----------- Check Included ---------- */
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {die("<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><title>Protected By BPT proto</title><style>* {-webkit-box-sizing: border-box;box-sizing: border-box;}body {padding: 0;margin: 0;}#notfound {position: relative;height: 100vh;}#notfound .notfound {position: absolute;left: 50%;top: 50%;-webkit-transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);}.notfound {max-width: 410px;width: 100%;text-align: center;}.notfound .notfound-404 {height: 280px;position: relative;z-index: -1;}.notfound .notfound-404 h1 {font-family: 'Montserrat', sans-serif;font-size: 230px;margin: 0px;font-weight: 900;position: absolute;left: 50%;-webkit-transform: translateX(-50%);-ms-transform: translateX(-50%);transform: translateX(-50%);background: url('https://bpt-proto.site/BPT/err.jpg') no-repeat;-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-size: cover;background-position: center;}@media only screen and (max-width: 767px){.notfound .notfound-404 {height: 142px;}.notfound .notfound-404 h1 {font-size: 112px;}}</style></head><body><div id=\"notfound\"><div class=\"notfound\"><div class=\"notfound-404\"><h1>BPT</h1></div></div></div></body></html>");}
/** ----------- Check Included ---------- */
/** --------- Check Php version --------- */
$old = false;
if (PHP_MAJOR_VERSION === 5 || (PHP_MAJOR_VERSION === 7 && PHP_MINOR_VERSION === 0)) {
    $old = true;
}
if($_SERVER['SERVER_NAME'] === 'localhost' || isset($_SERVER['ANDROID_DATA'])){
    die('you cant run this on localhost');
}
if ($old) {
    $newline = PHP_EOL;
    if (PHP_SAPI !== 'cli') {
        $newline = '<br>'.$newline;
    }
    echo "you are using an old and bugged version of php, please update to php 7.3$newline supported versions: php 7.1, 7.2 , 7.3+$newline recommended version: php 7.3$newline";
}
/** --------- Check Php version --------- */
/** --------- Check BPT version --------- */
$res = file_get_contents('https://BPT-Proto.site/BPT/BPTv.php');
if($res != $version){
    copy('https://BPT-Proto.site/BPT/BPT.php','BPT.php');
}
date_default_timezone_set("Asia/Tehran");
if(!file_exists('BPT.log')){
    define('LOG',fopen('BPT.log','a+'));
    fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @Master_Devloper\nOur Channel : @BPT_Proto\nOur Website : https://bpt-proto.site\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\n");
    fwrite(LOG,"INFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED 10MB\n\n");
}
/** --------- Check BPT version --------- */
class BPT{
    private $token = '';
    private $start = false;
    public function __construct($token_bot) {
        $this->token = $token_bot;
    }
    public function start($settings = []){
        if(!is_array($settings)){
            fwrite(LOG,date('Y/m/d H:i:s').": setting parameter must be array");
            throw new Exception('setting must be array');
        }else{
            $security = isset($settings['security'])?$settings['security']:null;
            $secure_folder = isset($settings['secure_folder'])?$settings['secure_folder']:null;
            $logsize = isset($settings['log_size'])?$settings['log_size']:null;
        }
        fwrite(LOG,date('Y/m/d H:i:s').": BPT STARTED\n");
        if($security === true){
            fwrite(LOG,date('Y/m/d H:i:s').": BPT security is on!\n");
            ini_set('magic_quotes_gpc','off');
            ini_set('sql.safe_mode','on');
            ini_set('max_execution_time',30);
            ini_set('max_input_time',30);
            ini_set('memory_limit','20M');
            ini_set('post_max_size','8K');
            ini_set('expose_php','off');
            ini_set('file_uploads','off');
            ini_set('display_errors',0);
            ini_set('error_reporting',0);
        }
        if($secure_folder === true){
            fwrite(LOG,date('Y/m/d H:i:s').": BPT security folder is on!\n");
            $address = explode('/',$_SERVER['REQUEST_URI']);
            unset($address[count($address)-1]);
            $address = implode('/',$address).'/BPT.php';
            $text = "ErrorDocument 404 $address
ErrorDocument 403 $address
 Options -Indexes
  Order Deny,Allow
Deny from all
Allow from 127.0.0.1
<Files *.php>
    Order Allow,Deny
    Allow from all
</Files>";
            if(!file_exists('.htaccess') || filesize('.htaccess') != strlen($text)){
                file_put_contents('.htaccess',$text);
            }
        }
        if($logsize != null){
            if(is_numeric($logsize)){
                $logsize = round($logsize,0);
            }else{
                $logsize = 10;
            }
            if(file_exists('BPT.log')){
                if(!(filesize('BPT.log') > $logsize*1024*1024)){
                    define('LOG',fopen('BPT.log','a+'));
                }else{
                    define('LOG',fopen('BPT.log','w+'));
                    fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @Master_Devloper\nOur Channel : @BPT_Proto\nOur Website : https://bpt-proto.site\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\n");
                    fwrite(LOG,"INFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED $logsize"."MB\n\n");
                }
            }
        }else{
            if(file_exists('BPT.log')){
                if(!(filesize('BPT.log') > 10*1024*1024)){
                    define('LOG',fopen('BPT.log','a+'));
                }else{
                    define('LOG',fopen('BPT.log','w+'));
                    fwrite(LOG,"♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\nTnx for using our library\nSome information about us :\nAuthor : @Im_Miaad\nHelper : @Master_Devloper\nOur Channel : @BPT_Proto\nOur Website : https://bpt-proto.site\n\nIf you have any problem with our library\nContact to our supports\n♥♥♥♥♥♥♥♥♥♥♥♥♥♥ BPT PROTO  ♥♥♥♥♥♥♥♥♥♥♥♥♥♥\n");
                    fwrite(LOG,"INFO : BPT PROTO LOG STARTED ...\nWARNING : THIS FILE AUTOMATICALLY DELETED WHEN ITS SIZE REACHED 10MB\n\n");
                }
            }
        }
        $this->start = true;
        if(!file_exists('BPT.look')){
            fwrite(LOG , date('Y/m/d H:i:s') . ": BPT webhook was setted\n");
            $res = json_decode(file_get_contents('https://api.telegram.org/bot' . $this->token . '/setwebhook?url=https:// '. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']) , true);
            if($res['ok'] === true){
                touch('BPT.look');
                die('webhook was setted');
            }else{
                print_r($res);
                die();
            }
        }
        else{$telegram_ip_ranges=[['lower'=>'149.154.160.0', 'upper'=>'149.154.175.255'], ['lower'=>'91.108.4.0', 'upper'=>'91.108.7.255'],];$ip_dec=(float)sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));$ok=false;foreach($telegram_ip_ranges as $telegram_ip_range) if(!$ok){$lower_dec=(float)sprintf("%u", ip2long($telegram_ip_range['lower']));$upper_dec=(float)sprintf("%u", ip2long($telegram_ip_range['upper']));if($ip_dec>=$lower_dec and $ip_dec<=$upper_dec) $ok=true;}if(!$ok){fwrite(LOG,time()." BPT Wrong access denied\n");die("<!DOCTYPE html><html lang=\"en\"><head><meta charset=\"utf-8\"><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><title>Protected By BPT proto</title><style>* {-webkit-box-sizing: border-box;box-sizing: border-box;}body {padding: 0;margin: 0;}#notfound {position: relative;height: 100vh;}#notfound .notfound {position: absolute;left: 50%;top: 50%;-webkit-transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);}.notfound {max-width: 410px;width: 100%;text-align: center;}.notfound .notfound-404 {height: 280px;position: relative;z-index: -1;}.notfound .notfound-404 h1 {font-family: 'Montserrat', sans-serif;font-size: 230px;margin: 0px;font-weight: 900;position: absolute;left: 50%;-webkit-transform: translateX(-50%);-ms-transform: translateX(-50%);transform: translateX(-50%);background: url('https://bpt-proto.site/BPT/err.jpg') no-repeat;-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-size: cover;background-position: center;}@media only screen and (max-width: 767px){.notfound .notfound-404 {height: 142px;}.notfound .notfound-404 h1 {font-size: 112px;}}</style></head><body><div id=\"notfound\"><div class=\"notfound\"><div class=\"notfound-404\"><h1>BPT</h1></div></div></div></body></html>");}}
        fwrite(LOG,date('Y/m/d H:i:s').": BPT telegram access granted\n");
        $update = json_decode(file_get_contents("php://input"), true);
        if(isset($update) && !is_null($update)){
            fwrite(LOG,date('Y/m/d H:i:s').": BPT update received\n");
            if(isset($update['inline_query'])){
                fwrite(LOG,date('Y/m/d H:i:s').": BPT update is inline_query\n");
                $inline_query=$update['inline_query'];
                $this->users($inline_query,'inline');
                @$this->inline_query($inline_query);
            }
            elseif(isset($update['callback_query'])){
                fwrite(LOG,date('Y/m/d H:i:s').": BPT update is callback_query\n");
                $callback_query=$update['callback_query'];
                $this->users($callback_query,'callback');
                @$this->callback_query($callback_query);
            }
            elseif(isset($update['message'])){
                fwrite(LOG,date('Y/m/d H:i:s').": BPT update is message\n");
                $message=$update['message'];
                $this->users($message,'message');
                if($security === true){
                    $text = $message['text'];
                    $message['text'] = htmlentities(strip_tags(htmlspecialchars(stripslashes(trim($text)))));
                }
                @$this->message($message);
            }
            elseif(isset($update['edited_message'])){
                fwrite(LOG,date('Y/m/d H:i:s').": BPT update is edited_message\n");
                $edited_message=$update['edited_message'];
                $this->users($edited_message,'edit');
                @$this->edited_message($edited_message);
            }
        }
    }
    private function bot($method, $datas = [])
    {
        if($this->start === true){
            fwrite(LOG,date('Y/m/d H:i:s').": BPT $method function used\n");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $this->token . '/' . $method);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
            return json_decode(curl_exec($ch),true);
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT $method function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    /** --------- Telegram Function --------- */
    public function getUpdates($array)
    {
        if(is_array($array)){
            return $this->bot('getUpdates', $array);
        }else{
            throw new Exception('input value most be array');
        }
    } /** Don't Use It */
    public function setWebhook($array)
    {
        if(is_array($array)){
            return $this->bot('setWebhook', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function deleteWebhook(){
        return $this->bot('deleteWebhook');
    }
    public function getWebhookInfo(){
        return $this->bot('getWebhookInfo');
    }
    public function getMe(){
        return $this->bot('getMe');
    }
    public function sendMessage($array)
    {
        if(is_array($array)){
            return $this->bot('sendMessage', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function forwardMessage($array)
    {
        if(is_array($array)){
            return $this->bot('forwardMessage',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendPhoto($array)
    {
        if(is_array($array)){
            return $this->bot('sendPhoto',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendAudio($array)
    {
        if(is_array($array)){
            return $this->bot('sendAudio',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendDocument($array)
    {
        if(is_array($array)){
            return $this->bot('sendDocument',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendVideo($array)
    {
        if(is_array($array)){
            return $this->bot('sendVideo',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendAnimation($array)
    {
        if(is_array($array)){
            return $this->bot('sendAnimation',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendVoice($array)
    {
        if(is_array($array)){
            return $this->bot('sendAudio',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendVideoNote($array)
    {
        if(is_array($array)){
            return $this->bot('sendVideoNote',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendMediaGroup($array)
    {
        if(is_array($array)){
            return $this->bot('sendMediaGroup',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendLocation($array)
    {
        if(is_array($array)){
            return $this->bot('sendLocation',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function editMessageLiveLocation($array)
    {
        if(is_array($array)){
            return $this->bot('editMessageLiveLocation',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function stopMessageLiveLocation($array)
    {
        if(is_array($array)){
            return $this->bot('stopMessageLiveLocation',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendVenue($array)
    {
        if(is_array($array)){
            return $this->bot('sendVenue',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendContact($array)
    {
        if(is_array($array)){
            return $this->bot('sendContact',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendPoll($array)
    {
        if(is_array($array)){
            return $this->bot('sendPoll',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendDice($array)
    {
        if(is_array($array)){
            return $this->bot('sendDice',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendChatAction($array)
    {
        if(is_array($array)){
            return $this->bot('sendChatAction',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getUserProfilePhotos($array)
    {
        if(is_array($array)){
            return $this->bot('getUserProfilePhotos',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getFile($array)
    {
        if(is_array($array)){
            return $this->bot('getFile',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function kickChatMember($array)
    {
        if(is_array($array)){
            return $this->bot('kickChatMember',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function unbanChatMember($array)
    {
        if(is_array($array)){
            return $this->bot('unbanChatMember',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function restrictChatMember($array)
    {
        if(is_array($array)){
            return $this->bot('restrictChatMember',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function promoteChatMember($array)
    {
        if(is_array($array)){
            return $this->bot('promoteChatMember',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatAdministratorCustomTitle($array)
    {
        if(is_array($array)){
            return $this->bot('setChatAdministratorCustomTitle',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatPermissions($array)
    {
        if(is_array($array)){
            return $this->bot('setChatPermissions',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function exportChatInviteLink($array)
    {
        if(is_array($array)){
            return $this->bot('exportChatInviteLink',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatPhoto($array)
    {
        if(is_array($array)){
            return $this->bot('setChatPhoto',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function deleteChatPhoto($array)
    {
        if(is_array($array)){
            return $this->bot('deleteChatPhoto',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatTitle($array)
    {
        if(is_array($array)){
            return $this->bot('setChatTitle',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatDescription($array)
    {
        if(is_array($array)){
            return $this->bot('setChatDescription',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function pinChatMessage($array)
    {
        if(is_array($array)){
            return $this->bot('pinChatMessage',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function unpinChatMessage($array)
    {
        if(is_array($array)){
            return $this->bot('unpinChatMessage',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function leaveChat($array)
    {
        if(is_array($array)){
            return $this->bot('leaveChat',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getChat($array)
    {
        if(is_array($array)){
            return $this->bot('getChat',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getChatAdministrators($array)
    {
        if(is_array($array)){
            return $this->bot('getChatAdministrators',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getChatMembersCount($array)
    {
        if(is_array($array)){
            return $this->bot('getChatMembersCount',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getChatMember($array)
    {
        if(is_array($array)){
            return $this->bot('getChatMember',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setChatStickerSet($array)
    {
        if(is_array($array)){
            return $this->bot('setChatStickerSet',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function deleteChatStickerSet($array)
    {
        if(is_array($array)){
            return $this->bot('deleteChatStickerSet',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function answerCallbackQuery($array)
    {
        if(is_array($array)){
            return $this->bot('answerCallbackQuery',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setMyCommands($array)
    {
        if(is_array($array)){
            return $this->bot('setMyCommands',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getMyCommands(){
        return $this->bot('getMyCommands');
    }
    public function editMessageText($array)
    {
        if(is_array($array)){
            return $this->bot('editMessageText',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function editMessageCaption($array)
    {
        if(is_array($array)){
            return $this->bot('editMessageCaption',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function editMessageMedia($array)
    {
        if(is_array($array)){
            return $this->bot('editMessageMedia',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function editMessageReplyMarkup($array)
    {
        if(is_array($array)){
            return $this->bot('editMessageReplyMarkup',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function stopPoll($array)
    {
        if(is_array($array)){
            return $this->bot('stopPoll',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function deleteMessage($array)
    {
        if(is_array($array)){
            return $this->bot('deleteMessage',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function answerInlineQuery($array)
    {
        if(is_array($array)){
            return $this->bot('answerInlineQuery',$array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendSticker($array)
    {
        if(is_array($array)){
            return $this->bot('sendSticker', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getStickerSet($array)
    {
        if(is_array($array)){
            return $this->bot('getStickerSet', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function uploadStickerFile($array)
    {
        if(is_array($array)){
            return $this->bot('uploadStickerFile', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function createNewStickerSet($array)
    {
        if(is_array($array)){
            return $this->bot('createNewStickerSet', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function addStickerToSet($array)
    {
        if(is_array($array)){
            return $this->bot('addStickerToSet', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setStickerPositionInSet($array)
    {
        if(is_array($array)){
            return $this->bot('setStickerPositionInSet', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function deleteStickerFromSet($array)
    {
        if(is_array($array)){
            return $this->bot('deleteStickerFromSet', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setStickerSetThumb($array)
    {
        if(is_array($array)){
            return $this->bot('setStickerSetThumb', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendInvoice($array)
    {
        if(is_array($array)){
            return $this->bot('sendInvoice', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function answerShippingQuery($array)
    {
        if(is_array($array)){
            return $this->bot('answerShippingQuery', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function answerPreCheckoutQuery($array)
    {
        if(is_array($array)){
            return $this->bot('answerPreCheckoutQuery', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function sendGame($array)
    {
        if(is_array($array)){
            return $this->bot('sendGame', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function setGameScore($array)
    {
        if(is_array($array)){
            return $this->bot('setGameScore', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    public function getGameHighScores($array)
    {
        if(is_array($array)){
            return $this->bot('getGameHighScores', $array);
        }else{
            throw new Exception('input value most be array');
        }
    }
    /** --------- Telegram Function --------- */
    /** ---------- Extra Function ----------- */
    public function jsonSave($array){
        if($this->start === true){
            if(is_array($array)){
                if(isset($array['name'])){
                    $name = $array['name'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT jsonSave function used\nError : name parameter not found");
                    throw new Exception('name parameter not found');
                }
                if(isset($array['data'])){
                    $data = $array['data'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT jsonSave function used\nError : data parameter not found");
                    throw new Exception('data parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT jsonSave function used\n");
                if(is_array($data)){
                    $data = json_encode($data);
                }
                if($name === 'BPT.php'){
                    $name = 'BPT2.php';
                }
                file_put_contents($name , $data);
                return true;
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonSave function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }
        else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonSave function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function jsonGet($array){
        if($this->start === true){
            if(is_array($array)){
                if(isset($array['name'])){
                    $name = $array['name'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT jsonGet function used\nError : name parameter not found");
                    throw new Exception('name parameter not found');
                }
                if(isset($array['type'])){
                    $type = $array['type'];
                }else{
                    $type = true;
                }
                fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonGet function used\n");
                if($name === 'BPT.php'){
                    $name = 'BPT2.php';
                }
                if(file_exists($name)){
                    return json_decode(file_get_contents($name) , $type);
                }else{
                    return false;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonGet function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonGet function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function jsonDel($array){
        if($this->start === true){
            if(is_array($array)){
                if(isset($array['name'])){
                    $name = $array['name'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT jsonDel function used\nError : name parameter not found");
                    throw new Exception('name parameter not found');
                }
                fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonDel function used\n");
                if($name === 'BPT.php'){
                    $name = 'BPT2.php';
                }
                if(file_exists($name)){
                    unlink($name);
                    return true;
                }else{
                    return false;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonDel function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonDel function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    private function users($update,$a){
        if(!file_exists('BPT-users.json')){
            file_put_contents('BPT-users.json',json_encode(['private'=>[],'group'=>[],'supergroup'=>[],'channel'=>[]]));
        }
        $BPT_user = json_decode(file_get_contents('BPT-users.json'),true);
        if($a == 'message'){
            $type = $update['chat']['type'];
            $id = $update['from']['id'];
            $BPT_user[$type][$id][0]+=1;
        }
        elseif($a == 'inline'){
            $id = $update['from']['id'];
        }
        elseif($a == 'callback'){
            $type = $update['message']['chat']['type'];
            $id = $update['from']['id'];
            $BPT_user[$type][$id][1]+=1;
        }
        elseif($a == 'edit'){
            $type = $update['chat']['type'];
            $id = $update['from']['id'];
            $BPT_user[$type][$id][2]+=1;
        }
        if(isset($type)){
            if(!isset($BPT_user[$type][$id])){
                $BPT_user[$type][$id]=[0,0,0];
            }
        }
        file_put_contents('BPT-users.json',json_encode($BPT_user));
    }
    public function forward2users($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['msgid'])){
                    $msgid = $array['msgid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : msgid parameter not found");
                    throw new Exception('msgid parameter not found');
                }
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\n");
                $BPT_user=json_decode(file_get_contents('BPT-users.json'), true);
                foreach($BPT_user['private'] as $id=>$x){
                    $this->forwardMessage(['chat_id'=>$id, 'from_chat_id'=>$chatid, 'message_id'=>$msgid]);
                }
                return true;
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function forward2groups($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2groups function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['msgid'])){
                    $msgid = $array['msgid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2groups function used\nError : msgid parameter not found");
                    throw new Exception('msgid parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT forward2groups function used\n");
                $BPT_user = json_decode(file_get_contents('BPT-users.json') , true);
                foreach($BPT_user['groups'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2groups function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function forward2supergroups($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2supergroups function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['msgid'])){
                    $msgid = $array['msgid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2supergroups function used\nError : msgid parameter not found");
                    throw new Exception('msgid parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT forward2supergroups function used\n");
                $BPT_user = json_decode(file_get_contents('BPT-users.json') , true);
                foreach($BPT_user['supergroup'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2supergroups function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function forward2gps($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2gps function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['msgid'])){
                    $msgid = $array['msgid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2gps function used\nError : msgid parameter not found");
                    throw new Exception('msgid parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT forward2gps function used\n");
                $BPT_user = json_decode(file_get_contents('BPT-users.json') , true);
                foreach($BPT_user['groups'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
                foreach($BPT_user['supergroup'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2gps function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function forward2all($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2all function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['msgid'])){
                    $msgid = $array['msgid'];
                }else{
                    fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2all function used\nError : msgid parameter not found");
                    throw new Exception('msgid parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT forward2all function used\n");
                $BPT_user = json_decode(file_get_contents('BPT-users.json') , true);
                foreach($BPT_user['private'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
                foreach($BPT_user['groups'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
                foreach($BPT_user['supergroup'] as $id => $x){
                    $this->forwardMessage(['chat_id' => $id , 'from_chat_id' => $chatid , 'message_id' => $msgid]);
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2users function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT forward2all function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function stats(){
        if($this->start===true){
            fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonSave function used\n");
            $BPT_user=json_decode(file_get_contents('BPT-users.json'), true);
            $BPT_users=count($BPT_user['private']);
            $BPT_group=count($BPT_user['group']);
            $BPT_sgroup=count($BPT_user['supergroup']);
            $BPT_channel=count($BPT_user['channel']);
            return ['users'=>$BPT_users, 'groups'=>$BPT_group, 'supergroups'=>$BPT_sgroup, 'channels'=>$BPT_channel];
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT jsonSave function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function statsHere($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['chatid'])){
                    $chatid = $array['chatid'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT statsHere function used\nError : chatid parameter not found");
                    throw new Exception('chatid parameter not found');
                }
                if(isset($array['type'])){
                    $type = $array['type'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT statsHere function used\nError : type parameter not found");
                    throw new Exception('type parameter not found');
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT statsHere function used\n");
                $BPT_user = json_decode(file_get_contents('BPT-users.json') , true);
                if(isset($BPT_user[$type][$chatid])){
                    $callback = $BPT_user[$type][$chatid][1];
                    $message = $BPT_user[$type][$chatid][0];
                    $edit = $BPT_user[$type][$chatid][2];
                    return ['callback_query' => $callback , 'message' => $message , 'edited_message' => $edit];
                }else{
                    return false;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT statsHere function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT statsHere function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function delete($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['path'])){
                    $path = $array['path'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT delete function used\nError : path parameter not found");
                    throw new Exception('path parameter not found');
                }
                if(isset($array['sub'])){
                    $sub = $array['sub'];
                }else{
                    $sub = true;
                }
                if(is_dir($path)){
                    if(count(scandir($path)) > 2){
                        if($sub){
                            $it = new RecursiveDirectoryIterator($path , RecursiveDirectoryIterator::SKIP_DOTS);
                            $files = new RecursiveIteratorIterator($it , RecursiveIteratorIterator::CHILD_FIRST);
                            foreach($files as $file){
                                if($file->isDir()){
                                    rmdir($file->getRealPath());
                                }else{
                                    unlink($file->getRealPath());
                                }
                            }
                            rmdir($path);
                            return true;
                        }else{
                            fwrite(LOG , date('Y/m/d H:i:s') . ": BPT delete function used\nError : delete function cannot delete folder because its have subfiles and sub parameter haven't true value");
                            throw new Exception('folder have subfiles');
                        }
                    }else rmdir($path);
                }elseif(basename($path) !== 'BPT.php') unlink($path);
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT delete function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT delete function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function time2string($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['datetime'])){
                    $datetime = $array['datetime'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT time2string function used\nError : datetime parameter not found");
                    throw new Exception('datetime parameter not found');
                }
                if(is_numeric($datetime)){
                    $now = new DateTime;
                    $input = new DateTime('@' . $datetime);
                    if($now < $input) $status = 'later';else $status = 'ago';
                    $diff = $now->diff($input);
                    $diff->w = floor($diff->d / 7);
                    $string = ['year' => 'y' , 'month' => 'm' , 'week' => 'w' , 'day' => 'd' , 'hour' => 'h' , 'minute' => 'i' , 'second' => 's'];
                    foreach($string as $k => &$v){
                        if($diff->$v) $v = $diff->$v;else unset($string[$k]);
                    }
                    $string['status'] = $status;
                    return count($string) > 1 ? $string : ['status' => 'now'];
                }else{
                    return false;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT time2string function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT time2string function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function objectToArrays($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['object'])){
                    $object = $array['object'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT objectToArrays function used\nError : datetime parameter not found");
                    throw new Exception('object parameter not found');
                }
                if(!is_object($object) && !is_array($object)){
                    return $object;
                }
                if(is_object($object)){
                    $object = get_object_vars($object);
                }
                return array_map("objectToArrays" , $object);
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT objectToArrays function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT objectToArrays function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function RandomString($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['characters'])){
                    $characters = $array['characters'];
                }else{
                    $characters = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ';
                }
                if(isset($array['length'])){
                    $length = $array['length'];
                }else{
                    $length = 16;
                }
                $randstring = '';
                for ($i = 0; $i < $length; $i++) {
                    $randstring .= $characters[rand(0, strlen($characters)-1)];
                }
                return $randstring;
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT RandomString function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT RandomString function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function Crypto($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['action'])){
                    $action = $array['action'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT Crypto function used\nError : datetime parameter not found");
                    throw new Exception('action parameter not found');
                }
                if(isset($array['string'])){
                    $string = $array['string'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT Crypto function used\nError : datetime parameter not found");
                    throw new Exception('string parameter not found');
                }
                if(isset($array['key'])){
                    $key = $array['key'];
                }else{
                    $key = '';
                }
                if(isset($array['iv'])){
                    $iv = $array['iv'];
                }else{
                    $iv = 'true';
                }
                if ($action == 'enc') {
                    $key = hash('sha256', $this->RandomString(['length'=>64]));
                    $iv = substr(hash('sha256', $this->RandomString(['length'=>64])),48);
                    $output = base64_encode(openssl_encrypt($string, "AES-256-CBC", $key,1,$iv));
                    return ['hash'=>$output,'key'=>$key,'iv'=>$iv];
                }
                elseif ($action == 'dec') {
                    $output = openssl_decrypt(base64_decode($string), "AES-256-CBC", $key,1,$iv);
                    return $output;
                }
                else{
                    return false;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT Crypto function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT Crypto function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function Zip($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['path'])){
                    $path = $array['path'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT Zip function used\nError : datetime parameter not found");
                    throw new Exception('path parameter not found');
                }
                if(isset($array['dest'])){
                    $dest = $array['dest'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT Zip function used\nError : datetime parameter not found");
                    throw new Exception('dest parameter not found');
                }
                $rootPath = realpath($path);
                $Zip = new ZipArchive();
                $Zip->open($dest, ZipArchive::CREATE | ZipArchive::OVERWRITE);
                $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath),RecursiveIteratorIterator::LEAVES_ONLY);
                foreach ($files as $file)
                {
                    if (!$file->isDir())
                    {
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($rootPath) + 1);
                        $Zip->addFile($filePath, $relativePath);
                    }
                }
                $Zip->close();
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT Zip function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT Zip function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    public function api($array){
        if($this->start===true){
            if(is_array($array)){
                if(isset($array['type'])){
                    $type = $array['type'];
                }else{
                    fwrite(LOG , date('Y/m/d H:i:s') . ": BPT api function used\nError : type parameter not found");
                    throw new Exception('type parameter not found');
                }
                if(isset($array['option'])){
                    $option = $array['option'];
                }else{
                    $option = [];
                }
                fwrite(LOG , date('Y/m/d H:i:s') . ": BPT api function used , API type is $type\n");
                switch($type){
                    case 'alaki':
                        return json_decode(file_get_contents('https://poty.fun/apis/alaki.php') , true)['results'];
                        break;
                    case 'arz':
                        return json_decode(file_get_contents('https://poty.fun/apis/arz.php?type=arz') , true)['results'];
                        break;
                    case 'tala':
                        return json_decode(file_get_contents('https://poty.fun/apis/arz.php?type=tala') , true)['results'];
                        break;
                    case 'arzdigital':
                        return json_decode(file_get_contents('https://poty.fun/apis/arzdigital.php') , true)['results'];
                        break;
                    case 'ayam':
                        return json_decode(file_get_contents('https://poty.fun/apis/ayam.php') , true)['results'];
                        break;
                    case 'danestani':
                        return json_decode(file_get_contents('https://poty.fun/apis/danestani.php') , true)['results'];
                        break;
                    case 'dastan':
                        return json_decode(file_get_contents('https://poty.fun/apis/dastan.php') , true)['results'];
                        break;
                    case 'chistan':
                        return json_decode(file_get_contents('https://poty.fun/apis/chistan.php') , true)['results'][0];
                        break;
                    case 'dialog':
                        return json_decode(file_get_contents('https://poty.fun/apis/dialog.php') , true)['results'];
                        break;
                    case 'hadis':
                        return json_decode(file_get_contents('https://poty.fun/apis/hadis2.php') , true)['results'];
                        break;
                    case 'joke':
                        return json_decode(file_get_contents('https://poty.fun/apis/joke.php') , true)['results'];
                        break;
                    case 'fall':
                        return "https://poty.fun/apis/fal.php";
                        break;
                    case 'khatere':
                        return json_decode(file_get_contents('https://poty.fun/apis/khatere.php') , true)['results'];
                        break;
                    case 'pnp':
                        return json_decode(file_get_contents('https://poty.fun/apis/pnp.php') , true)['results'];
                        break;
                    case 'noroz':
                        return json_decode(file_get_contents('https://poty.fun/apis/noroz.php') , true)['results'];
                        break;
                    case 'capcha':
                        return json_decode(file_get_contents('https://poty.fun/apis/capcha2.php') , true)['results'];
                        break;
                    case 'time':
                        return json_decode(file_get_contents('https://poty.fun/apis/time.php') , true)['results'];
                        break;
                    case 'pdf':
                        if($option !== null){
                            if(is_array($option)){
                                if(isset($option['url'])){
                                    $url = urlencode($option['url']);
                                    return "https://poty.fun/apis/topdf.php?url=$url";
                                }else{
                                    throw new Exception('pdf api need url field!');
                                }
                            }else{
                                throw new Exception('array parameter must be array!');
                            }
                        }else{
                            throw new Exception('You must insert array parameter!');
                        }
                        break;
                    case 'num2text':
                        if($option !== null){
                            if(is_array($option)){
                                if(isset($option['num'])){
                                    //۰۱۲۳۴۵۶۷۸۹
                                    $option['num'] = str_replace(['۰' , '۱' , '۲' , '۳' , '۴' , '۵' , '۶' , '۷' , '۸' , '۹'] , [0 , 1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9] , $option['num']);
                                    $url = urlencode($option['num']);
                                    return "https://poty.fun/apis/num.php?num=$url";
                                }else{
                                    throw new Exception('pdf api need url field!');
                                }
                            }else{
                                throw new Exception('array parameter must be array!');
                            }
                        }else{
                            throw new Exception('You must insert array parameter!');
                        }
                        break;
                    default:
                        return false;
                        break;
                }
            }else{
                fwrite(LOG,date('Y/m/d H:i:s').": BPT api function used\nError : input most be array");
                throw new Exception('input most be array');
            }
        }else{
            fwrite(LOG,date('Y/m/d H:i:s').": BPT api function used\nError : You must use start function for use this function");
            throw new Exception('you must use start function');
        }
    }
    /** ---------- Extra Function ----------- */
}
