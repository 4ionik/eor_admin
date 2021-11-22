<?php


namespace App\Helpers;


class MenuGenerationHelper
{
    public static function projChecker($perms, $name): bool
    {
        foreach ($perms as $i => $perm) {
            $temp = explode( '.', $perm->name);
            if (!strcmp($temp[0], $name)){
                return true;
            }
        }
        return false;
    }

    public static function wbChecker($perms, $name): bool
    {
        foreach ($perms as $perm) {
            $temp = explode( '.', $perm->name);
            if (count($temp) > 1 && !strcmp($temp[1], $name)){
                return true;
            }
        }
        return false;
    }
}