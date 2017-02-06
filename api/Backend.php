<?php

require dirname(__FILE__).'/Frame.php';

class Calculator {

    function MainLoop($object) {

        $frame_func = new Frame;
        $total_score = 0;

        $result = new stdClass();
        $frame = [];
        $scoreTillFrame = [];

        foreach($object as $key=>$value) {

            if (isset($value['third'])) {
                $score_perframe = $frame_func->lastFrame($object);
                $total_score = $total_score + $score_perframe;
            }

            else {

                if ($value['first'] + $value['second'] < 10) {
                    $score_perframe = $frame_func->isOpen($key,$object);
                    $total_score = $total_score + $score_perframe;
                }

                elseif ($value['first'] == 10) {
                    $score_perframe = $frame_func->isStrike($key,$object);
                    $total_score = $total_score + $score_perframe;
                }

                else {
                    $score_perframe = $frame_func->isSpare($key,$object);
                    $total_score = $total_score + $score_perframe;
                }

            }

            if (!($score_perframe == 0 && ($value['first'] + $value['second']) == 10)) {
                array_push($frame, $score_perframe);
                array_push($scoreTillFrame, $total_score);
            }

        }

        $result->score = $total_score;
        $result->frame = $frame;
        $result->scoreTillFrame = $scoreTillFrame;

        return $result;

    }
}


?>