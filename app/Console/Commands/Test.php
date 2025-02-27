<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ct:test';

    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scrambles = [
            "F' L F2 R2 U L2 U' R2 F2 U' L2 D B2 R' U' F2 D U' R F' R",
            "R L2 D2 F R D B2 L' F' L2 U2 F2 L' B2 U2 R F2 R U2 R'",
            "F' U' L2 D' L F B' R' D2 L F' D2 F2 B' L2 B2 R2 B' U2 F2",
            "R2 F R2 F U2 F' R2 U2 B' D2 L D' L' U' L B U B R",
            "D' R2 B2 R2 D2 R2 F2 D R2 B' R F2 U2 B D U2 B2 L D'",
            "D' F2 U' B2 R2 D2 B2 U' R2 F' D2 L R' D' F2 L' U R",
            "U D' L B' U' L2 B2 U' F R2 B2 R' B2 R U2 B2 L2 B2 R L2 B2",
            "R B2 L' B2 D L F2 D2 R2 F L2 B2 D2 B' D2 B' R2 L2 U B2",
            "F2 R' U2 L' B2 R2 D2 U2 F2 R B2 F' U' R B D' U R B' D"
        ];
        $types = array('R', 'U', 'L', 'D', 'F', 'B');

        foreach($scrambles as $scramble) {
            $sum = 0;
            $scramble_array = explode(' ', $scramble);
            foreach ($scramble_array as $roll) {
                $num = 1;
                if (strpos($roll, '2') !== false) {
                    $num = 2;
                }
                $sum += $num;
            }
            echo $sum . " : " . $scramble . "\n";
        }

    }
}
