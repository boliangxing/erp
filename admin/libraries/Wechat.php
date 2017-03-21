<?php
/**
 * 微信接口类
 *
 * 此类可直接用于原生PHP以及其他PHP,如果需要单例模式方式,请重新改造静态方法
 * 此类创建时间20160331,使用时请查阅微信官方文档检查接口是否更新
 *
 * @author      xhsui<137256000@qq.com>
 * @version     1.0
 * @since       1.0
 */
class Wechat{

    private $token = ''; //后前从初始化中传入/配置文件中传入

    private $appID = '';
    private $appsecret = '';

    /* token 路径 */
    private $dir = "";

    /* 用户消息 */
    private $msgData = array();

    /* 网页授权 */
    private $webAccessToken = '';

    /* 用户信息 */
    private $openid = '';

    /* 获取方式 */
    private $scope = 'snsapi_base'; //默认给出的是静默授权

    /* 推送消息 */
    private $pullData = array();

    /* 消息类型常量 */
    const MSG_TYPE_TEXT       = 'text';       //文本消息   收|发
    const MSG_TYPE_IMAGE      = 'image';      //图片消息   收|发
    const MSG_TYPE_VOICE      = 'voice';      //语音消息   收|发
    const MSG_TYPE_VIDEO      = 'video';      //视频消息   收|发
    const MSG_TYPE_MUSIC      = 'music';      //音乐消息     |发
    const MSG_TYPE_NEWS       = 'news';       //图文消息     |发

    const MSG_TYPE_SHORTVIDEO = 'shortvideo'; //小视频消息 收|
    const MSG_TYPE_LOCATION   = 'location';   //地理位置   收|
    const MSG_TYPE_LINK       = 'link';       //链接消息   收|


    const MSG_TYPE_EVENT      = 'event';       //时间推送  收|


    /* 事件类型常量 */
    const MSG_EVENT_subscribe         = 'subscribe';
    const MSG_EVENT_SCAN              = 'SCAN';
    const MSG_EVENT_LOCATION          = 'LOCATION';
    const MSG_EVENT_CLICK             = 'CLICK';
    const MSG_EVENT_MASSSENDJOBFINISH = 'MASSSENDJOBFINISH';

    /* 文件上传类型 */
    const MEDIA = 'media';              //临时
    const MATERIAL = 'material';        //永久

    /* 素材管理 */
    const IMAGE = 'image';    //图片素材
    const VIDEO = 'video';    //视频素材
    const VOICE = 'voice';    //语音素材
    const THUMB  = 'thumb';     //图文素材

    /* 微信API接口 */
    private $apiURL = "https://api.weixin.qq.com/cgi-bin";

    private $requestCodeURL = 'https://open.weixin.qq.com/connect/oauth2/authorize';

    private $oauthApiURL = 'https://api.weixin.qq.com/sns';

    private $userApiURL = 'https://api.weixin.qq.com/cgi-bin/user';
    /**
     * 构造函数
     *
     * 配置微信
     */
    public function __construct($wechatConfig = array()){
        $this->token = $wechatConfig['token'];
        $this->appID = $wechatConfig['appID'];
        $this->appsecret = $wechatConfig['appsecret'];
    }

    public function getAppID(){
        return $this->appID;
    }


    /* 消息管理 */

    /**
     * 获取用户发送的消息
     * @return array 用户消息的主体内容
     */
    public function getResponse(){
        return $this->msgData;
    }

    /**
     * 监听事件推送
     */
    public function pullResponse(){

    }

    /**
     * 自动回复文本消息
     * @param  string $content 发送的文字内容
     */
    public function replyText($text){
        return $this->send(self::MSG_TYPE_TEXT , $text);
    }

    /**
     * 自动回复图片消息
     * @param string $media_id 图片ID
     */
    public function replyImage($media_id){
        return $this->send(self::MSG_TYPE_IMAGE , $media_id);
    }

    /**
     * 自动回复语音消息
     * @param string $media_id 语音ID
     */
    public function replyVoice($media_id){
        return $this->send(self::MSG_TYPE_VOICE, $media_id);
    }

