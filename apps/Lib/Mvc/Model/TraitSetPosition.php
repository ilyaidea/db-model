<?php

namespace Lib\Mvc\Model;


trait TraitSetPosition
{
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
            $queryForSortPosition->andWhere('getLanguageIso=:lang:', ['lang' => $this->getLanguageIso()]);
        }

        if($this->isModeUpdate())
            $queryForSortPosition->orderBy('position ASC,created DESC');
        else
            $queryForSortPosition->orderBy('position ASC,modified DESC');

        $resultForSortPosition = $queryForSortPosition->getQuery()->execute();

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
        foreach($resultForSortPosition as $resultForSortPosition)
        {
            $class = get_class($this);

            $result = $class::findFirst($resultForSortPosition->id);

            $result->setPosition($i);

            if(!$result->update())
            {
                foreach($result->getMessages() as $message)
                {
                    die(print_r($message->getMessage()));
                }
            }
            $i++;
        }
    }

}