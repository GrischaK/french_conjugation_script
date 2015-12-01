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
                'étant',
                'être'
            ],
            // oir
            [
                'ayant',
                'avoir'
            ],
            [
                'rayant',
                'ravoir'
            ],
            [
                'apercevant',
                'apercevoir'
            ],
            [
                'assoyant',
                'asseoir'
            ],
            [
                'assoyant',
                'assoir'
            ],
            [
                'fallant',
                'falloir'
            ],
            [
                'pleuvant',
                'pleuvoir'
            ],
            [
                'fleurissant / florissant',
                'fleurir'
            ],
            [
                'faillant',
                'faillir'
            ],
            [
                'voulant',
                'vouloir'
            ],
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
            ],
            [
                'faisant',
                'faire'
            ],
            [
                'brayant',
                'braire'
            ],
            [
                'plaisant',
                'plaire'
            ],
            [
                'taisant',
                'taire'
            ],
            [
                'vainquant',
                'vaincre'
            ],
            [
                'attendant',
                'attendre'
            ],
            [
                'prenant',
                'prendre'
            ],
            [
                'plaignant',
                'plaindre'
            ],
            [
                'joignant',
                'joindre'
            ],
            [
                'cousant',
                'coudre'
            ],
            [
                'moulant',
                'moudre'
            ],
            [
                'absolvant',
                'absoudre'
            ],
            [
                'résolvant',
                'résoudre'
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