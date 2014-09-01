<?php

// namespace Bowling\TestingTesting;

class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    private $Game;

    protected function setUp() {
        $this->Game = new BowlingGame();
    }

    /**
     * @test
     */
    public function testForGetFive() {
        $this->assertEquals(5, $this->Game->getFive());
    }

    /**
     * @test
     */
    public function testGutterGame() {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->Game->score());
    }

    /**
     * @test
     */
    public function testAllOnes() {
        $this->rollMany(20,1);
        $this->assertEquals(20, $this->Game->score());
    }

    /**
     * @test
     */
    public function testOneSpare() {
        $this->rollSpare();
        $this->Game->roll(3);
        $this->rollMany(17,0);
        $this->assertEquals(16,$this->Game->score());
    }

    public function testOneStrike() {
        $this->rollStrike();
        $this->Game->roll(3);
        $this->Game->roll(4);
        $this->rollMany(16, 0);
        $this->assertEquals(24, $this->Game->score());
    }

    public function testPerfectGame() {
        $this->rollMany(12,10);
        $this->assertEquals(300, $this->Game->score());
    }

    private function rollStrike() {
        $this->Game->roll(10);
    }

    private function rollSpare() {
        $this->Game->roll(5);
        $this->Game->roll(5);
    }

    private function rollMany($num, $pins) {
        for ($i = 0; $i < $num; $i++) {
            $this->Game->roll($pins);
        }
    }
}
