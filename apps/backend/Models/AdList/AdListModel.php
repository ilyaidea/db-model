<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/3/2019
 * Time: 10:02 AM
 */

namespace Ad\Backend\Models\AdList ;


use Phalcon\Mvc\Model;

class AdListModel extends Model
{
    use TAdListModelProperties;
    use TAdListModelEvents;
    use TAdListModelRelations;
    use TAdListModelValidation;

    public function initialize()
    {
        $this->setSource('ilya_ad_list');

    }
    //هرجا نیاز بود که پست های ویرایشی کاربر توسط ناظر اکتیو بشن، باید از این
    //متد استفاده شود. یعنی زمان آپدیت کردن پست ها توسط ناظر.
    public function justOneActiveStatus()
    {

        if ($this->getStatus() == 'active')
        {
            $activeColumns = AdListModel::find(
                [
                    'conditions' => 'ad_id = ?1 AND id <> ?2 AND status = ?3 ',
                    'bind' => [
                        1 => $this->getAdId(),
                        2 => $this->getId(),
                        3 => 'active'
                    ]
                ]);

            /** @var AdListModel $activestatus */
            foreach ($activeColumns as $activestatus)
            {
                $activestatus->setStatus('inactive');

                if (!$activestatus->update())
                    var_dump($activestatus->getMessages());
            }
        }

    }



}