<?php

namespace App\Services;

class Cube
{
    // 回転記号
    // 0:U, 1:D, 2:F, 3:B, 4:R, 5:L
    public function scramble()
    {
        // R, U, L, D, F, B
        $ret = array();
        $count = 0;
        while ($count < config('cube.roll.num')) {
            list($next_roll, $next_times) = $this->roll();
            // 前回と同じ回転方向なら無視する
            if (!empty($ret[$count - 1])) {
                if ($ret[$count - 1]['roll'] == $next_roll) {
                    continue;
                }
            }
            // 前々回と前回が向かい合う面の場合、前々回と同じ回転方向なら無視する
            if (!empty($ret[$count - 1]) && !empty($ret[$count - 2])) {
                if(floor($ret[$count - 2]['roll'] / 2) == floor($ret[$count - 1]['roll'] / 2)){
                    if ($ret[$count - 2]['roll'] == $next_roll) {
                        continue;
                    }
                }
            }
            $ret[$count]['roll'] = $next_roll;
            $ret[$count]['times'] = $next_times;
            $count = count($ret);
        }

        return $ret;
    }

    public function roll()
    {
        // 回転方向
        $roll = random_int(0, 5);
        // 回転回数
        $times = random_int(0, 2);
        return array($roll, $times);
    }

    public function scrambleToText($scramble) {
        $text = array();
        foreach($scramble as $data){
            $current_text = '';
            switch($data['roll']){
                case 0:
                    $current_text = 'U';
                    break;
                case 1:
                    $current_text = 'D';
                    break;
                case 2:
                    $current_text = 'F';
                    break;
                case 3:
                    $current_text = 'B';
                    break;
                case 4:
                    $current_text = 'R';
                    break;
                case 5:
                    $current_text = 'L';
                    break;
                default:
                    break;
            }

            if($data['times'] == 1){
                $current_text .= '2';
            }

            if($data['times'] == 2){
                $current_text .= "'";
            }
            array_push($text, $current_text);
        }
        return $text;
    }
}
