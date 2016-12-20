<?php
require_once "jssdk.php";
// appId  和 秘钥
$jssdk = new JSSDK("wxc83ecab55cd973c3", "b642b6564c9252faef7bb80a7e158d8f");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<!-- 文档类型声明 -->
<!-- HTML文档，根元素 -->
<html lang="zh-CN"><!-- lang设置语言属性 -->
  <!-- 网页头部 -->
  <head>
  <!-- 通过明确声明字符编码，能够确保浏览器快速并容易的判断页面内容的渲染方式。这样做的好处是，可以避免在 HTML 中使用字符实体标记（character entity），从而全部与文档编码一致（一般采用 UTF-8 编码）。 -->
  <meta charset="UTF-8">
  <!-- IE兼容 -->
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <!-- 移动端适配 -->
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <!-- 文档标题 -->
  <title></title>
  <!-- 根据 HTML5 规范，在引入 CSS 和 JavaScript 文件时一般不需要指定 type 属性，因为 text/css 和 text/javascript 分别是它们的默认值。 -->
  <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <!-- CSS引入 -->
  <link rel="stylesheet" href="css/index.css">
  <!-- 重置样式 -->
  <link rel="stylesheet" href="css/reset(zx).css">
  <style type="text/css" class="style"></style>
  </head>
  <!-- 包含文档的所有内容 -->
  <body>
    <div class="zmain">
      <!-- 首页 -->
      <div class="index-home"><!-- 首页模板 --></div>
      <!-- 闪送超市 -->
      <div class="sscs"></div>
      <!-- 购物车 -->
      <div class="gwc"></div>
      <!-- 我的 -->
      <div class="wode">
        
      </div>
    </div>
    <!-- 页脚 -->
    <div class="footer">
      <a href="#home"><div class="footer-xt home">首页</div></a>
      <a href="#sscs"><div class="footer-xt menu">闪送超市</div></a>
      <a href="#gwc"><div class="footer-xt cart">购物车<span class="cart-num"></span></div></a>
      <a href="#wode"><div class="footer-xt mine">我的</div></a>
    </div>
    <!-- 模板集合 -->
    <div id="tmpContext"></div>
    <!-- 疯狂秒杀 -->
    <div class="fkms"></div>
    <!-- 积分商城 -->
    <div class="jfsc"></div>
    <!-- 搜索 -->
    <div class="sousuo"></div>
  </body>
  <script data-main = "index.js" type="text/javascript" src = "js/require.js"></script>
  <script type="text/javascript">
    // rem设置
    document.documentElement.style.fontSize = innerWidth/4.14 +"px";
    window.onresize =function(){
      document.documentElement.style.fontSize = innerWidth/4.14 + "px";
    }
  </script>
  <script type="text/javascript">
    wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
     jsApiList: [
      'checkJsApi',
        'onMenuShareWeibo',
        'onMenuShareQZone',
        'hideMenuItems',
        'showMenuItems',
        'hideAllNonBaseMenuItem',
        'showAllNonBaseMenuItem',
        'translateVoice',
        'startRecord',
        'stopRecord',
        'onVoiceRecordEnd',
        'playVoice',
        'onVoicePlayEnd',
        'pauseVoice',
        'stopVoice',
        'uploadVoice',
        'downloadVoice',
        'chooseImage',
        'previewImage',
        'uploadImage',
        'downloadImage',
        'getNetworkType',
        'openLocation',
        'getLocation',
        'hideOptionMenu',
        'showOptionMenu',
        'closeWindow',
        'scanQRCode',
        'chooseWXPay',
        'openProductSpecificView',
        'addCard',
        'chooseCard',
        'openCard'
     ]
  });
  wx.ready(function(){
    wx.getLocation({
      type: 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
      success: function (res) {
          var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
          var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
          var speed = res.speed; // 速度，以米/每秒计
          var accuracy = res.accuracy; // 位置精度
          wx.openLocation({
            latitude: latitude, // 纬度，浮点数，范围为90 ~ -90
            longitude: longitude, // 经度，浮点数，范围为180 ~ -180。
            name: '', // 位置名
            address: '', // 地址详情说明
            scale: 1, // 地图缩放级别,整形值,范围从1~28。默认为最大
            infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
          });
      }
    });
    // wx.chooseWXPay({
    //   timestamp: 0, // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符
    //   nonceStr: '', // 支付签名随机串，不长于 32 位
    //   package: '', // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）
    //   signType: '', // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'
    //   paySign: '', // 支付签名
    //   success: function (res) {
    //       // 支付成功后的回调函数
    //   }
    // });
    //我再马路边
  });






  </script>
</html>
