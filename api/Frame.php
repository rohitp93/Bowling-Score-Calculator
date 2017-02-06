<?php

class Frame {

    function isStrike($i,$object_frames) {

        $score_perframe = 0;

            if ($i != sizeof($object_frames) - 1) {

                if ($object_frames[$i + 1]['first'] == 10) {
                    if (($i + 1) != sizeof($object_frames) - 1) {
                        $score_perframe = $object_frames[$i]['first'] + $object_frames[$i]['second'] + $object_frames[$i + 1]['first'] + ($object_frames[$i + 2]['first']);
                    } elseif (($i) == 8) {
                        $score_perframe = $object_frames[$i]['first'] + $object_frames[$i]['second'] + $object_frames[$i + 1]['first'] + ($object_frames[$i + 1]['second']);
                    }

                } else {
                    $score_perframe = $object_frames[$i]['first'] + $object_frames[$i]['second'] + ($object_frames[$i + 1]['first']) + ($object_frames[$i + 1]['second']);
                }
            }

        return $score_perframe;
    }

    function isSpare($i,$object_frames) {

        $score_perframe = 0;

            if ($i != (sizeof($object_frames) - 1)) {
                $score_perframe = $object_frames[$i]['first'] + $object_frames[$i]['second'] + ($object_frames[$i + 1]['first']);
            }

        return $score_perframe;
    }

    function isOpen($i,$object_frames) {

        $score_perframe = $object_frames[$i]['first'] + $object_frames[$i]['second'];
        return $score_perframe;

    }

    function lastFrame($object_frames) {

        $score_perframe = $object_frames[9]['first'] + $object_frames[9]['second'] + $object_frames[9]['third'];
        return $score_perframe;

    }

}

?>