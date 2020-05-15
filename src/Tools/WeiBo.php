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

        preg_match('/([0-9]+)$', $url, $match);
        if ($this->checkEmptyMatch($match)) {
            throw new ErrorVideoException("{TouTiao} url parsing failed");
        }

        $getContentUrl = 'https://m.weibo.cn/status/' .$match[1];

        $contents = $this->get($url, [], [
            'User-Agent' => self::ANDROID_USER_AGENT
        ]);

        print_r($contents);
        $match = null;
        preg_match('/data-pagedata="(.*?)"/i', $contents, $match);
        if ($this->checkEmptyMatch($match)) {
            throw new ErrorVideoException("{KuaiShou} contents parsing failed");
        }

        $contents = htmlspecialchars_decode($match[1]);
        $data = json_decode($contents, true);

        return $this->returnData(
            $url,
            isset($data['user']['name']) ? $data['user']['name'] : '',
            isset($data['user']['avatar']) ? $data['user']['avatar'] : '',
            isset($data['video']['caption']) ? $data['video']['caption'] : '',
            isset($data['video']['poster']) ? $data['video']['poster'] : '',
            isset($data['video']['srcNoMark']) ? $data['video']['srcNoMark'] : '',
            isset($data['video']['type']) ? $data['video']['type'] : 'video'
        );
    }
}