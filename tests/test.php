<?php
/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/26 - 22:15
 **/

require '../vendor/autoload.php';

use Smalls\VideoTools\VideoManager;

//$res = VideoManager::DouYin()->start("https://v.douyin.com/w6EH9s/");
$res = "";
try {
    //$res = VideoManager::KuaiShou()->start("https://v.kuaishou.com/2RbSva");
    $res = VideoManager::WeiBo()->start("https://m.weibo.cn/5992630941/4503335431250037");
    print_r($res);
} catch (\Smalls\VideoTools\Exception\ErrorVideoException $e) {
    $e->getTraceAsString();
}
//
//$res = VideoManager::WeiBo()->start("https://m.weibo.cn/5992630941/4503335431250037");
//
//$res = VideoManager::HuoShan()->start("https://share.huoshan.com/hotsoon/s/kcU0XOnSO78/");
//
//$res = VideoManager::TouTiao()->start("https://m.toutiaoimg.cn/a6818537223466516995/?app=news_article&is_hit_share_recommend=0");
//
//$res = VideoManager::XiGua()->start("https://m.ixigua.com/group/6761303513852019214/?app=video_article&timestamp=1587970696&utm_source=copy_link&utm_medium=android&utm_campaign=client_share");
//
//$res = VideoManager::WeiShi()->start("https://h5.weishi.qq.com/weishi/feed/6Z7Uxwu7H1JsBFXPo/wsfeed?wxplay=1&id=6Z7Uxwu7H1JsBFXPo&collectionid=1bc8fe60a09dce07a4c5ce449b3c16bf&spid=8404838818534879236&qua=v1_and_weishi_6.7.6_588_312027000_d&chid=100081003&pkg=&attach=cp_reserves3_1000370721");
//
//$res = VideoManager::PiPiXia()->start("https://h5.pipix.com/s/wkwJBk/");
//
//$res = VideoManager::ZuiYou()->start("https://share.izuiyou.com/detail/152254948?zy_to=applink&to=applink");
//
//$res = VideoManager::MeiPai()->start("http://www.meipai.com/media/1200571483?client_id=1089857302&utm_media_id=1200571483&utm_source=meipai_share&utm_term=meipai_android&gid=2211243272");
//
//$res = VideoManager::LiVideo()->start("https://www.pearvideo.com/detail_1671290?st=7");
//
//$res = VideoManager::QuanMingGaoXiao()->start("https://longxia.music.xiaomi.com/share/video/6528730793005613056?sharerUserId=1939294&ref=WEIXIN");
//
//$res = VideoManager::PiPiGaoXiao()->start("http://share.ippzone.com/pp/post/48839688240");
//
//$res = VideoManager::MoMo()->start("https://m.immomo.com/s/moment/new-share-v2/ar8441324333.html?time=1587999787&name=46A41p1gHVzsiHb7+C4KCw==&avatar=85B3CC10-D284-1A12-4BDD-41AE6AFB870520200427&isdaren=1&isuploader=0&from=qqfriend");
//
//$res = VideoManager::ShuaBao()->start("http://h5.shua8cn.com/video_share?share_type=copy_url&video_source=recommend&platform=android&show_id=380b84faf9fabbcc7cf0de768d111e81&uid=0&invite_code=&_timestamp=1588001308&_sign=3009fbd584b721e2b7e46f3e94452d40");
//
//$res = VideoManager::XiaoKaXiu()->start("https://mobile.xiaokaxiu.com/video?id=6522164847705071616");

//var_dump($res);


