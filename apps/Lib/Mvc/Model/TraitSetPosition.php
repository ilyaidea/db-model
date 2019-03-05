<?php

namespace Lib\Mvc\Model;


trait TraitSetPosition
{

    /**
     * if position field is empty,this method sets position with
     * Maximum position value plus 1
     * @return void
     */
    public function setPositionIfEmpty()
    {
        if (!is_null($this->getPosition()))
            return;

        /** @var \Phalcon\Mvc\Model\Manager $modelManager */
        $modelManager = $this->getModelsManager();

        $position = $modelManager->createBuilder();

        $position->columns('MAX(position) AS max');

        $position->from(get_class($this));

            if(method_exists($this,'getParentId'))
            {
                if($this->getParentId())
                    $position->where('parent_id=:p:', ['p' => $this->getParentId()]);
                else
                    $position->where('parent_id IS NULL');
            }


        if($this->getId())
            $position->andWhere('id <> :id:', ['id' => $this->getId()]);

        if(method_exists($this,'getLanguageIso'))
        {
            $position->andWhere('language_iso = :lang:', ['lang' => $this->getLanguageIso()]);
        }

        $position = $position->getQuery()->getSingleResult();

        $this->setPosition(1);
        if($position->max)
            $this->setPosition($position->max + 1);

    }

    public function sortByPosition()
    {
        if (!method_exists($this,'setPosition'))
            return;


        /** @var \Phalcon\Mvc\Model\Manager $modelManager */
        $modelManager = $this->getModelsManager();

        $queryForSortPosition = $modelManager->createBuilder();

        $queryForSortPosition->columns(['id', 'position']);

        $queryForSortPosition->from(get_class($this));

        if(method_exists($this,'getParentId'))
        {
            if($this->getParentId())
                $queryForSortPosition->where('parent_id=:parent:', ['parent' => $this->getParentId()]);
            else
                $queryForSortPosition->where('parent_id IS NULL');
        }

        if(method_exists($this,'getLanguageIso'))
        {
            $queryForSortPosition->andWhere('language_iso = :lang:', ['lang' => $this->getLanguageIso()]);
        }

        if($this->isModeCreate())
            $queryForSortPosition->orderBy('position ASC,created DESC');
        else
            $queryForSortPosition->orderBy('position ASC,modified DESC');

        $resultForSortPosition = $queryForSortPosition->getQuery()->execute();

//        die(print_r($resultForSortPosition->toArray()));
        $this->iterateAndSaveNewPosition($resultForSortPosition);
    }

    /**
     * iterates in sorted array and updates their position with new value from i=1
     * @param array $resultForSortPosition
     * @return void
     */
    private function iterateAndSaveNewPosition($resultForSortPosition)
    {
        $i = 1;
        foreach($resultForSortPosition as $rFSP)
        {
//            $class = get_class($this);

            /** @var self $result */
            $result = self::findFirst($rFSP->id);

            $result->setPosition($i);

            if(!$result->update())
            {
                foreach($result->getMessages() as $message)
                {
                    if (!empty($message)) {
                        die(print_r($message->getMessage()));
                    }
                }
            }
            $i++;
        }
    }

}