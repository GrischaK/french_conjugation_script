<?php
require_once '../conjugate.php';

class InfinitiveEndingTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider InfinitiveEndingTestProvider
     */
    public function testInfinitiveEnding($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals(new EndingWith($expectedResult), finding_infinitive_ending(new InfinitiveVerb($infinitiveVerb)));
    }

    public function InfinitiveEndingTestProvider()
    {
        return [
            [
                EndingWith::ER,
                'aimer'
            ],
            [
                EndingWith::IR,
                'finir'
            ],
            [
                EndingWith::I_TREMA_R,
                'haïr'
            ],
            [
                EndingWith::RE,
                'être'
            ],
            [
                EndingWith::RE,
                'plaire'
            ],           
            [
                EndingWith::OIR,
                'cevoir'
            ],
            [
                EndingWith::OIR,
                'devoir'
            ],
            [
                EndingWith::OIR,
                'choir'
            ],
            [
                EndingWith::OIR,
                'mouvoir'
            ]
        ];
    }
}

?>
