<?php

namespace App;

class GenerateTree
{
	static function generate($data, $parent_id = null, $depth = 0)
    {
        $count = count($data);
        $tree = '<ul>';

        for ($i = 0; $i < $count; $i++) {

            if ($data[$i]['parent_id'] == $parent_id) {
                $tree .= '<li><button class="btn btn-link">';
                $tree .= $data[$i]['name'];
                $tree .= '</button>';
                $tree .= static::generate($data, $data[$i]['id'], $depth + 1);
                $tree .= '</li>';
            }

        }

        $tree .= '</ul>';

        return $tree;
    }
}