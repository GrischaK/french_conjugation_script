<?php
require_once '../conjugate.php';

class ParticipePresentTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ParticipePresentTestProvider
     */
    public function testParticipePresent($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_present(new InfinitiveVerb($infinitiveVerb)));
    }

    public function ParticipePresentTestProvider()
    {
        return [
            [
                'aimant',
                'aimer'
            ],
            [
                'finissant',
                'finir'
            ],
            [
                'haïssant',
                'haïr'
            ],
            [
                'allant',
                'aller'
            ],
            [
                'ayant',
                'avoir'
            ],
            [
                'rayant',
                'ravoir'
            ],
            [
                'étant',
                'être'
            ],
            // oir
            [
                'devant',
                'devoir'
            ],
            [
                'mouvant',
                'mouvoir'
            ],
            [
                'pouvant',
                'pouvoir'
            ],
            [
                'savant',
                'savoir'
            ],
            // rir
            [
                'acquérant',
                'acquérir'
            ],
            [
                'courant',
                'courir'
            ],
            [
                'mourant',
                'mourir'
            ],
            [
                'fuyant',
                'fuir'
            ],
            [
                'valant',
                'valoir'
            ],
            [
                'voyant',
                'voir'
            ],
            [
                'vêtant',
                'vêtir'
            ]
        ];
    }

    /**
     * @dataProvider UnregularParticipePresentTestProvider
     */
    public function testUnregularParticipePresent($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_present(new InfinitiveVerb($infinitiveVerb)));
    }

    public function UnregularParticipePresentTestProvider()
    {
        return [
            [
                'mangeant',
                'manger'
            ],
            [
                'agaçant',
                'agacer'
            ],
            [
                'acquiesçant',
                'acquiescer'
            ]
        ];
    }
}
?>