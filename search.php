<?php
    session_start();
    include 'groups-d12b45.php';
    function checkAccess($groups) {
        if(isset($_SESSION['user_groups'])) {
            return count(array_intersect($groups, $_SESSION['user_groups'])) > 0;
        }
        return FALSE;
    }
    if(isset($_SESSION['user_logged']) && 8 > 0) {
        $now = new DateTime();
        $fmt = "Y-m-d\TH:i:sP"; // ATOM
        $end = DateTime::createFromFormat($fmt, $_SESSION['user_logged']->format($fmt));
        $end->add(new DateInterval("PT8H"));
        $diff = $now->diff($end);
        if($diff->invert) {
            unset($_SESSION['session_id']);
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_surname']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_info']);
            unset($_SESSION['user_groups']);
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_redirect']);
            unset($_SESSION['user_redirect_attempt']);
            $redirect = 'search.php';
            if(strlen($redirect) > 0) {
                $_SESSION['user_redirect'] = $redirect;
            }
            header('Location: user-login.html');
            exit;
        }
    }
?>
<?php if(!defined('PHP_VERSION_ID')||PHP_VERSION_ID<50600){print "Sparkle requires at least PHP 5.6, you have ".phpversion().". Contact your web host to fix this.<br>";exit();}if(! strstr(ini_get('disable_functions'), 'ini_set')) {ini_set('default_charset','UTF-8');}header('Content-Type: text/html; charset=UTF-8');header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');header('Cache-Control: post-check=0, pre-check=0', false);header('Pragma: no-cache'); ?><!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<title>Site Search Results</title>
<meta name="referrer" content="same-origin">
<link rel="canonical" href="http://parkcirclerentals.com/search.php">
<meta name="robots" content="max-image-preview:large">
<meta name="twitter:card" content="summary">
<meta property="og:title" content="Site Search Results">
<meta property="og:type" content="website">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<link rel="preload" href="css/Quicksand-Regular.woff2" as="font" crossorigin>
<style>html,body{-webkit-text-zoom:reset !important}@font-face{font-display:block;font-family:"Tomorrow 3";src:url('css/Tomorrow-Regular.woff2') format('woff2'),url('css/Tomorrow-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Quicksand 3";src:url('css/Quicksand-Bold.woff2') format('woff2'),url('css/Quicksand-Bold.woff') format('woff');font-weight:700}@font-face{font-display:block;font-family:"Londrina Solid";src:url('css/LondrinaSolid-Regular.woff2') format('woff2'),url('css/LondrinaSolid-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Permanent Marker";src:url('css/PermanentMarker.woff2') format('woff2'),url('css/PermanentMarker.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Baloo Da";src:url('css/BalooDa-Regular.woff2') format('woff2'),url('css/BalooDa-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Comfortaa 2";src:url('css/Comfortaa-Bold.woff2') format('woff2'),url('css/Comfortaa-Bold.woff') format('woff');font-weight:700}@font-face{font-display:block;font-family:"Redacted Script 1";src:url('css/redacted-script-regular.woff2') format('woff2'),url('css/redacted-script-regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Comfortaa 1";src:url('css/Comfortaa-Regular.woff2') format('woff2'),url('css/Comfortaa-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Quicksand 1";src:url('css/Quicksand-Regular.woff2') format('woff2'),url('css/Quicksand-Regular.woff') format('woff');font-weight:400}@font-face{font-display:block;font-family:"Quicksand 2";src:url('css/Quicksand-Medium.woff2') format('woff2'),url('css/Quicksand-Medium.woff') format('woff');font-weight:500}body>div{font-size:0}p,span,h1,h2,h3,h4,h5,h6,a,li{margin:0;word-spacing:normal;word-wrap:break-word;-ms-word-wrap:break-word;pointer-events:auto;-ms-text-size-adjust:none !important;-moz-text-size-adjust:none !important;-webkit-text-size-adjust:none !important;text-size-adjust:none !important;max-height:10000000px}sup{font-size:inherit;vertical-align:baseline;position:relative;top:-0.4em}sub{font-size:inherit;vertical-align:baseline;position:relative;top:0.4em}ul{display:block;word-spacing:normal;word-wrap:break-word;line-break:normal;list-style-type:none;padding:0;margin:0;-moz-padding-start:0;-khtml-padding-start:0;-webkit-padding-start:0;-o-padding-start:0;-padding-start:0;-webkit-margin-before:0;-webkit-margin-after:0}li{display:block;white-space:normal}[data-marker]::before{content:attr(data-marker) ' ';-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}li p{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;-o-user-select:none;user-select:none}form{display:inline-block}a{text-decoration:inherit;color:inherit;-webkit-tap-highlight-color:rgba(0,0,0,0)}textarea{resize:none}.shm-l{float:left;clear:left}.shm-r{float:right;clear:right;shape-outside:content-box}.btf{display:none}.plyr{min-width:0 !important}html{font-family:sans-serif}body{font-size:0;margin:0;--z:1;zoom:var(--z)}audio,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background:0 0;outline:0}b,strong{font-weight:700}dfn{font-style:italic}h1,h2,h3,h4,h5,h6{font-size:1em;line-height:1;margin:0}img{border:0}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type=button],input[type=submit]{-webkit-appearance:button;cursor:pointer;box-sizing:border-box;white-space:normal}input[type=date],input[type=email],input[type=number],input[type=password],input[type=text],textarea{-webkit-appearance:none;appearance:none;box-sizing:border-box}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type=checkbox],input[type=radio]{box-sizing:border-box;padding:0}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}input[type=search]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}textarea{overflow:auto;box-sizing:border-box;border-color:#ddd}optgroup{font-weight:700}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}blockquote{margin-block-start:0;margin-block-end:0;margin-inline-start:0;margin-inline-end:0}:-webkit-full-screen-ancestor:not(iframe){-webkit-clip-path:initial !important}
html{-webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale}.menu-content{cursor:pointer;position:relative}li{-webkit-tap-highlight-color:rgba(0,0,0,0)}
#b{background-color:#7b8078}.c50{display:block;position:relative;pointer-events:none;width:max(1920px, 100%);overflow:hidden;margin-top:-1px;z-index:1;min-height:581px}.v20{display:block;vertical-align:top}.ps143{position:relative;margin-top:1px}.s261{width:100%;min-width:1920px;height:386px;padding-bottom:0}.c51{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:transparent;box-shadow:0 3px 4px #000}.z111{pointer-events:none}.ps144{display:inline-block;width:0;height:0}.ps145{position:relative;margin-top:32px}.s262{width:1920px;margin-left:auto;margin-right:auto;min-height:322px}.v21{display:inline-block;vertical-align:top}.ps146{position:relative;margin-left:62px;margin-top:0}.s263{min-width:1785px;width:1785px;min-height:322px}.ps147{position:relative;margin-left:0;margin-top:0}.s264{min-width:341px;width:341px;min-height:322px;height:322px}.z112{z-index:2;pointer-events:auto}.a7{display:block}.i19{position:absolute;left:10px;width:322px;height:322px;top:0;-webkit-filter:drop-shadow(0 4px 4px #000);-moz-filter:drop-shadow(0 4px 4px #000);filter:drop-shadow(0 4px 4px #000);will-change:filter;border:0}.ps148{position:relative;margin-left:307px;margin-top:18px}.s265{min-width:1137px;width:1137px;min-height:304px;line-height:0}.ps149{position:relative;margin-left:614px;margin-top:0}.s266{min-width:514px;width:514px;min-height:68px}.z113{z-index:4;pointer-events:auto}.s267{min-width:372px;width:372px;height:68px}.z114{z-index:5;pointer-events:auto}.input6{border:1px solid transparent;background-clip:padding-box;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;box-shadow:0 0 5px 1px rgba(0,0,0,.4);width:372px;height:68px;font-family:"Helvetica Neue", sans-serif;font-size:19px;line-height:1.212;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#000;text-shadow:none;text-indent:0;padding-bottom:0;text-align:left;padding:4px}.input6::placeholder{color:rgb(169,169,169)}.v22{display:inline-block;vertical-align:top;overflow:hidden;outline:0}.ps150{position:relative;margin-left:19px;margin-top:1px}.s268{min-width:123px;min-height:66px;box-sizing:border-box;width:123px;height:23px;padding-right:0}.c53{border:0;-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px;background-color:#000;box-shadow:0 2px 4px rgba(0,0,0,.5);color:#fff;transition:color 0.20s, border-color 0.20s, background-color 0.20s, background-image 0.20s;transition-timing-function:linear}.z115{z-index:6;pointer-events:auto}.a8{display:inline-block;width:100%;height:100%}.f39{font-family:"Tomorrow 3";font-size:19px;font-size:calc(19px * var(--f));line-height:1.212;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;cursor:pointer;padding-top:22px;padding-bottom:21px}.c53:hover{background-color:#82939e;background-clip:padding-box;border-color:#000;color:#000}.c53:active{background-color:#52646f;transition:initial;color:#fff}.v23{display:inline-block;vertical-align:top;overflow:visible}.ps151{position:relative;margin-left:0;margin-top:148px}.s269{min-width:1137px;width:1137px;height:88px}.z116{z-index:3;pointer-events:auto}.s270{min-width:1137px;width:1137px;min-height:88px;height:88px}.m4{padding:0px 0px 0px 0px}.ml4{outline:0}.s271{min-width:198px;width:198px;height:88px;box-shadow:0 0 2px 2px rgba(0,0,0,.5);-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px}.mcv4{display:inline-block}.s272{min-width:198px;width:198px;min-height:88px}.c54{border:0;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;background-color:#000}.ps152{position:relative;margin-left:0;margin-top:19px}.s273{min-width:198px;width:198px;overflow:hidden;height:50px}.z117{pointer-events:auto}.p10{text-indent:0;padding-bottom:0;padding-right:0;text-align:center}.f40{font-family:"Quicksand 3";font-size:32px;font-size:calc(32px * var(--f));line-height:1.376;font-weight:700;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#fff;background-color:initial;text-shadow:none}.f40:hover{}.ps153{position:relative;margin-left:12px;margin-top:0}.s274{min-width:225px;width:225px;height:88px;box-shadow:0 0 2px 2px rgba(0,0,0,.5);-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px}.s275{min-width:225px;width:225px;min-height:88px}.s276{min-width:225px;width:225px;overflow:hidden;height:50px}.v24{display:none;vertical-align:top}.s277{min-width:335px;width:335px;min-height:148px;height:148px}.z118{z-index:9999}.s278{min-width:299px;width:299px;height:66px}.s279{min-width:299px;width:299px;min-height:66px}.c55{border:0;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;background-color:#000}.ps154{position:relative;margin-left:0;margin-top:8px}.s280{min-width:299px;width:299px;overflow:hidden;height:50px}.ps155{position:relative;margin-left:0;margin-top:16px}.s281{min-width:335px;width:335px;height:66px}.s282{min-width:335px;width:335px;min-height:66px}.s283{min-width:335px;width:335px;overflow:hidden;height:50px}.s284{min-width:230px;width:230px;height:88px;box-shadow:0 0 2px 2px rgba(0,0,0,.5);-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px}.s285{min-width:230px;width:230px;min-height:88px}.s286{min-width:230px;width:230px;overflow:hidden;height:50px}.s287{min-width:388px;width:388px;min-height:123px;height:123px}.s288{min-width:388px;width:388px;height:56px}.s289{min-width:388px;width:388px;min-height:56px}.c56{border:0;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;background-color:#000}.ps156{position:relative;margin-left:0;margin-top:3px}.s290{min-width:388px;width:388px;overflow:hidden;height:50px}.ps157{position:relative;margin-left:0;margin-top:11px}.s291{min-width:288px;width:288px;height:56px}.s292{min-width:288px;width:288px;min-height:56px}.s293{min-width:288px;width:288px;overflow:hidden;height:50px}.s294{min-width:237px;width:237px;height:88px;box-shadow:0 0 2px 2px rgba(0,0,0,.5);-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px}.s295{min-width:237px;width:237px;min-height:88px}.s296{min-width:237px;width:237px;overflow:hidden;height:50px}.s297{min-width:136px;width:136px;min-height:214px;height:214px}.s298{min-width:110px;width:110px;height:64px}.s299{min-width:110px;width:110px;min-height:64px}.ps158{position:relative;margin-left:0;margin-top:7px}.s300{min-width:110px;width:110px;overflow:hidden;height:50px}.s301{min-width:136px;width:136px;height:64px}.s302{min-width:136px;width:136px;min-height:64px}.s303{min-width:136px;width:136px;overflow:hidden;height:50px}.s304{min-width:130px;width:130px;height:64px}.s305{min-width:130px;width:130px;min-height:64px}.s306{min-width:130px;width:130px;overflow:hidden;height:50px}.s307{min-width:199px;width:199px;height:88px;box-shadow:0 0 2px 2px rgba(0,0,0,.5);-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px}.s308{min-width:199px;width:199px;min-height:88px}.s309{min-width:199px;width:199px;overflow:hidden;height:50px}.ps159{position:relative;margin-top:-134px}.s310{width:1920px;margin-left:auto;margin-right:auto;min-height:4809px}.ps160{position:relative;margin-left:94px;margin-top:0}.s311{min-width:1536px;width:1536px;overflow:hidden;height:106px}.z119{z-index:10;pointer-events:auto}.p11{padding-bottom:0;text-align:left;text-indent:0;padding-right:0}.f41{font-family:"Quicksand 1";font-size:44px;font-size:calc(44px * var(--f));line-height:1.751;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#fff;background-color:initial;text-shadow:none}.f41:hover{}.ps161{position:relative;margin-left:81px;margin-top:15px}.s312{min-width:1776px;width:1776px;min-height:4424px}.c57{border:1px solid rgba(0,0,0,.5);background-clip:padding-box;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;box-shadow:0 0 4px 1px #000}.z120{z-index:11;pointer-events:auto}.ps162{position:relative;margin-left:0;margin-top:147px}.s313{min-width:1776px;width:1776px;min-height:260px}.ps163{position:relative;margin-left:6px;margin-top:0}.s314{min-width:1504px;width:1504px;overflow:hidden;height:110px}.z121{z-index:13;pointer-events:auto}.f42{font-family:"Quicksand 2";font-size:48px;font-size:calc(48px * var(--f));line-height:1.751;font-weight:500;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#000;background-color:initial;text-shadow:none}.f42:hover{}.ps164{position:relative;margin-left:12px;margin-top:1px}.s315{min-width:1461px;width:1461px;overflow:hidden;height:149px}.z122{z-index:14;pointer-events:auto}.f43{font-family:"Quicksand 1";font-size:28px;font-size:calc(28px * var(--f));line-height:1.751;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;color:#000;background-color:initial;text-shadow:none}.f43:hover{}.ps165{display:inline-block;position:relative;left:50%;-ms-transform:translate(-50%,0);-webkit-transform:translate(-50%,0);transform:translate(-50%,0)}.ps166{position:relative;margin-left:75px;margin-top:149px}.s316{min-width:1763px;width:1763px;min-height:107px}.s317{min-width:120px;min-height:107px;box-sizing:border-box;width:120px;height:33px;padding-right:0}.c58{border:0;-webkit-border-radius:8px;-moz-border-radius:8px;border-radius:8px;background-color:#7b8078;box-shadow:0 2px 4px rgba(0,0,0,.4);color:#000;transition:color 0.20s, border-color 0.20s, background-color 0.20s, background-image 0.20s;transition-timing-function:linear}.z123{z-index:16;pointer-events:auto}.f44{font-family:"Londrina Solid";font-size:28px;font-size:calc(28px * var(--f));line-height:1.180;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;cursor:pointer;padding-top:37px;padding-bottom:37px}.c58:hover{background-color:#82939e;background-clip:padding-box;border-color:#000}.c58:active{background-color:#52646f;transition:initial;color:#fff}.ps167{position:relative;margin-left:31px;margin-top:0}.s318{min-width:120px;min-height:107px;box-sizing:border-box;width:120px;height:55px;padding-right:0}.c59{border:0;-webkit-border-radius:9px;-moz-border-radius:9px;border-radius:9px;background-color:#fff;box-shadow:0 0 4px 2px #000;color:#000;transition:color 0.20s, border-color 0.20s, background-color 0.20s, background-image 0.20s;transition-timing-function:linear}.z124{z-index:17;pointer-events:auto}.f45{font-family:"Quicksand 2";font-size:44px;font-size:calc(44px * var(--f));line-height:1.251;font-weight:500;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;cursor:pointer;padding-top:26px;padding-bottom:26px}.c59:hover{background-color:#82939e;background-clip:padding-box;border-color:#000}.c59:active{background-color:#52646f;transition:initial;color:#fff}.ps168{position:relative;margin-left:27px;margin-top:0}.z125{z-index:18;pointer-events:auto}.ps169{position:relative;margin-left:30px;margin-top:0}.z126{z-index:19;pointer-events:auto}.ps170{position:relative;margin-left:29px;margin-top:0}.z127{z-index:20;pointer-events:auto}.ps171{position:relative;margin-left:30px;margin-top:0}.z128{z-index:21;pointer-events:auto}.ps172{position:relative;margin-left:28px;margin-top:0}.z129{z-index:22;pointer-events:auto}.ps173{position:relative;margin-left:32px;margin-top:0}.z130{z-index:23;pointer-events:auto}.z131{z-index:24;pointer-events:auto}.ps174{position:relative;margin-left:29px;margin-top:0}.z132{z-index:25;pointer-events:auto}.ps175{position:relative;margin-left:29px;margin-top:0}.z133{z-index:26;pointer-events:auto}.ps176{position:relative;margin-left:28px;margin-top:0}.s319{min-width:120px;min-height:107px;box-sizing:border-box;width:120px;height:23px;padding-right:0}.c60{border:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;background-color:#b8c8d2;color:#000;transition:color 0.20s, border-color 0.20s, background-color 0.20s, background-image 0.20s;transition-timing-function:linear}.z134{z-index:27;pointer-events:auto}.f46{font-family:"Helvetica Neue", sans-serif;font-size:19px;font-size:calc(19px * var(--f));line-height:1.212;font-weight:400;font-style:normal;text-decoration:none;text-transform:none;letter-spacing:normal;text-shadow:none;text-indent:0;text-align:center;cursor:pointer;padding-top:42px;padding-bottom:42px}.c60:hover{background-color:#82939e;background-clip:padding-box;border-color:#000}.c60:active{background-color:#52646f;transition:initial;color:#fff}body{--d:0;--s:1920}@media (min-width:1200px) and (max-width:1919px) {.c50{width:max(1200px, 100%);min-height:363px}.s261{min-width:1200px;height:241px}.ps145{margin-top:20px}.s262{width:1200px;min-height:201px}.ps146{margin-left:39px}.s263{min-width:1120px;width:1120px;min-height:201px}.s264{min-width:213px;width:213px;min-height:201px;height:201px}.i19{left:6px;width:201px;height:201px}.ps148{margin-left:192px;margin-top:11px}.s265{min-width:715px;width:715px;min-height:190px}.ps149{margin-left:383px}.s266{min-width:322px;width:322px;min-height:43px}.s267{min-width:233px;width:233px;height:43px}.input6{width:233px;height:43px;font-size:12px;line-height:1.168}.ps150{margin-left:12px}.s268{min-width:77px;min-height:41px;width:77px;height:14px}.f39{font-size:12px;font-size:calc(12px * var(--f));line-height:1.168;padding-top:14px;padding-bottom:13px}.ps151{margin-top:92px}.s269{min-width:715px;width:715px;height:55px}.s270{min-width:715px;width:715px;min-height:55px;height:55px}.s271{min-width:124px;width:124px;height:55px}.s272{min-width:124px;width:124px;min-height:55px}.ps152{margin-top:11px}.s273{min-width:124px;width:124px;height:32px}.f40{font-size:20px;font-size:calc(20px * var(--f));line-height:1.401}.ps153{margin-left:8px}.s274{min-width:141px;width:141px;height:55px}.s275{min-width:141px;width:141px;min-height:55px}.s276{min-width:141px;width:141px;height:32px}.s277{min-width:210px;width:210px;min-height:92px;height:92px}.s278{min-width:187px;width:187px;height:41px}.s279{min-width:187px;width:187px;min-height:41px}.ps154{margin-top:4px}.s280{min-width:187px;width:187px;height:32px}.ps155{margin-top:10px}.s281{min-width:210px;width:210px;height:41px}.s282{min-width:210px;width:210px;min-height:41px}.s283{min-width:210px;width:210px;height:32px}.s284{min-width:144px;width:144px;height:55px}.s285{min-width:144px;width:144px;min-height:55px}.s286{min-width:144px;width:144px;height:32px}.s287{min-width:242px;width:242px;min-height:77px;height:77px}.s288{min-width:242px;width:242px;height:35px}.s289{min-width:242px;width:242px;min-height:35px}.ps156{margin-top:1px}.s290{min-width:242px;width:242px;height:32px}.ps157{margin-top:7px}.s291{min-width:180px;width:180px;height:35px}.s292{min-width:180px;width:180px;min-height:35px}.s293{min-width:180px;width:180px;height:32px}.s294{min-width:149px;width:149px;height:55px}.s295{min-width:149px;width:149px;min-height:55px}.s296{min-width:149px;width:149px;height:32px}.s297{min-width:85px;width:85px;min-height:134px;height:134px}.s298{min-width:69px;width:69px;height:40px}.s299{min-width:69px;width:69px;min-height:40px}.ps158{margin-top:4px}.s300{min-width:68px;width:68px;height:32px}.s301{min-width:85px;width:85px;height:40px}.s302{min-width:85px;width:85px;min-height:40px}.s303{min-width:84px;width:84px;height:32px}.s304{min-width:82px;width:82px;height:40px}.s305{min-width:82px;width:82px;min-height:40px}.s306{min-width:81px;width:81px;height:32px}.s307{min-width:125px;width:125px;height:55px}.s308{min-width:125px;width:125px;min-height:55px}.s309{min-width:125px;width:125px;height:32px}.ps159{margin-top:-83px}.s310{width:1200px;min-height:3008px}.ps160{margin-left:59px}.s311{min-width:960px;width:960px;height:66px}.f41{font-size:28px;font-size:calc(28px * var(--f))}.ps161{margin-left:50px;margin-top:9px}.s312{min-width:1110px;width:1110px;min-height:2765px}.ps162{margin-top:92px}.s313{min-width:1110px;width:1110px;min-height:162px}.ps163{margin-left:4px}.s314{min-width:940px;width:940px;height:69px}.f42{font-size:30px;font-size:calc(30px * var(--f));line-height:1.734}.ps164{margin-left:8px;margin-top:0}.s315{min-width:913px;width:913px;height:93px}.f43{font-size:18px;font-size:calc(18px * var(--f));line-height:1.723}.ps166{margin-left:47px;margin-top:93px}.s316{min-width:1102px;width:1102px;min-height:67px}.s317{min-width:75px;min-height:67px;width:75px;height:21px}.f44{font-size:18px;font-size:calc(18px * var(--f));line-height:1.168;padding-top:23px;padding-bottom:23px}.ps167{margin-left:19px}.s318{min-width:75px;min-height:67px;width:75px;height:35px}.f45{font-size:28px;font-size:calc(28px * var(--f));padding-top:16px;padding-bottom:16px}.ps168{margin-left:17px}.ps169{margin-left:19px}.ps170{margin-left:18px}.ps171{margin-left:19px}.ps172{margin-left:17px}.ps173{margin-left:20px}.ps174{margin-left:18px}.ps175{margin-left:18px}.ps176{margin-left:18px}.s319{min-width:75px;min-height:67px;width:75px;height:14px}.f46{font-size:12px;font-size:calc(12px * var(--f));line-height:1.168;padding-top:27px;padding-bottom:26px}body{--d:1;--s:1200}}@media (min-width:960px) and (max-width:1199px) {.c50{width:max(960px, 100%);min-height:291px}.s261{min-width:960px;height:193px}.ps145{margin-top:16px}.s262{width:960px;min-height:161px}.ps146{margin-left:31px}.s263{min-width:894px;width:894px;min-height:161px}.s264{min-width:170px;width:170px;min-height:161px;height:161px}.i19{left:5px;width:161px;height:161px}.ps148{margin-left:154px;margin-top:9px}.s265{min-width:570px;width:570px;min-height:152px}.ps149{margin-left:306px}.s266{min-width:259px;width:259px;min-height:35px}.s267{min-width:187px;width:187px;height:35px}.input6{width:187px;height:35px;font-size:9px;line-height:1.223}.ps150{margin-left:10px}.s268{min-width:62px;min-height:33px;width:62px;height:11px}.f39{font-size:9px;font-size:calc(9px * var(--f));line-height:1.223;padding-top:11px;padding-bottom:11px}.ps151{margin-top:73px}.s269{min-width:570px;width:570px;height:44px}.s270{min-width:570px;width:570px;min-height:44px;height:44px}.s271{min-width:99px;width:99px;height:44px}.s272{min-width:99px;width:99px;min-height:44px}.ps152{margin-top:9px}.s273{min-width:99px;width:99px;height:26px}.f40{font-size:16px;font-size:calc(16px * var(--f))}.ps153{margin-left:6px}.s274{min-width:113px;width:113px;height:44px}.s275{min-width:113px;width:113px;min-height:44px}.s276{min-width:113px;width:113px;height:26px}.s277{min-width:168px;width:168px;min-height:74px;height:74px}.s278{min-width:150px;width:150px;height:33px}.s279{min-width:150px;width:150px;min-height:33px}.ps154{margin-top:3px}.s280{min-width:150px;width:150px;height:26px}.ps155{margin-top:8px}.s281{min-width:168px;width:168px;height:33px}.s282{min-width:168px;width:168px;min-height:33px}.s283{min-width:168px;width:168px;height:26px}.s284{min-width:115px;width:115px;height:44px}.s285{min-width:115px;width:115px;min-height:44px}.s286{min-width:115px;width:115px;height:26px}.s287{min-width:194px;width:194px;min-height:61px;height:62px}.s288{min-width:194px;width:194px;height:28px}.s289{min-width:194px;width:194px;min-height:28px}.ps156{margin-top:1px}.s290{min-width:194px;width:194px;height:26px}.ps157{margin-top:5px}.s291{min-width:144px;width:144px;height:28px}.s292{min-width:144px;width:144px;min-height:28px}.s293{min-width:144px;width:144px;height:26px}.s294{min-width:119px;width:119px;height:44px}.s295{min-width:119px;width:119px;min-height:44px}.s296{min-width:119px;width:119px;height:26px}.s297{min-width:68px;width:68px;min-height:107px;height:107px}.s298{min-width:55px;width:55px;height:32px}.s299{min-width:55px;width:55px;min-height:32px}.ps158{margin-top:3px}.s300{min-width:55px;width:55px;height:26px}.s301{min-width:68px;width:68px;height:32px}.s302{min-width:68px;width:68px;min-height:32px}.s303{min-width:68px;width:68px;height:26px}.s304{min-width:65px;width:65px;height:32px}.s305{min-width:65px;width:65px;min-height:32px}.s306{min-width:65px;width:65px;height:26px}.s307{min-width:100px;width:100px;height:44px}.s308{min-width:100px;width:100px;min-height:44px}.s309{min-width:100px;width:100px;height:26px}.ps159{margin-top:-67px}.s310{width:960px;min-height:2408px}.ps160{margin-left:47px}.s311{min-width:768px;width:768px;height:53px}.f41{font-size:22px;font-size:calc(22px * var(--f));line-height:1.774}.ps161{margin-left:40px;margin-top:7px}.s312{min-width:888px;width:888px;min-height:2212px}.ps162{margin-top:74px}.s313{min-width:888px;width:888px;min-height:129px}.ps163{margin-left:3px}.s314{min-width:752px;width:752px;height:55px}.f42{font-size:24px;font-size:calc(24px * var(--f))}.ps164{margin-left:6px;margin-top:0}.s315{min-width:730px;width:730px;height:74px}.f43{font-size:14px;font-size:calc(14px * var(--f));line-height:1.787}.ps166{margin-left:38px;margin-top:74px}.s316{min-width:881px;width:881px;min-height:54px}.s317{min-width:60px;min-height:54px;width:60px;height:16px}.f44{font-size:14px;font-size:calc(14px * var(--f));line-height:1.144;padding-top:19px;padding-bottom:19px}.ps167{margin-left:15px}.s318{min-width:60px;min-height:54px;width:60px;height:28px}.f45{font-size:22px;font-size:calc(22px * var(--f));line-height:1.274;padding-top:13px;padding-bottom:13px}.ps168{margin-left:13px}.ps169{margin-left:16px}.ps170{margin-left:14px}.ps171{margin-left:15px}.ps172{margin-left:14px}.ps173{margin-left:16px}.ps174{margin-left:14px}.ps175{margin-left:15px}.ps176{margin-left:14px}.s319{min-width:60px;min-height:54px;width:60px;height:11px}.f46{font-size:9px;font-size:calc(9px * var(--f));line-height:1.223;padding-top:22px;padding-bottom:21px}body{--d:2;--s:960}}@media (min-width:768px) and (max-width:959px) {.c50{width:max(768px, 100%);min-height:233px}.s261{min-width:768px;height:154px}.ps145{margin-top:13px}.s262{width:768px;min-height:129px}.ps146{margin-left:25px}.s263{min-width:710px;width:710px;min-height:129px}.s264{min-width:136px;width:136px;min-height:129px;height:129px}.i19{left:4px;width:129px;height:129px}.ps148{margin-left:123px;margin-top:6px}.s265{min-width:451px;width:451px;min-height:122px}.ps149{margin-left:245px}.s266{min-width:206px;width:206px;min-height:28px}.s267{min-width:150px;width:150px;height:28px}.input6{width:150px;height:28px;font-size:7px;line-height:1.144}.ps150{margin-left:7px}.s268{min-width:49px;min-height:26px;width:49px;height:8px}.f39{font-size:7px;font-size:calc(7px * var(--f));line-height:1.144;padding-top:9px;padding-bottom:9px}.ps151{margin-top:59px}.s269{min-width:443px;width:443px;height:35px}.s270{min-width:443px;width:443px;min-height:35px;height:35px}.s271{min-width:77px;width:77px;height:35px}.s272{min-width:77px;width:77px;min-height:35px}.ps152{margin-top:8px}.s273{min-width:76px;width:76px;height:19px}.f40{font-size:12px;font-size:calc(12px * var(--f));line-height:1.334}.ps153{margin-left:5px}.s274{min-width:87px;width:87px;height:35px}.s275{min-width:87px;width:87px;min-height:35px}.s276{min-width:86px;width:86px;height:19px}.s277{min-width:128px;width:128px;min-height:58px;height:58px}.s278{min-width:114px;width:114px;height:26px}.s279{min-width:114px;width:114px;min-height:26px}.ps154{margin-top:3px}.s280{min-width:113px;width:113px;height:19px}.ps155{margin-top:6px}.s281{min-width:128px;width:128px;height:26px}.s282{min-width:128px;width:128px;min-height:26px}.s283{min-width:127px;width:127px;height:19px}.s284{min-width:89px;width:89px;height:35px}.s285{min-width:89px;width:89px;min-height:35px}.s286{min-width:88px;width:88px;height:19px}.s287{min-width:147px;width:147px;min-height:48px;height:48px}.s288{min-width:147px;width:147px;height:22px}.s289{min-width:147px;width:147px;min-height:22px}.ps156{margin-top:1px}.s290{min-width:146px;width:146px;height:19px}.ps157{margin-top:4px}.s291{min-width:109px;width:109px;height:22px}.s292{min-width:109px;width:109px;min-height:22px}.s293{min-width:108px;width:108px;height:19px}.s294{min-width:92px;width:92px;height:35px}.s295{min-width:92px;width:92px;min-height:35px}.s296{min-width:91px;width:91px;height:19px}.s297{min-width:52px;width:52px;min-height:86px;height:87px}.s298{min-width:42px;width:42px;height:26px}.s299{min-width:42px;width:42px;min-height:26px}.ps158{margin-top:3px}.s300{min-width:41px;width:41px;height:19px}.s301{min-width:52px;width:52px;height:26px}.s302{min-width:52px;width:52px;min-height:26px}.s303{min-width:51px;width:51px;height:19px}.s304{min-width:50px;width:50px;height:26px}.s305{min-width:50px;width:50px;min-height:26px}.s306{min-width:49px;width:49px;height:19px}.s307{min-width:78px;width:78px;height:35px}.s308{min-width:78px;width:78px;min-height:35px}.s309{min-width:77px;width:77px;height:19px}.ps159{margin-top:-53px}.s310{width:768px;min-height:1927px}.ps160{margin-left:38px}.s311{min-width:614px;width:614px;height:42px}.f41{font-size:17px;font-size:calc(17px * var(--f));line-height:1.766}.ps161{margin-left:32px;margin-top:5px}.s312{min-width:710px;width:710px;min-height:1770px}.ps162{margin-top:59px}.s313{min-width:710px;width:710px;min-height:104px}.ps163{margin-left:2px}.s314{min-width:602px;width:602px;height:44px}.f42{font-size:19px;font-size:calc(19px * var(--f));line-height:1.790}.ps164{margin-left:5px;margin-top:0}.s315{min-width:584px;width:584px;height:60px}.f43{font-size:11px;font-size:calc(11px * var(--f));line-height:1.728}.ps166{margin-left:30px;margin-top:59px}.s316{min-width:705px;width:705px;min-height:43px}.s317{min-width:48px;min-height:43px;width:48px;height:13px}.f44{font-size:11px;font-size:calc(11px * var(--f));line-height:1.183;padding-top:15px;padding-bottom:15px}.ps167{margin-left:12px}.s318{min-width:48px;min-height:43px;width:48px;height:21px}.f45{font-size:17px;font-size:calc(17px * var(--f));line-height:1.236;padding-top:11px;padding-bottom:11px}.ps168{margin-left:11px}.ps169{margin-left:12px}.ps170{margin-left:12px}.ps171{margin-left:12px}.ps172{margin-left:11px}.ps173{margin-left:13px}.ps174{margin-left:11px}.ps175{margin-left:12px}.ps176{margin-left:11px}.s319{min-width:48px;min-height:43px;width:48px;height:8px}.f46{font-size:7px;font-size:calc(7px * var(--f));line-height:1.144;padding-top:18px;padding-bottom:17px}body{--d:3;--s:768}}@media (min-width:480px) and (max-width:767px) {.c50{width:max(480px, 100%);min-height:145px}.s261{min-width:480px;height:96px}.ps145{margin-top:8px}.s262{width:480px;min-height:80px}.ps146{margin-left:16px}.s263{min-width:450px;width:450px;min-height:80px}.s264{min-width:85px;width:85px;min-height:80px;height:80px}.i19{left:3px;width:80px;height:80px}.ps148{margin-left:77px;margin-top:4px}.s265{min-width:288px;width:288px;min-height:76px}.ps149{margin-left:152px}.s266{min-width:130px;width:130px;min-height:18px}.s267{min-width:94px;width:94px;height:18px}.input6{width:94px;height:18px;font-size:4px;line-height:1.251}.ps150{margin-left:5px}.s268{min-width:31px;min-height:16px;width:31px;height:5px}.f39{font-size:4px;font-size:calc(4px * var(--f));line-height:1.251;padding-top:6px;padding-bottom:5px}.ps151{margin-top:36px}.s269{min-width:288px;width:288px;height:22px}.s270{min-width:288px;width:288px;min-height:22px;height:22px}.s271{min-width:50px;width:50px;height:22px}.s272{min-width:50px;width:50px;min-height:22px}.ps152{margin-top:4px}.s273{min-width:49px;width:49px;height:14px}.f40{font-size:8px;font-size:calc(8px * var(--f))}.ps153{margin-left:3px}.s274{min-width:57px;width:57px;height:22px}.s275{min-width:57px;width:57px;min-height:22px}.s276{min-width:56px;width:56px;height:14px}.s277{min-width:85px;width:85px;min-height:36px;height:36px}.s278{min-width:76px;width:76px;height:16px}.s279{min-width:76px;width:76px;min-height:16px}.ps154{margin-top:1px}.s280{min-width:75px;width:75px;height:14px}.ps155{margin-top:4px}.s281{min-width:85px;width:85px;height:16px}.s282{min-width:85px;width:85px;min-height:16px}.s283{min-width:84px;width:84px;height:14px}.s284{min-width:58px;width:58px;height:22px}.s285{min-width:58px;width:58px;min-height:22px}.s286{min-width:57px;width:57px;height:14px}.s287{min-width:97px;width:97px;min-height:30px;height:31px}.s288{min-width:97px;width:97px;height:14px}.s289{min-width:97px;width:97px;min-height:14px}.c56{-webkit-border-radius:7px;-moz-border-radius:7px;border-radius:7px}.ps156{margin-top:0}.s290{min-width:97px;width:97px;height:14px}.ps157{margin-top:2px}.s291{min-width:72px;width:72px;height:14px}.s292{min-width:72px;width:72px;min-height:14px}.s293{min-width:72px;width:72px;height:14px}.s294{min-width:60px;width:60px;height:22px}.s295{min-width:60px;width:60px;min-height:22px}.s296{min-width:59px;width:59px;height:14px}.s297{min-width:35px;width:35px;min-height:53px;height:54px}.s298{min-width:28px;width:28px;height:16px}.s299{min-width:28px;width:28px;min-height:16px}.ps158{margin-top:1px}.s300{min-width:27px;width:27px;height:14px}.s301{min-width:35px;width:35px;height:16px}.s302{min-width:35px;width:35px;min-height:16px}.s303{min-width:34px;width:34px;height:14px}.s304{min-width:33px;width:33px;height:16px}.s305{min-width:33px;width:33px;min-height:16px}.s306{min-width:32px;width:32px;height:14px}.s307{min-width:51px;width:51px;height:22px}.s308{min-width:51px;width:51px;min-height:22px}.s309{min-width:50px;width:50px;height:14px}.ps159{margin-top:-32px}.s310{width:480px;min-height:1207px}.ps160{margin-left:24px}.s311{min-width:384px;width:384px;height:26px}.f41{font-size:11px;font-size:calc(11px * var(--f));line-height:1.728}.ps161{margin-left:19px;margin-top:3px}.s312{min-width:444px;width:444px;min-height:1106px}.ps162{margin-top:37px}.s313{min-width:444px;width:444px;min-height:64px}.ps163{margin-left:2px}.s314{min-width:376px;width:376px;height:28px}.f42{font-size:12px;font-size:calc(12px * var(--f))}.ps164{margin-left:4px;margin-top:-1px}.s315{min-width:365px;width:365px;height:37px}.f43{font-size:7px;font-size:calc(7px * var(--f));line-height:1.715}.ps166{margin-left:19px;margin-top:37px}.s316{min-width:441px;width:441px;min-height:27px}.s317{min-width:30px;min-height:27px;width:30px;height:9px}.f44{font-size:7px;font-size:calc(7px * var(--f));line-height:1.287;padding-top:9px;padding-bottom:9px}.ps167{margin-left:7px}.s318{min-width:30px;min-height:27px;width:30px;height:14px}.f45{font-size:11px;font-size:calc(11px * var(--f));line-height:1.274;padding-top:7px;padding-bottom:6px}.ps168{margin-left:7px}.ps169{margin-left:8px}.ps170{margin-left:7px}.ps171{margin-left:8px}.ps172{margin-left:6px}.ps173{margin-left:8px}.ps174{margin-left:7px}.ps175{margin-left:7px}.ps176{margin-left:8px}.s319{min-width:30px;min-height:27px;width:30px;height:5px}.f46{font-size:4px;font-size:calc(4px * var(--f));line-height:1.251;padding-top:11px;padding-bottom:11px}body{--d:4;--s:480}}@media (max-width:479px) {.c50{width:max(320px, 100%);min-height:99px}.s261{min-width:320px;height:64px}.ps145{margin-top:5px}.s262{width:320px;min-height:54px}.ps146{margin-left:10px}.s263{min-width:297px;width:297px;min-height:54px}.s264{min-width:57px;width:57px;min-height:54px;height:54px}.i19{left:2px;width:54px;height:54px}.ps148{margin-left:51px;margin-top:3px}.s265{min-width:189px;width:189px;min-height:51px}.ps149{margin-left:102px}.s266{min-width:87px;width:87px;min-height:13px}.s267{min-width:64px;width:64px;height:13px}.input6{width:64px;height:13px;font-size:3px;line-height:1.334}.ps150{margin-left:2px}.s268{min-width:21px;min-height:11px;width:21px;height:4px}.c53{-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}.f39{font-size:3px;font-size:calc(3px * var(--f));line-height:1.334;padding-top:4px;padding-bottom:3px}.c53:hover{-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}.c53:active{-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}.ps151{margin-top:23px}.s269{min-width:186px;width:186px;height:15px}.s270{min-width:186px;width:186px;min-height:15px;height:15px}.s271{min-width:32px;width:32px;height:15px}.s272{min-width:32px;width:32px;min-height:15px}.ps152{margin-top:3px}.s273{min-width:32px;width:32px;height:9px}.f40{font-size:5px;font-size:calc(5px * var(--f));line-height:1.401}.ps153{margin-left:2px}.s274{min-width:37px;width:37px;height:15px}.s275{min-width:37px;width:37px;min-height:15px}.s276{min-width:37px;width:37px;height:9px}.s277{min-width:54px;width:54px;min-height:24px;height:25px}.s278{min-width:48px;width:48px;height:11px}.s279{min-width:48px;width:48px;min-height:11px}.c55{-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}.ps154{margin-top:1px}.s280{min-width:47px;width:47px;height:9px}.ps155{margin-top:2px}.s281{min-width:54px;width:54px;height:11px}.s282{min-width:54px;width:54px;min-height:11px}.s283{min-width:53px;width:53px;height:9px}.s284{min-width:37px;width:37px;height:15px}.s285{min-width:37px;width:37px;min-height:15px}.s286{min-width:37px;width:37px;height:9px}.s287{min-width:61px;width:61px;min-height:19px;height:20px}.s288{min-width:61px;width:61px;height:9px}.s289{min-width:61px;width:61px;min-height:9px}.c56{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.ps156{margin-top:0}.s290{min-width:61px;width:61px;height:9px}.ps157{margin-top:1px}.s291{min-width:46px;width:46px;height:9px}.s292{min-width:46px;width:46px;min-height:9px}.s293{min-width:46px;width:46px;height:9px}.s294{min-width:39px;width:39px;height:15px}.s295{min-width:39px;width:39px;min-height:15px}.s296{min-width:39px;width:39px;height:9px}.s297{min-width:22px;width:22px;min-height:36px;height:37px}.s298{min-width:18px;width:18px;height:11px}.s299{min-width:18px;width:18px;min-height:11px}.ps158{margin-top:1px}.s300{min-width:18px;width:18px;height:9px}.s301{min-width:22px;width:22px;height:11px}.s302{min-width:22px;width:22px;min-height:11px}.s303{min-width:22px;width:22px;height:9px}.s304{min-width:21px;width:21px;height:11px}.s305{min-width:21px;width:21px;min-height:11px}.s306{min-width:21px;width:21px;height:9px}.s307{min-width:33px;width:33px;height:15px}.s308{min-width:33px;width:33px;min-height:15px}.s309{min-width:33px;width:33px;height:9px}.ps159{margin-top:-24px}.s310{width:320px;min-height:807px}.ps160{margin-left:16px}.s311{min-width:256px;width:256px;height:18px}.f41{font-size:7px;font-size:calc(7px * var(--f));line-height:1.715}.ps161{margin-left:13px;margin-top:2px}.s312{min-width:296px;width:296px;min-height:737px}.ps162{margin-top:24px}.s313{min-width:296px;width:296px;min-height:44px}.ps163{margin-left:1px}.s314{min-width:251px;width:251px;height:18px}.f42{font-size:8px;font-size:calc(8px * var(--f))}.ps164{margin-left:2px}.s315{min-width:243px;width:243px;height:25px}.f43{font-size:4px;font-size:calc(4px * var(--f))}.ps166{margin-left:13px;margin-top:24px}.s316{min-width:293px;width:293px;min-height:18px}.s317{min-width:20px;min-height:18px;width:20px;height:5px}.f44{font-size:4px;font-size:calc(4px * var(--f));line-height:1.251;padding-top:7px;padding-bottom:6px}.ps167{margin-left:5px}.s318{min-width:20px;min-height:18px;width:20px;height:9px}.f45{font-size:7px;font-size:calc(7px * var(--f));line-height:1.287;padding-top:5px;padding-bottom:4px}.ps168{margin-left:4px}.ps169{margin-left:5px}.ps170{margin-left:5px}.ps171{margin-left:5px}.ps172{margin-left:5px}.ps173{margin-left:5px}.ps174{margin-left:5px}.ps175{margin-left:5px}.ps176{margin-left:4px}.s319{min-width:20px;min-height:18px;width:20px;height:4px}.f46{font-size:3px;font-size:calc(3px * var(--f));line-height:1.334;padding-top:7px;padding-bottom:7px}body{--d:5;--s:320}}</style>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon-db99c3.png">
<meta name="msapplication-TileImage" content="images/mstile-144x144-b52991.png">
<link rel="manifest" href="manifest.json" crossOrigin="use-credentials">
<script async src="https://www.googletagmanager.com/gtag/js?id="></script>
<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','');</script>
<link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.b903b0.css" media="print">
</head>
<body id="b">
<script>var p=document.createElement("P");p.innerHTML="&nbsp;",p.style.cssText="position:fixed;visible:hidden;font-size:100px;zoom:1",document.body.appendChild(p);var rsz=function(e){return function(){var r=Math.trunc(1e3/parseFloat(window.getComputedStyle(e).getPropertyValue("font-size")))/10,t=document.body;r!=t.style.getPropertyValue("--f")&&t.style.setProperty("--f",r)}}(p);if("ResizeObserver"in window){var ro=new ResizeObserver(rsz);ro.observe(p)}else if("requestAnimationFrame"in window){var raf=function(){rsz(),requestAnimationFrame(raf)};requestAnimationFrame(raf)}else setInterval(rsz,100);</script>

<script>!function(){var e=function(){var e=document.body;e.style.setProperty("--z",1);var t=window.innerWidth,n=getComputedStyle(e).getPropertyValue("--s");if(320==n){if(t<320)return;t=Math.min(479,t)}else if(480==n){if(t<480)return;t=Math.min(610,t)}else t=n;e.style.setProperty("--z",Math.trunc(t/n*1e3)/1e3)};window.addEventListener?window.addEventListener("resize",e,!0):window.onscroll=e,e()}();</script>

<?php
    $mb = extension_loaded('mbstring');

    function find($searchText, $searchFor) {
        global $mb;
        return $mb ? mb_stripos($searchText, $searchFor) : stripos($searchText, $searchFor);
    }

    function mb_split_str($str) {
        preg_match_all("/./u", $str, $arr);
        return $arr[0];
    }

    function s_similar_text($str1, $str2) {
        return 1. / (1. + levenshtein($str1, $str2) / 3.);
    }

    function simfind($searchText, $searchWord, &$score) {
        global $mb;
        $s = strtoupper($searchWord);
        foreach(preg_split("/[\\s]+/", $searchText) as $w) {
            $similarity = s_similar_text($s, strtoupper($w));
            if($similarity >= .6) {
                $score = $similarity;
                return array($mb ? mb_stripos($searchText, $w) : stripos($searchText, $w), $mb ? mb_strlen($w) : strlen($w));
            }
        }
        return array(FALSE, FALSE);
    }

    function scorecmp($a, $b) {
        if ($a['score'] == $b['score']) {
            return 0;
        }
        return ($a['score'] < $b['score']) ? 1 : -1;
    }

    function textlencmp($a, $b) {
        if (strlen($a['text']) == strlen($b['text'])) {
            return 0;
        }
        return (strlen($a['text']) < strlen($b['text'])) ? 1 : -1;
    }

    function snipcmp($a, $b) {
        if ($a['score'] == $b['score']) {
            return textlencmp($a, $b);
        }
        return ($a['score'] < $b['score']) ? 1 : -1;
    }

    function ordercmp($a, $b) {
        if ($a['order'] == $b['order']) {
            return 0;
        }
        return ($a['order'] > $b['order']) ? 1 : -1;
    }

    function mfind($searchText, $searchFor, $words, $w, &$wordsfound) {
        if(empty($searchFor))
            return FALSE;

        $snippet = array('text' => $searchText, 'w' => $w);
        if(($pos = find($searchText, $searchFor)) !== FALSE) {
            $wordsfound = array_merge($wordsfound, $words);
            $snippet['score'] = 20;
            $snippet['pos'] = $pos;
            $snippet['matchlen'] = strlen($searchFor);
            return $snippet;
        }
        foreach($words as $searchWord) {
            if(($pos = find($searchText, $searchWord)) !== FALSE) {
                $snippet['score'] = isset($wordscores[$searchWord]) ? 0.5 : 10;
                $wordsfound[] = $searchWord;
                $snippet['pos'] = $pos;
                $snippet['matchlen'] = strlen($searchWord);
                return $snippet;
            }
        }
        foreach($words as $searchWord) {
            $score = 1;
            $match = simfind($searchText, $searchWord, $score);
            if($match[0] !== FALSE) {
                $wordsfound[] = $searchWord;
                $snippet['score'] = $score * 5;
                $snippet['pos'] = $match[0];
                $snippet['matchlen'] = $match[1];
                return $snippet;
            }
        }
        return FALSE;
    }

    $page = 0;
    $start_page = 0;
    $end_page = -1;
    $searchResults = array();
    $found = array();
    if(isset($_GET['search'])) {
        $results_per_page = 10;
        $pages = 10;
        $page = (isset($_GET['page']) ? $_GET['page'] : 1);
        if($page < 1) {
            $page = 1;
        }
        $start_page = $page - $pages / 2;
        if($start_page < 1) {
            $start_page = 1;
        }

        $searchFor = $_GET['search'];
        $words = array_filter(preg_split("/[\\s]+/", $searchFor), function ($w) { return strlen($w) > 2; });
        $searchPages = array(array('title'=>'Home','link'=>'./','texts'=>array(array('t'=>'Located in Marienville, PA','w'=>'7'),array('t'=>'Park Circle Apartments','w'=>'7'),array('t'=>'Apartments are Newly Remolded, Including Entry Way, with Further Improvements Scheduled to Begin this Spring!','w'=>'1'),array('t'=>'Are you fed up with having so many monthly bills? …… ','w'=>'1'),array('t'=>'We offer a modern solution, including all utilities, and high speed internet for one low monthly price. ','w'=>'1'),array('t'=>'COST OF RENT INCLUDES ALL OF THE FOLLOWING','w'=>'5'),array('t'=>'ELECTRIC','w'=>'7'),array('t'=>'GAS','w'=>'7'),array('t'=>'1 GB/s Internet','w'=>'7'),array('t'=>'WATER','w'=>'7'),array('t'=>'SEWAGE','w'=>'7'),array('t'=>'GARBAGE','w'=>'7'),array('t'=>'You will be able to access speeds up to 1 GB/s, which is fast, really fast…….','w'=>'1'),array('t'=>'This allows you to stream 4K movies, participate in video-conferencing, play video games, browse the internet, and more, all without any issue whatsoever. There is also no monthly cap on how much data you use, so feel free to use the internet, without any limitations tow worry about. ','w'=>'1'),array('t'=>'Studio Apartment','w'=>'5'),array('t'=>'Loft Apartment','w'=>'5'),array('t'=>'Loft Apartment','w'=>'5'),array('t'=>'Convent and Simple Online Payments, Pay with Any Credit/Debit Card, Bank Transfer, or Personal Checks.','w'=>'5'),array('t'=>'Tenants are provided a user account that is directly integrated into this website, allowing fast, hassle free communication. ','w'=>'5'),array('t'=>'You can request maintenance, view your lease agreements, submit a payment, view any news regarding improvement timeframe, report an emergency, and provides a direct contact number to my personal cell phone.','w'=>'5'),array('t'=>'These are second story apartments, so if you are at risk for falls, these would not be able to accommodate your safety needs. ','w'=>'1'),array('t'=>'The apartments have an enclosed separate staircase leading to the apartments. Access is provided via a  wide staircase, with newly installed  rubber coverings to increase the shoes grip in winter or other slippery conditions. ','w'=>'1'),array('t'=>'LOCATION','w'=>'7'),array('t'=>'Park Circle Apartments','w'=>'1'),array('t'=>'15 Park Circle','w'=>'1'),array('t'=>'Marienville, PA 16239','w'=>'1'),array('t'=>'PHONE','w'=>'1'),array('t'=>'EMAIL','w'=>'1'),array('t'=>'INQUIRY','w'=>'1'))),array('title'=>'ABout','link'=>'about.html','texts'=>array(array('t'=>'About','w'=>'7'),array('t'=>'Park Circle Apartments is a real estate propter owned & managed by ','w'=>'1'),array('t'=>'SRP Consulting Group, LLC','w'=>'1'),array('t'=>'SRP Consulting Group, LLC is a business management company located in Marienville, PA.','w'=>'1'),array('t'=>'SRP Consulting Group, LLC has provided consulting in strategic business management, technology, web & app development, UI+UX design, healthcare, psychopharmacology, flight simulation & HEMS, and musical production.','w'=>'1'),array('t'=>'Shea R. Patterson','w'=>'1'),array('t'=>' M.B.A. | B.S.B.A.','w'=>'1'),array('t'=>'Founder & CEO','w'=>'1'),array('t'=>'SRP Consulting Group, LLC','w'=>'1'))),array('texts'=>array(array('t'=>'Your Contact Form has been succesfully submited','w'=>'7'),array('t'=>' I monitor my communications almost 24/7 so expect a prompt respnose.','w'=>'6'),array('t'=>'Thanks for reaching out!','w'=>'1'),array('t'=>'','w'=>'1'),array('t'=>'Shea R. Patterson, MBA','w'=>'1'),array('t'=>'Park Circle Apartments','w'=>'1'),array('t'=>'SRP CONSULTING GROUP, LLC','w'=>'1')),'title'=>'Thank You Page','section'=>'Password Protected','link'=>'thank-you-page.php'),array('title'=>'Inquire About Rental','link'=>'inquire-about-rental.html','texts'=>array(array('t'=>'Inquire About a Rental Unit','w'=>'7'),array('t'=>'Family Size','w'=>'1'),array('t'=>'Children','w'=>'1'))),array('title'=>'General Contact','link'=>'general-contact.html','texts'=>array(array('t'=>'Contact','w'=>'7'))),array('title'=>'Tennant Sign Up','link'=>'tennant-sign-up.html','texts'=>array(array('t'=>'New Tennant Account Sign-Up','w'=>'7'))),array('texts'=>array(array('t'=>'Loft Apartment','w'=>'7'),array('t'=>'COST OF RENT PER MONTH:  $900','w'=>'7'),array('t'=>'• INCLUDES ALL AMENITIES AS SEEN IN THE PHOTOGRAPHS','w'=>'7'),array('t'=>'• INCLUDES ALL UTILITIES','w'=>'7'),array('t'=>'• INCLUDES HIGH SPEED INTERNET','w'=>'7')),'title'=>'Loft Apartment','section'=>'Rentals','link'=>'loft-apartment.html'),array('texts'=>array(array('t'=>'Studio Apartment','w'=>'7'),array('t'=>'COST OF RENT PER MONTH:  $700','w'=>'7'),array('t'=>'• INCLUDES ALL AMENITIES AS SEEN IN THE PHOTOGRAPHS','w'=>'7'),array('t'=>'• INCLUDES ALL UTILITIES','w'=>'7'),array('t'=>'• INCLUDES HIGH SPEED INTERNET','w'=>'7')),'title'=>'Studio Apartment','section'=>'Rentals','link'=>'studio-apartment.html'));
        foreach($searchPages as $searchPage) {
            if(isset($searchPage['groups'])) {
                if(!isset($_SESSION['user_id']) || !checkAccess($access_control_groups[$searchPage['uuid']])) {
                    continue;
                }
            }
            $foundwords = array();
            if(($title = mfind($searchPage['title'], $searchFor, $words, 10, $foundwords)) !== FALSE) {
                $title['score'] *= (strlen($searchFor) / strlen($searchPage['title']));
            }
            $snippets = array();
            $order = 1;
            foreach($searchPage['texts'] as $text) {
                if(($s = mfind($text['t'], $searchFor, $words, $text['w'], $foundwords)) !== FALSE) {
                    $s['order'] = $order++;
                    $snippets[] = $s;
                }
            }
            if(count(array_diff(array_unique($words), array_unique($foundwords))) == 0) {
                if(count($snippets) == 0 && $title !== FALSE) {
                    foreach($searchPage['texts'] as $text) {
                        $s = array('text' => $text['t'], 'w' => $text['w']);
                        $s['order'] = $order++;
                        $s['score'] = 0;
                        $s['pos'] = 0;
                        $s['matchlen'] = 0;
                        $snippets[] = $s;
                    }
                }
                if(count($snippets)) {
                    $len = 300;
                    $snippet_count = intval(($len + 99) / 100);
                    uasort($snippets, 'snipcmp');
                    $original_snippets = $snippets;
                    $snippet_length = intval($len / $snippet_count);
                    $newsnippets = array();
                    $total = 0;
                    foreach($snippets as $s) {
                        $s2 = $s;
                        $s2['snip'] = $snippet_length;
                        $capped = min($snippet_length, strlen($s['text']));
                        if($total + $capped > $len) {
                            $s2['snip'] = $len - $total;
                            $newsnippets[] = $s2;
                            break;
                        }
                        $total += $capped;
                        $newsnippets[] = $s2;
                        if($total >= $len) {
                            break;
                        }
                    }
                    $snippets = $newsnippets;
                    if(count($snippets) < $snippet_count) {
                        $f = $snippet_count / count($snippets);
                        $total = 0;
                        $newsnippets = array();
                        foreach($snippets as $s) {
                            $s['snip'] = min(strlen($s['text']), $s['snip'] * $f);
                            $total += $s['snip'];
                            $newsnippets[] = $s;
                        }
                        $snippets = $newsnippets;
                        $newsnippets = array();
                        foreach($snippets as $s) {
                            if($s['snip'] < strlen($s['text'])) {
                                $inc = min($len - $total, strlen($s['text']) - $s['snip']);
                                $s['snip'] += $inc;
                                $total += $inc;
                            }
                            $newsnippets[] = $s;
                        }
                        $snippets = $newsnippets;
                    }
                    $score = 0;
                    foreach($original_snippets as $s) {
                        $l = strlen($s['text']);
                        if($l > $snippet_length)
                            $l = $snippet_length;
                        $score += $s['score'] * $s['w'] * ($l / $snippet_length);
                    }
                
                    uasort($snippets, 'ordercmp');
                    if($title !== FALSE) {
                        $score += 30 * $title['score'];
                    }
                    $found[] = array('link' => $searchPage['link'], 'title' => htmlentities($searchPage['title']), 'score' => $score, 'snippets' => $snippets);
                }
            }
        }
        $current_page = $page;
        $end_page = intval((count($found) + ($results_per_page - 1)) / $results_per_page);
        uasort($found, 'scorecmp');
        $searchResults = array_slice($found, ($page - 1) * $results_per_page, $results_per_page);
    }
?>

<div data-block-group="0" class="c50">
<div class="v20 ps143 s261 c51 z111">
<div class="ps144">
</div>
<div class="ps145 v20 s262">
<div class="v21 ps146 s263">
<div class="v21 ps147 s264 c52 z112">
<a href="./" class="a7"><picture><source srcset="images/untitled-3-1--54.avif 1x, images/untitled-3-1--108.avif 2x" type="image/avif" media="(max-width:479px)"><source srcset="images/untitled-3-1--54.png 1x, images/untitled-3-1--108-1.png 2x" media="(max-width:479px)"><source srcset="images/untitled-3-1--80.avif 1x, images/untitled-3-1--160.avif 2x" type="image/avif" media="(max-width:767px)"><source srcset="images/untitled-3-1--80.png 1x, images/untitled-3-1--160-1.png 2x" media="(max-width:767px)"><source srcset="images/untitled-3-1--129.avif 1x, images/untitled-3-1--258.avif 2x" type="image/avif" media="(max-width:959px)"><source srcset="images/untitled-3-1--129.png 1x, images/untitled-3-1--258-1.png 2x" media="(max-width:959px)"><source srcset="images/untitled-3-1--161.avif 1x, images/untitled-3-1--322-1.avif 2x" type="image/avif" media="(max-width:1199px)"><source srcset="images/untitled-3-1--161-1.png 1x, images/untitled-3-1--322-3.png 2x" media="(max-width:1199px)"><source srcset="images/untitled-3-1--201.avif 1x, images/untitled-3-1--402.avif 2x" type="image/avif" media="(max-width:1919px)"><source srcset="images/untitled-3-1--201-1.png 1x, images/untitled-3-1--402-1.png 2x" media="(max-width:1919px)"><source srcset="images/untitled-3-1--322.avif 1x, images/untitled-3-1--644.avif 2x" type="image/avif" media="(min-width:1920px)"><source srcset="images/untitled-3-1--322-2.png 1x, images/untitled-3-1--644-1.png 2x" media="(min-width:1920px)"><img src="images/untitled-3-1--644-1.png" class="i19"></picture></a>
</div>
<div class="v21 ps148 s265">
<form method="GET" action="search.php" class="v21 ps149 s266 z113">
<div class="v21 ps147 s266 z111">
<div class="v21 ps147 s267 c52 z114">
<input type="text" name="search" required class="input6">
</div>
<div class="un52 v22 ps150 s268 c53 z115">
<a onclick="var p=this;while(p.nodeName!='FORM')p=p.parentNode;if('requestSubmit'in p){p.requestSubmit()}else{p.submit()}return false;" class="a8 f39">Search</a>
</div>
</div>
</form>
<div class="v23 ps151 s269 z116">
<ul class="menu-dropdown v21 ps147 s270 m4" id="m1">
<li class="v21 ps147 s271">
<a href="./" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s272 c54 z111"><div class="v21 ps152 s273 c52 z117"><p class="p10 f40">Home</p></div></div></div></a>
</li>
<li class="v21 ps153 s274">
<div class="menu-content mcv4">
<div class="v21 ps147 s275 c54 z111">
<div class="v21 ps152 s276 c52 z117">
<p class="p10 f40">Rentals</p>
</div>
</div>
</div>
<ul class="menu-dropdown v24 ps147 s277 m4 z118">
<li class="v21 ps147 s278">
<a href="loft-apartment.html" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s279 c55 z111"><div class="v21 ps154 s280 c52 z117"><p class="p10 f40">Loft Apartment</p></div></div></div></a>
</li>
<li class="v21 ps155 s281">
<a href="studio-apartment.html" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s282 c55 z111"><div class="v21 ps154 s283 c52 z117"><p class="p10 f40">Studio Apartment</p></div></div></div></a>
</li>
</ul>
</li>
<li class="v21 ps153 s284">
<div class="menu-content mcv4">
<div class="v21 ps147 s285 c54 z111">
<div class="v21 ps152 s286 c52 z117">
<p class="p10 f40">Contact</p>
</div>
</div>
</div>
<ul class="menu-dropdown v24 ps147 s287 m4 z118">
<li class="v21 ps147 s288">
<a href="inquire-about-rental.html" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s289 c56 z111"><div class="v21 ps156 s290 c52 z117"><p class="p10 f40">Inquire About a Rental</p></div></div></div></a>
</li>
<li class="v21 ps157 s291">
<a href="#" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s292 c56 z111"><div class="v21 ps156 s293 c52 z117"><p class="p10 f40">General Contact</p></div></div></div></a>
</li>
</ul>
</li>
<li class="v21 ps153 s294">
<div class="menu-content mcv4">
<div class="v21 ps147 s295 c54 z111">
<div class="v21 ps152 s296 c52 z117">
<p class="p10 f40">Tennat's</p>
</div>
</div>
</div>
<ul class="menu-dropdown v24 ps147 s297 m4 z118">
<li class="v21 ps147 s298">
<a href="user-login.html" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s299 c55 z111"><div class="v21 ps158 s300 c52 z117"><p class="p10 f40">Log-In</p></div></div></div></a>
</li>
<li class="v21 ps157 s301">
<a href="./logout-d12b45.php" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s302 c55 z111"><div class="v21 ps158 s303 c52 z117"><p class="p10 f40">Log Out</p></div></div></div></a>
</li>
<li class="v21 ps157 s304">
<a href="maintiance.php" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s305 c55 z111"><div class="v21 ps158 s306 c52 z117"><p class="p10 f40">Sign Up</p></div></div></div></a>
</li>
</ul>
</li>
<li class="v21 ps153 s307">
<a href="about.html" class="ml4"><div class="menu-content mcv4"><div class="v21 ps147 s308 c54 z111"><div class="v21 ps152 s309 c52 z117"><p class="p10 f40">About</p></div></div></div></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="ps159 v20 s310 z111">
<div class="v21 ps160 s311 c52 z119">
<p class="p11 f41">Search results for &quot;<span class="f41"><?php if(isset($_GET['search'])) echo $_GET['search']; ?></span>&quot;</p>
</div>
<div class="v21 ps161 s312 c57 z120">
<?php
    function rev_string($string) {
        global $mb;
        $chars = $mb ? mb_split_str($string, 1, mb_internal_encoding()) : str_split($string, 1);
        return implode('', array_reverse($chars));
    }

    function word_trunc($string, $length) {
        global $mb;
        if(strlen($string) > $length)
        {
            $string = wordwrap($string, $length);
            $string = $mb? mb_substr($string, 0, mb_strpos($string, "\n")) : substr($string, 0, strpos($string, "\n"));
        }
        return $string;
    }

    function clip_string($string, $pos, $length, $total) {
        global $mb;
        if($length) {
            $m = $mb ? mb_substr($string, $pos, $length) : substr($string, $pos, $length);
            $before = $mb ? mb_substr($string, 0, $pos) : substr($string, 0, $pos);
            $after = $mb ? mb_substr($string, $pos + $length, mb_strlen($string) - ($pos + $length)) : substr($string, $pos + $length, strlen($string) - ($pos + $length));
            $before = rev_string($before);
            if($total < strlen($string)) {
                $half = intval(($total - $length) / 2);
            } else {
                $half = $total;
            }
            $hlPre = '<b>';
            $hlPost = '</b>';
            $out = htmlentities(rev_string(word_trunc($before, $half))) . $hlPre . htmlentities($m) . $hlPost . htmlentities(word_trunc($after, $half));
            return $out;
        } else {
            return htmlentities(word_trunc($string, $total));
        }
    }

    if(count($searchResults) == 0) {
        $result = '<div class="v21 ps162 s313 z111"><div class="v21 ps163 s314 c52 z121"><p class="p11 f42">{title}</p></div><div class="v21 ps164 s315 c52 z122"><p class="p11 f43">{text}</p></div></div>';
        $result = str_replace('{title}', htmlentities('No search result'), $result);
        $result = str_replace('{text}', '', $result);
        echo $result;
    }
    else {
        echo '';
        foreach($searchResults as $searchResult) {
            $result = '<div class="v21 ps162 s313 z111"><div class="v21 ps163 s314 c52 z121"><p class="p11 f42">{title}</p></div><div class="v21 ps164 s315 c52 z122"><p class="p11 f43">{text}</p></div></div>';
            $result = str_replace('{title}', '<a href="' . $searchResult['link'] . '">' . $searchResult['title'] . '</a>', $result);

            $text = "";
            foreach($searchResult['snippets'] as $s) {
                $pos = $s['pos'];
                $m = $s['matchlen'];
                $snippet = clip_string($s['text'], $pos, $m, $s['snip']);
                if(strlen($text))
                    $text .= " &hellip; ";
                $text .= " " . $snippet;
            }

            $result = str_replace('{text}', $text, $result);
            echo $result;
        }
   }
?>

</div>
<div class="v21 ps166 s316">
<div class="ps165">
<?php

    echo '<style>.pbdn{display:none}.pbc{border: 0;background-color:#7b8078;color:#fff;border-color:#7b8078}</style>';
    $control = '<div class="v22 ps147 s317 c58 z123 {btnclass} {lnkclass}"><a href="#" class="a8 f44">&lt;&lt;</a></div>';
    if($page > 1) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . ($page - 1);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{btnclass}', '', $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps167 s318 c59 z124 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps168 s318 c59 z125 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps169 s318 c59 z126 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps170 s318 c59 z127 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps171 s318 c59 z128 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps172 s318 c59 z129 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps173 s318 c59 z130 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps171 s318 c59 z131 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps174 s318 c59 z132 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps175 s318 c59 z133 {btnclass} {lnkclass}"><a href="#" class="a8 f45">{page_num}</a></div>';
    $buttonPage = $start_page + 1 - 1;
    if($buttonPage <= $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . $buttonPage;
        if($buttonPage == $page) {
            $control = str_replace('href="#"', '', $control);
            $control = str_replace('{lnkclass}', 'pbc', $control);
        }
        else {
            $control = str_replace('href="#"', 'href="' . $url . '"', $control);
            $control = str_replace('{lnkclass}', '', $control);
        }
        $control = str_replace('{btnclass}', '', $control);
        $control = str_replace('{page_num}', $buttonPage, $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{page_num}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

<?php

    $control = '<div class="v22 ps176 s319 c60 z134 {btnclass} {lnkclass}"><a href="#" class="a8 f46">&gt;&gt;</a></div>';
    if($page < $end_page) {
        $url = strtok($_SERVER['REQUEST_URI'],'?') . '?search=' . $searchFor . '&page=' . ($page + 1);
        $control = str_replace('href="#"', 'href="' . $url . '"', $control);
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{btnclass}', '', $control);
    }
    else {
        $control = str_replace('{lnkclass}', '', $control);
        $control = str_replace('{btnclass}', 'pbdn', $control);
    }
    echo $control;

?>

</div>
</div>
</div>
<div data-block-group="0" class="btf v18 ps137 s258 c48 z109">
<div class="ps138">
</div>
<div class="ps139 v18 s259">
<div class="v19 ps140 s21">
<div class="v19 ps141 s260 c2 z110">
<p class="p9 f38">Copyrights 2024</p>
<p class="p9 f38">SRP Consulting Group, LLC</p>
<p class="p9 f38">All Rights Reserved</p>
</div>
<div class="v19 ps142 s23 c2 z110">
<picture>
<source srcset="images/copy-of-untitled-2-29.avif 1x, images/copy-of-untitled-2-58.avif 2x" type="image/avif" media="(max-width:479px)">
<source srcset="images/copy-of-untitled-2-29.png 1x, images/copy-of-untitled-2-58-1.png 2x" media="(max-width:479px)">
<source srcset="images/copy-of-untitled-2-42.avif 1x, images/copy-of-untitled-2-84.avif 2x" type="image/avif" media="(max-width:767px)">
<source srcset="images/copy-of-untitled-2-42.png 1x, images/copy-of-untitled-2-84-1.png 2x" media="(max-width:767px)">
<source srcset="images/copy-of-untitled-2-69.avif 1x, images/copy-of-untitled-2-138.avif 2x" type="image/avif" media="(max-width:959px)">
<source srcset="images/copy-of-untitled-2-69.png 1x, images/copy-of-untitled-2-138-1.png 2x" media="(max-width:959px)">
<source srcset="images/copy-of-untitled-2-85.avif 1x, images/copy-of-untitled-2-170-1.avif 2x" type="image/avif" media="(max-width:1199px)">
<source srcset="images/copy-of-untitled-2-85-1.png 1x, images/copy-of-untitled-2-170-3.png 2x" media="(max-width:1199px)">
<source srcset="images/copy-of-untitled-2-106.avif 1x, images/copy-of-untitled-2-212.avif 2x" type="image/avif" media="(max-width:1919px)">
<source srcset="images/copy-of-untitled-2-106-1.png 1x, images/copy-of-untitled-2-212-1.png 2x" media="(max-width:1919px)">
<source srcset="images/copy-of-untitled-2-170.avif 1x, images/copy-of-untitled-2-340.avif 2x" type="image/avif" media="(min-width:1920px)">
<source srcset="images/copy-of-untitled-2-170-2.png 1x, images/copy-of-untitled-2-340-1.png 2x" media="(min-width:1920px)">
<img src="images/copy-of-untitled-2-340-1.png" loading="lazy" class="i18">
</picture>
</div>
</div>
</div>
</div>
<div class="btf c49">
</div>
<script>var lwi=-1;function thresholdPassed(){var w=document.documentElement.clientWidth;var p=false;var cw=0;if(w>=480){cw++;}if(w>=768){cw++;}if(w>=960){cw++;}if(w>=1200){cw++;}if(w>=1920){cw++;}if(lwi!=cw){p=true;}lwi=cw;return p;}!function(){if("Promise"in window&&void 0!==window.performance){var e,t,r=document,n=function(){return r.createElement("link")},o=new Set,a=n(),i=a.relList&&a.relList.supports&&a.relList.supports("prefetch"),s=location.href.replace(/#[^#]+$/,"");o.add(s);var c=function(e){var t=location,r="http:",n="https:";if(e&&e.href&&e.origin==t.origin&&[r,n].includes(e.protocol)&&(e.protocol!=r||t.protocol!=n)){var o=e.pathname;if(!(e.hash&&o+e.search==t.pathname+t.search||"?preload=no"==e.search.substr(-11)||".html"!=o.substr(-5)&&".html"!=o.substr(-5)&&"/"!=o.substr(-1)))return!0}},u=function(e){var t=e.replace(/#[^#]+$/,"");if(!o.has(t)){if(i){var a=n();a.rel="prefetch",a.href=t,r.head.appendChild(a)}else{var s=new XMLHttpRequest;s.open("GET",t,s.withCredentials=!0),s.send()}o.add(t)}},p=function(e){return e.target.closest("a")},f=function(t){var r=t.relatedTarget;r&&p(t)==r.closest("a")||e&&(clearTimeout(e),e=void 0)},d={capture:!0,passive:!0};r.addEventListener("touchstart",function(e){t=performance.now();var r=p(e);c(r)&&u(r.href)},d),r.addEventListener("mouseover",function(r){if(!(performance.now()-t<1200)){var n=p(r);c(n)&&(n.addEventListener("mouseout",f,{passive:!0}),e=setTimeout(function(){u(n.href),e=void 0},80))}},d)}}();dpth="/";!function(){var e={},t={},n={};window.ld=function(a,r,o){var c=function(){"interactive"==document.readyState?(r&&r(),document.addEventListener("readystatechange",function(){"complete"==document.readyState&&o&&o()})):"complete"==document.readyState?(r&&r(),o&&o()):document.addEventListener("readystatechange",function(){"interactive"==document.readyState&&r&&r(),"complete"==document.readyState&&o&&o()})},d=(1<<a.length)-1,u=0,i=function(r){var o=a[r],i=function(){for(var t=0;t<a.length;t++){var r=(1<<t)-1;if((u&r)==r&&n[a[t]]){if(!e[a[t]]){var o=document.createElement("script");o.textContent=n[a[t]],document.body.appendChild(o),e[a[t]]=!0}if((u|=1<<t)==d)return c(),0}}return 1};if(null==t[o]){t[o]=[];var f=new XMLHttpRequest;f.open("GET",o,!0),f.onload=function(){n[o]=f.responseText,[].forEach.call(t[o],function(e){e()})},t[o].push(i),f.send()}else{if(e[o])return i();t[o].push(i)}return 1};if(a.length)for(var f=0;f<a.length&&i(f);f++);else c()}}();ld([],function(){!function(){var e=document.querySelectorAll('a[href^="#"]');[].forEach.call(e,function(e){e.addEventListener("click",function(t){var a=!1,o=document.body.parentNode;(/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream||"MacIntel"===navigator.platform&&navigator.maxTouchPoints>1)&&"none"!=getComputedStyle(o).getPropertyValue("scroll-snap-type")&&(o.setAttribute("data-snap",o.style.scrollSnapType),o.style.scrollSnapType="none",a=!0);var n=0;if(e.hash.length>1){var r=parseFloat(getComputedStyle(document.body).getPropertyValue("zoom"));r||(r=1);var i=e.hash.slice(1),s=document.getElementById(i);if(null===s&&null===(s=document.querySelector('[name="'+i+'"]')))return;var u=/chrome/i.test(navigator.userAgent);n=u?s.getBoundingClientRect().top*r+pageYOffset:(s.getBoundingClientRect().top+pageYOffset)*r}else if(a)for(var l=document.querySelectorAll("[data-block-group]"),c=0;c<l.length;c++)if("none"!=getComputedStyle(l[c]).getPropertyValue("scroll-snap-align")){s=l[c];break}if(a)window.smoothScroll(t,s,1);else if("scrollBehavior"in document.documentElement.style)scroll({top:n,left:0,behavior:"smooth"});else if("requestAnimationFrame"in window){var d=pageYOffset,m=null;requestAnimationFrame(function e(t){m||(m=t);var a=(t-m)/400;scrollTo(0,d<n?(n-d)*a+d:d-(d-n)*a),a<1?requestAnimationFrame(e):scrollTo(0,n)})}else scrollTo(0,n);t.preventDefault()},!1)})}(),window.smoothScroll=function(e,t,a,o){e.stopImmediatePropagation();var n,r=pageYOffset;t?(("string"==typeof t||t instanceof String)&&(t=document.querySelector(t)),n=t.getBoundingClientRect().top):n=-r;var i=parseFloat(getComputedStyle(document.body).getPropertyValue("zoom"));i||(i=1);var s=n*i+(/chrome/i.test(navigator.userAgent)?0:r*(i-1)),u=null;function l(){c(window.performance.now?window.performance.now():Date.now())}function c(e){null===u&&(u=e);var n=(e-u)/1e3,i=function(e,t,a){switch(o){case"linear":break;case"easeInQuad":e*=e;break;case"easeOutQuad":e=1-(1-e)*(1-e);break;case"easeInCubic":e*=e*e;break;case"easeOutCubic":e=1-Math.pow(1-e,3);break;case"easeInOutCubic":e=e<.5?4*e*e*e:1-Math.pow(-2*e+2,3)/2;break;case"easeInQuart":e*=e*e*e;break;case"easeOutQuart":e=1-Math.pow(1-e,4);break;case"easeInOutQuart":e=e<.5?8*e*e*e*e:1-Math.pow(-2*e+2,4)/2;break;case"easeInQuint":e*=e*e*e*e;break;case"easeOutQuint":e=1-Math.pow(1-e,5);break;case"easeInOutQuint":e=e<.5?16*e*e*e*e*e:1-Math.pow(-2*e+2,5)/2;break;case"easeInCirc":e=1-Math.sqrt(1-Math.pow(e,2));break;case"easeOutCirc":e=Math.sqrt(1-Math.pow(0,2));break;case"easeInOutCirc":e=e<.5?(1-Math.sqrt(1-Math.pow(2*e,2)))/2:(Math.sqrt(1-Math.pow(-2*e+2,2))+1)/2;break;case"easeInOutQuad":default:e=e<.5?2*e*e:1-Math.pow(-2*e+2,2)/2}e>1&&(e=1);return t+a*e}(n/a,r,s);if(window.scrollTo(0,i),n<a)"requestAnimationFrame"in window?requestAnimationFrame(c):setTimeout(l,1e3/120);else if(/iPad|iPhone|iPod/.test(navigator.userAgent)&&!window.MSStream||"MacIntel"===navigator.platform&&navigator.maxTouchPoints>1){if(t)for(var d=t;d!=document.body;){if(d.getAttribute("data-block-group")){d.scrollIntoView();break}d=d.parentNode}setTimeout(function(){var e=document.body.parentNode;e.style.scrollSnapType=e.getAttribute("data-snap"),e.removeAttribute("data-snap")},100)}}return"requestAnimationFrame"in window?requestAnimationFrame(c):setTimeout(l,1e3/120),!1};!function(){var e=null;if(location.hash){var t=location.hash.replace("#",""),n=function(){var o=document.getElementById(t);null===o&&(o=document.querySelector('[name="'+t+'"]')),o&&o.scrollIntoView(!0),"0px"===window.getComputedStyle(document.body).getPropertyValue("min-width")?setTimeout(n,100):null!=e&&setTimeout(e,100)};n()}else null!=e&&e()}();});ld(["js/jquery.6ad8c3.js","js/jqueryui.6ad8c3.js","js/menu.6ad8c3.js","js/menu-dropdown-animations.6ad8c3.js","js/menu-dropdown.b903b0.js"],function(){initMenu($('#m1')[0]);});</script>
</body>
</html>