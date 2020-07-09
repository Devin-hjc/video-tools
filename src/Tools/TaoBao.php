<?php
declare (strict_types=1);

namespace Smalls\VideoTools\Tools;

use Smalls\VideoTools\Interfaces\IVideo;
use Smalls\VideoTools\Logic\TaoBaoLogic;

/**
 * Created By 1
 * Author：smalls
 * Email：smalls0098@gmail.com
 * Date：2020/4/26 - 21:57
 **/
class TaoBao extends Base implements IVideo
{

    /**
     * 更新时间：2020/6/24
     * @param string $url
     * @return array
     */
    public function start(string $url): array
    {
        $this->logic = new TaoBaoLogic($url, $this->urlValidator->get('taobao'), $this->config);
        //strpos($str, $v);
        $this->logic->checkUrlHasTrue();
        $this->logic->setItemIds();
        $this->logic->setContents();
        return $this->exportData();
    }

}