    /**
     * 自动回复视频消息
     * @param  string $media_id 视频ID
     */
    public function replyVideo($media_id ,$title, $description){
        return $this->send(self::MSG_TYPE_VIDEO, func_get_args());
    }

    /**
     * 自动回复音乐消息
     * @param  string $media_id 音乐ID
     */
    public function replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id){
        return $this->send(self::MSG_TYPE_MUSIC, func_get_args());
    }

    /**
     * 自动回复图文消息
     * @return [type] [description]
     */
    public function replyNews($news, $news1, $news2, $news3){
        return $this->send(self::MSG_TYPE_NEWS, func_get_args());
    }

    /**
     * 响应用户发送的消息
     * @return [type] [description]
     */
    public function response(){
        if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
            $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
            $this->msgData = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        }
    }

    /**
     *  自动回复消息
     * 
     * @param string $type text|news 消息类型
     * @param array $content 消息 ;
     * @param string $tag 0|1 星标消息
     */
    private function send($type = 'text', $msg = NULL) {
        $this->response();
        /* 基本参数 */
        $data = array(
            'ToUserName'   => $this->msgData->FromUserName,
            'FromUserName' => $this->msgData->ToUserName,
            'CreateTime'   => time(),
            'MsgType'      => $type
        );
        /* 根据类型解析XML模版发送给微信服务器 */
        switch($type){
            case self::MSG_TYPE_TEXT :
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                        </xml>";
                $this->logger(sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg));
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg);
                break;

            case self::MSG_TYPE_IMAGE : 
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                            </Image>
                        </xml>";
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg);
                break;

            case self::MSG_TYPE_VOICE  :
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Voice>
                            <MediaId><![CDATA[%s]]></MediaId>
                            </Voice>
                        </xml>"; 
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg);
                break;

            case self::MSG_TYPE_VIDEO :
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Video>
                            <MediaId><![CDATA[%s]]></MediaId>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            </Video> 
                        </xml>"; 
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg);
                break;

            case self::MSG_TYPE_MUSIC :
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                            </Music>
                        </xml>"; 
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $msg);
                break;

            case self::MSG_TYPE_VIDEO :
                $tpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Articles>$s</Articles>
                        </xml>";
                // 循环新闻
                foreach($content as $time){
                    $tpl = "<item>
                                <Title><![CDATA[%s]]></Title>
                                <Discription><![CDATA[%s]]></Discription>
                                <PicUrl><![CDATA[%s]]></PicUrl>
                                <Url><![CDATA[%s]]></Url>
                            </item>";
                    $contents .=  $tpl; 
                }
                echo sprintf($tpl, $data['ToUserName'], $data['FromUserName'], $data['CreateTime'], $data['MsgType'], $content);
                break;
            
            default :  return ;

        }
    }





    /* 自定义菜单 */

    /**
     * 创建菜单(认证后的订阅号可用)
     * @param array $data 菜单数组数据
     * type可以选择为以下几种，其中5-8除了收到菜单事件以外，还会单独收到对应类型的信息。
     * 1、click：点击推事件
     * 2、view：跳转URL
     * 3、scancode_push：扫码推事件
     * 4、scancode_waitmsg：扫码推事件且弹出“消息接收中”提示框
     * 5、pic_sysphoto：弹出系统拍照发图
     * 6、pic_photo_or_album：弹出拍照或者相册发图
     * 7、pic_weixin：弹出微信相册发图器
     * 8、location_select：弹出地理位置选择器
     */
    public function menuCreate($button){
        $data = array('button' => $button);
        return $this->api('menu/create', $data);
    }

    /**
     * 获取所有的菜单
     * @return array  自定义菜单数组
     */
    public function menuGet(){
        $rs = $this->api('menu/get', '', 'GET');
        if(isset($rs['menu'])){
            return $rs['menu']['button'];
        }else{
            return false;
        }
        
    }

    /**
     * 删除自定义菜单
     * @return array
     */
    public function menuDelete(){
        return $this->api('menu/delete', '', 'GET');
    }

    /**
     * 创建自定义菜单(认证后的订阅号可用)
     * @param array $data 菜单数组数据
     * type可以选择为以下几种，其中5-8除了收到菜单事件以外，还会单独收到对应类型的信息。
     * 1、click：点击推事件
     * 2、view：跳转URL
     * 3、scancode_push：扫码推事件
     * 4、scancode_waitmsg：扫码推事件且弹出“消息接收中”提示框
     * 5、pic_sysphoto：弹出系统拍照发图
     * 6、pic_photo_or_album：弹出拍照或者相册发图
     * 7、pic_weixin：弹出微信相册发图器
     * 8、location_select：弹出地理位置选择器            
     *
     * @param matchrule array 条件数据，至少有一项不为空
     * 1、group_id 分组ID
     * 2、sex 性别
     * 3、country 国家
     * 4、city 城市
     * 5、client_platform_type 客户端版本IOS(1), Android(2),Others(3)
     * 6、language 语言
     * 
     */
    public function menuConditionalCreate($botton,$matchrule){
        $menuInfo = array(array('button'=>$button),array('matchrule'=>$conditional));
        return $this->api('menu/addconditional', $menuInfo);
    }

    public function menuDelConditional($menuid){
        $parame = array('menuid'=>$menuid);
        return $this->api('menu/delconditional',$parame);
    }

    /**
     * 获取当前公众号菜单配置
     * @return [type] [description]
     */
    public function menuInfo(){
        return $this->api('get_current_selfmenu_info','','GET');
    }

    /**
     * 检测用户菜单
     * @param  string $info 用户信息：公众号/openid
     * @return array 菜单json
     */
    public function menuConditionalTest($info){
        $parame = array('user_id',$info);
        return $this->api('menu/trymatch',$parame);
    }



    /* 素材管理 */

    /**
     * 获取媒体素材
     * @param  string $media_id 素材ID
     * @return 媒体文件
     */
    public function getMedia($media_id, $type = MEDIA){
        switch($type){
            case MEDIA :
                $url = "https://api.weixin.qq.com/cgi-bin/media/get?access_token=$this->access_token&media_id=$media_id";
                return $this->httpGet($url);
                break;
            case MATERIAL :
                $url = "https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=$this->access_token";
                return $this->http_post($url,array('media_id' => $media_id));
                break;
            default : return;
        }
    }

    /**
     * 获取素材总数
     * @return [type] [description]
     */
    public function getMediaCount(){
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$this->getAccessToken();
        return json_decode($this->httpGet($url));
    }

    /**
     * 获取图片素材列表
     * @param  integer $offset [description]
     * @param  integer $count  [description]
     * @return [type]          [description]
     */
    public function getMediaImage($offset=0, $count=20){
        return $this->getMediaList(self::MEDIA_IMAGE, $offset, $count);
    }

    /**
     * 获取语音素材列表
     * @param  integer $offset [description]
     * @param  integer $count  [description]
     * @return [type]          [description]
     */
    public function getMediaVideo($offset=0, $count=20){
        return $this->getMediaList(self::MEDIA_VIDEO, $offset, $count);
    }

    /**
     * 获取视频素材列表
     * @param  integer $offset [description]
     * @param  integer $count  [description]
     * @return [type]          [description]
     */
    public function getMediaVoice($offset=0, $count=20){
        return $this->getMediaList(self::MEDIA_VOICE, $offset, $count);
    }

    /**
     * 获取图片素材列表
     * @param  integer $offset [description]
     * @param  integer $count  [description]
     * @return [type]          [description]
     */
    public function getMediaNews($offset=0, $count=20){
        return $this->getMediaList(self::MEDIA_NEWS, $offset, $count);
    }

    /**
     * 获取素材列表
     * @param  integer $offset [description]
     * @param  integer $count  [description]
     * @return [type]          [description]
     */
    private function getMediaList($type = self::MEDIA_IMAGE, $offset = 0, $count = 20){
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$this->getAccessToken();
        return json_decode($this->http_post($url, self::json_encode_ex(array('type'=>$type, 'offset'=>$offset, 'count'=>$count))));
    }
    
    /**
     * 上传媒体图片（临时）
     * @param  string $filePath 文件地址
     * @return array
     */
    public function uploadMediaImage($file, $saveType = self::MEDIA){
        return $this->uploadMedia($file, self::IMAGE);
    }

    /**
     * 上传媒体语音（临时）
     * @param  string $filePath 文件地址
     * @return array
     */
    public function uploadMediaVoice($filePath='', $saveType = self::MEDIA){
        return $this->uploadMedia($filePath, self::VOICE);
    }

    /**
     * 上传媒体视频（临时）
     * @param  string $filePath [description]
     * @return [type]           [description]
     */
    public function uploadMediaVideo($filePath='', $saveType = self::MEDIA){
        return $this->uploadMedia($filePath, self::VIDEO);
    }

    /**
     * 上传素材缩略图（临时）
     * @param  string $filePath [description]
     * @return [type]           [description]
     */
    public function uploadMediaThumb($filePath='', $saveType = self::MEDIA){
        return $this->uploadMedia($filePath, self::THUMB);
    }

    /**
     * 上传素材图片（永久）
     * @param  string $filePath 文件地址
     * @return array
     */
    public function uploadMaterialImage($mediaInfo){
        return $this->uploadMaterial($mediaInfo, self::IMAGE);
    }

    /**
     * 上传素材语音（永久）
     * @param  string $filePath 文件地址
     * @return array
     */
    public function uploadMaterialVoice($filePath='', $saveType = self::MATERIAL){
        return $this->uploadMedia($filePath, self::VOICE);
    }

    /**
     * 上传素材视频（永久）
     * @param  string $filePath [description]
     * @return [type]           [description]
     */
    public function uploadMaterialVideo($filePath='', $saveType = self::MATERIAL){
        return $this->uploadMedia($filePath, self::VIDEO);
    }

    /**
     * 上传素材缩略图（永久）
     * @param  string $filePath [description]
     * @return [type]           [description]
     */
    public function uploadMaterialThumb($filePath='', $saveType = self::MATERIAL){
        return $this->uploadMedia($filePath, self::THUMB);
    }

    public function uploadMaterial($media, $fileType=self::IMAGE){
        $param = array(
            'media' => $media,
            'type' => $fileType
        );

        $url  = $this->apiURL."/material/add_material?access_token=".$this->getAccessToken();
        return self::http_post($url, $param);
    }

    /**
     * 上传媒体资源
     * @param  string $filePath 媒体资源本地路径
     * @param  string $type     媒体资源类型，具体请参考微信开发手册
     */
    private function uploadWechatServer($filePath = '', $fileType = self::IMAGE, $saveType = self::MEDIA){
        $param = array(
            'access_token' => $this->getAccessToken(),
            'type'         => $fileType
        );

        $filename = realpath($filePath);
        $filename || exit('资源路径错误！');
        
        $file = array('media' => "@{$filePath}");
        $url  = $this->apiURL."/media/upload";
        $data = self::http($url, $param, $file, 'POST');

        return json_decode($data);
    }

    /**
     * 删除永久媒体素材
     * @param  [type] $media_id [description]
     * @return [type]           [description]
     */
    public function delMedia($media_id){
        $url = "https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=$this->access_token";
        return $this->http_post($url,array('media_id' => $media_id));
    }



    /* 用户管理 */

    /**
     * 获取code
     * @param  string $redirect_uri 需要授权网页URI 
     * @param  string $state        状态标识
     * @param  string $scope        请求方式:snsapi_base静默/snsapi_userinfo请求
     * @return string code      
     */
    private function getCode($redirect_uri = '', $state = "STATE"){
        if(isset($_GET['code'])){
            $state != $_GET['state'] && exit('you hava no auth');
            return $_GET['code'];
        }else{
            $redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $query = array(
                'appid'         => $this->appID,
                'redirect_uri'  => $redirect_uri,
                'response_type' => 'code',
                'scope'         => $this->scope,
            );

            if(!is_null($state) && preg_match('/[a-zA-Z0-9]+/', $state)){
                $query['state'] = $state;
            }

            $query = http_build_query($query);
            $url = "{$this->requestCodeURL}?{$query}#wechat_redirect";
            header("Location:$url", true, 301);
        }
    }

    /**
     * 通过网页OAUTH2.0授权的方式获取用户信息
     */
    public function oauth2(){   
        $param = array(
            'appid'      => $this->appID,
            'secret'     => $this->appsecret,
            'code'       => $this->getCode(),
            'grant_type' => 'authorization_code'
        );
        $url = "{$this->oauthApiURL}/oauth2/access_token";
        $result = json_decode(self::http($url, $param));
        $this->webAccessToken = $result->access_token;
        $this->openid = $result->openid;
        //var_dump($result);
    }

    /**
     * 获取WebAccessToken
     * @return string webAccessToken
     */
    private function getWebAccessToken(){
        empty($this->webAccessToken) && $this->oauth2();
        return $this->webAccessToken;
    }

    /**
     * 获取Openid
     * @return string 用户Openid
     */
    public function getOpenid(){
        empty($this->openid) && $this->oauth2();
        return $this->openid;
    }

    /**
     * 通过网页获取用户的信息
     * @param  string $scope 授权方式
     * @param  string $lang  语言
     * @return array        用户信息
     */
    public function getUserInfoByWeb($scope = 'snsapi_base', $lang = 'zh_CN '){
        $this->scope = $scope;
        $url = "{$this->oauthApiURL}/userinfo";

        $param = array(
            'access_token' => $this->getWebAccessToken(),
            'openid'       => $this->getOpenid(),
            'zh_CN'        => $lang
        );
        return json_decode(self::http($url, $param));
    }

    /**
     * 通过Openid获取用户的信息
     * @param  string $openid 
     * @return array  用户信息
     */
    public function getUserInfoByOpenid($openid){
        $url = "{$this->oauthApiURL}/user/info}";

        $param = array(
            'access_token' => $this->getAccessToken(),
            'openid'       => $openid
        );

        return (self::http($url, $param));
    }


    /**
     * 分组
     */
    
    /**
     * 备注
     */
    
    /**
     * 用户列表
     */
    public function getUserList($next_openid = ''){
        $url = "{$this->userApiURL}/get";
        $param = empty($next_openid) ? 
            array('access_token'=> $this->getAccessToken()) :
            array(
                'access_token'=> $this->getAccessToken(), 
                'next_openid' => $next_openid
            );
        return json_decode(self::http($url, $param));
    }



    /**
     * 用户地理位置
     */








    /* 方法 */

    /**
     * 微信认证事件推送
     */


    /**
     * 生成二维码
     */



    /**
     * 微信绑定本机URL校验
     */
    public function valid() {
        if(isset($_GET["echostr"])){
            //$this->logger($_GETP['echostr ']);
            echo $this->checkSignature() ? $_GET["echostr"] : exit;
            exit;
        }
    }

    /**
     * 校验签名
     */
    public function checkSignature() {
        $signature = isset($_GET['signature']) ? $_GET['signature'] : '';
        $timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : '';
        $nonce = isset($_GET['nonce']) ? $_GET['nonce'] : '';
                    
        $tmpArr = array($this->token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = sha1(implode( $tmpArr ));
            
        return $tmpStr == $signature ? true : exit();
    }

    /**
     * 长链接转短链接
     * @param  string $long_url 长链接
     * @return string           短链接
     */
    public function shorturl($long_url){
        $data = array(
            'action'   => 'long2short',
            'long_url' => $long_url
        );

        return $this->api('shorturl', $data);
    }

    /**
     * 获取access_token
     * @return string access_token access_token值
     */
    public function getAccessToken(){
        // access_token 应该全局存储与更新，以下代码写入到文件中
        $data = json_decode(file_get_contents($this->dir."access_token.json"));
        if ($data->expire_time < time()) { 
            $url = "https://api.weixin.qq.com/cgi-bin/token";
            $param = array(
                'grant_type' => 'client_credential',
                'appid' => $this->appID,
                'secret' => $this->appsecret
            );
            $res = json_decode(self::http($url,$param));
            $access_token = $res->access_token;
            if ($access_token) {
                $data->expire_time = time() + 3600;
                $data->access_token = $access_token;
                $fp = fopen($this->dir."access_token.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        } else {
            $access_token = $data->access_token;
        }

        return $access_token;
    }

    public function getJsApiTicket() {
        // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
        $data = json_decode(@file_get_contents($this->dir."jsapi_ticket.json"));
        if (@$data->expire_time < time()) {
            $accessToken = $this->getAccessToken();
            // 如果是企业号用以下 URL 获取 ticket
            // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
            $res = json_decode($this->httpGet($url));
            $ticket = $res->ticket;
            if ($ticket) {
                $data->expire_time = time() + 7000;
                $data->jsapi_ticket = $ticket;
                $fp = fopen($this->dir."jsapi_ticket.json", "w");
                fwrite($fp, json_encode($data));
                fclose($fp);
            }
        } else {
            $ticket = $data->jsapi_ticket;
        }

        return $ticket;
    }

    /**
     * 调用微信api获取响应数据
     * @param  string $name   API名称
     * @param  string $data   POST请求数据
     * @param  string $method 请求方式
     * @param  string $param  GET请求参数
     * @return array          api返回结果
     */
    protected function api($name, $data = '', $method = 'POST', $param = ''){
        $params = array('access_token' => $this->getAccessToken());

        if(!empty($param) && is_array($param)){
            $params = array_merge($params, $param);
        }

        $url  = "{$this->apiURL}/{$name}";
        if(!empty($data)){
            //保护中文，微信api不支持中文转义的json结构
            array_walk_recursive($data, function(&$value){
                $value = urlencode($value);
            });
            $data = urldecode(json_encode($data));
        }

        $data = self::http($url, $params, $data, $method);

        return json_decode($data, true);
    }

    /**
     * 获取微信服务器IP
     * @return [type] [description]
     */
    public function getWechatServerIP(){
        return json_encode($this->api('getcallbackip','','GET'));
    }

    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $param  GET参数数组
     * @param  array  $data   POST的数据，GET请求时该参数无效
     * @param  string $method 请求方法GET/POST
     * @return array          响应数据
     */
    public static function http($url, $param, $data = '', $method = 'GET'){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        );

        /* 根据请求类型设置特定参数 */
        $opts[CURLOPT_URL] = $url . '?' . http_build_query($param);

        if(strtoupper($method) == 'POST'){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $data;
            
            if(is_string($data)){ //发送JSON数据
                $opts[CURLOPT_HTTPHEADER] = array(
                    'Content-Type: application/json; charset=utf-8',  
                    'Content-Length: ' . strlen($data),
                );
            }
        }

        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        //发生错误，抛出异常
        if($error) throw new \Exception('请求发生错误：' . $error);

        return  $data;
    }

    public static function http_post($url,$param){
        $oCurl = curl_init();           
        if(stripos($url,"https://")!==FALSE){                   
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);                   
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);           
        }          
        $strPOST = $param;  
        // var_dump($strPOST);exit;        
        curl_setopt($oCurl, CURLOPT_URL, $url);           
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );           
        curl_setopt($oCurl, CURLOPT_POST,true);           
        curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);          
        $sContent = curl_exec($oCurl);           
        $aStatus = curl_getinfo($oCurl);           
        curl_close($oCurl);           
        if(intval($aStatus["http_code"])==200){                   
               return $sContent;           
        }else{                  
                return false;          
        }    
    }

    public static function getNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }

    /**
     * 测试日志
     *
     * 记录测试日志
     * @param string $log_content
     */
    public static function logger($log_content) {
        $max_size = 10000;
        $log_filename = "log.xml";
        if(file_exists($log_filename) && (abs(filesize($log_filename)) > $max_size)){
            unlink($log_filename);
        }
        file_put_contents($log_filename, date('H:i:s')." ".$log_content."\r\n", FILE_APPEND);
    }
}