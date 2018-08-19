<?php
namespace App\Libraries;
class Common
{
    /**
     * パスワード生成
     * @param $length 文字数
     * @return string パスワード
     */
    public  function createPassword($upper = true, $lower = true, $number = true, $symbol = true, $length = 8) {
        $pwd = [];
        $pwd_strings = [];
        if ($upper) {
            $pwd_strings['upper'] = range('A', 'Z');
        }
        if ($lower) {
            $pwd_strings['lower'] = range('a', 'z');
        }
        if ($number) {
            $pwd_strings['number'] = range('0', '9');
        }
        if ($symbol) {
            $pwd_strings['symbol'] = array_merge(range('!', '/'), range(':', '?'), range('{', '~'));
        }

        //logic
        while (count($pwd) < $length) {
            // 4種類必ず入れる
            if (count($pwd) < count($pwd_strings)) {
                $key = key($pwd_strings);
                next($pwd_strings);
            } else {
                // 後はランダムに取得
                $key = array_rand($pwd_strings);
            }
            $pwd[] = $pwd_strings[$key][array_rand($pwd_strings[$key])];
        }
        // 生成したパスワードの順番をランダムに並び替え
        shuffle($pwd);

        return implode($pwd);
    }
}
