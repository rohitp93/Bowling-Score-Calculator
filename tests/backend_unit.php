<?php

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__,2).'/api/Backend.php';

class BackendTest extends TestCase
{
    public function testSum()
    {
        $test = new Calculator;

        $score1 = '{"score":7,"frame":[7],"scoreTillFrame":[7]}';
        $frame1 = '[{"first": 3, "second": 4}]';
        $score1_d = json_decode($score1);
        $frame1_d = json_decode($frame1, true);

        $score2 = '{"score":7,"frame":[7],"scoreTillFrame":[7]}';
        $frame2 = '[{"first": 3, "second": 4}, {"first": 10, "second": 0}]';
        $score2_d = json_decode($score2);
        $frame2_d = json_decode($frame2, true);

        $score3 = '{"score":0,"frame":[],"scoreTillFrame":[]}';
        $frame3 = '[{"first": 10, "second": 0}, {"first": 10, "second": 0}]';
        $score3_d = json_decode($score3);
        $frame3_d = json_decode($frame3, true);

        $score4 = '{"score":30,"frame":[30],"scoreTillFrame":[30]}';
        $frame4 = '[{"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}]';
        $score4_d = json_decode($score4);
        $frame4_d = json_decode($frame4, true);

        $score5 = '{"score":300,"frame":[30,30,30,30,30,30,30,30,30,30],"scoreTillFrame":[30,60,90,120,150,180,210,240,270,300]}';
        $frame5 = '[{"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}, {"first": 10, "second": 0}]';
        $score5_d = json_decode($score5);
        $frame5_d = json_decode($frame5, true);

        $score6 = '{"score":16,"frame":[16],"scoreTillFrame":[16]}';
        $frame6 = '[{"first": 6, "second": 4}, {"first": 6, "second": 4}]';
        $score6_d = json_decode($score6);
        $frame6_d = json_decode($frame6, true);

        $this->assertEquals($score1_d,$test->MainLoop($frame1_d));
        $this->assertEquals($score2_d,$test->MainLoop($frame2_d));
        $this->assertEquals($score3_d,$test->MainLoop($frame3_d));
        $this->assertEquals($score4_d,$test->MainLoop($frame4_d));
        $this->assertEquals($score5_d,$test->MainLoop($frame5_d));
        $this->assertEquals($score6_d,$test->MainLoop($frame6_d));

    }

}
?>