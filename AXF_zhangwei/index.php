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

  function dianji(){
    wx.getLocation({
      type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
      success: function (res) {
          var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
          var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
          var speed = res.speed; // 速度，以米/每秒计
          var accuracy = res.accuracy; // 位置精度
          alert('经度：' + longitude);
          alert('纬度：' + latitude);
      }
    });
  };
  dianji();



  </script>
</html>
