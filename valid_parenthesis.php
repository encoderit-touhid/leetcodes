<?php

function isValid($s)
{
    $stack       = [];
    $parenthesis = str_split($s);
    if (count($parenthesis) % 2 !== 0) {
        return false;
    }


    $map_parenthesis = [
        ')' => '(',
        '}' => '{',
        ']' => '[',

    ];
    $initial_brackets = ['(', '{', '['];

    foreach ($parenthesis as $key => $value) {

        if (in_array($value, $initial_brackets)) {
            $stack[] = $value;
        }

        if (array_key_exists($value, $map_parenthesis)) {
            $popped_value = array_pop($stack);
            if ($map_parenthesis[$value] !== $popped_value) {
                return false;
            }

        }
        

    }
    return count($stack) == 0 ? true : false;

}

var_dump(isValid("()[]{}"));
