<?php

namespace App\Helper;

class Helper
{
    public static function setCustomMsg($msg)
    {
        session([
            'custom-msg' => $msg
        ]);
    }

    public static function getCustomMsg()
    {
        $msg = session('custom-msg');

        session([
            'custom-msg' => []
        ]);

        if (!isset($msg) || count($msg) == 0)
            $msg = null;

        return $msg;
    }
}
