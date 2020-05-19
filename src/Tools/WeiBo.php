<?php
declare (strict_types=1);

namespace Smalls\VideoTools\Tools;

use Smalls\VideoTools\Exception\ErrorVideoException;
use Smalls\VideoTools\Interfaces\IVideo;

/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/27 - 0:46
 **/
class WeiBo extends Base implements IVideo
{

    /**
     * 更新时间：2020/4/30
     * @param string $url
     * @return array
     * @throws ErrorVideoException
     */
    public function start(string $url): array
    {
        if (empty($url)) {
            throw new ErrorVideoException("{WeiBo} url cannot be empty");
        }

        if (strpos($url, "m.weibo.cn") == false) {
            throw new ErrorVideoException("{WeiBo} the URL must contain one of the domain names m.weibo.cn to continue execution");
        }

        preg_match('/([0-9]+)$/i', $url, $match);
        if ($this->checkEmptyMatch($match)) {
            throw new ErrorVideoException("{WeiBo} url parsing failed");
        }

        $getContentUrl = 'https://m.weibo.cn/status/' .$match[1];

        // $contents = $this->get($getContentUrl, [], [
        //     'User-Agent' => self::ANDROID_USER_AGENT
        // ]);
        $contents = $this->get($getContentUrl, [], [
            //'Referer' => $getContentUrl,
            'User-Agent' => self::ANDROID_USER_AGENT
        ]);

        $match = null;
        preg_match('/render_data = (\[{[\S\s]+)\[0\]/i', $contents, $match);
        //preg_match('/stream_url":"(.+?)"/i', $contents, $match);

        if ($this->checkEmptyMatch($match)) {
            throw new ErrorVideoException("{WeiBo} contents parsing failed");
        }

        //$contents = htmlspecialchars_decode($match[1]);
        $data = json_decode($match[1], true)[0];

        return $this->returnData(
            $url,
            isset($data["status"]["status_title"]) ? $data["status"]["status_title"] : '',
            isset($data["status"]["user"]["screen_name"]) ? $data["status"]["user"]["screen_name"] : '',
            isset($data["status"]["user"]["avatar_hd"]) ? $data["status"]["user"]["avatar_hd"] : '',
            isset($data["status"]["page_info"]["title"]) ? $data["status"]["page_info"]["title"] : '',
            isset($data["status"]["page_info"]["media_info"]["stream_url"]) ? $data["status"]["page_info"]["media_info"]["stream_url"] : '',
            'video'
        );
    }
}