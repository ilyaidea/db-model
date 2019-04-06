<?php

namespace Lib\Common;

class Arrays
{

    public static function treeFlat(array $elements, $parentId = null, $level = 0, $parent = 'parent_id') {

        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $element['level'] = $level;
                $row = [];

                $children = self::treeFlat($elements, $element['id'], $level+1);

                if ($children) {
                    $row = array_merge([$element], $children);
                }
                else
                {
                    $branch[] = $element;
                }
                $branch = array_merge($branch, $row);
            }
        }

        return $branch;
    }

    public static function tree(array $elements, $parentId = null,  $parent = 'parent_id') {

        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $row = [];

                $children = self::tree($elements, $element['id']);

                $element['children'] = $children;

                $branch[] = $element;
            }

        }

        return $branch;
    }
}