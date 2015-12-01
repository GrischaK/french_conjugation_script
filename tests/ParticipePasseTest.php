<?php
require_once '../conjugate.php';

class ParticipePasseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider ParticipePasseTestProvider
     */
    public function testParticipePasse($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_passe(new InfinitiveVerb($infinitiveVerb)));
    }

    public function ParticipePasseTestProvider()
    {
        return [
            [
                'aimé',
                'aimer'
            ],
            [
                'fini',
                'finir'
            ],
            [
                'haï',
                'haïr'
            ]
        ];
    }

    /**
     * @dataProvider UnregularParticipePasseTestProvider
     */
    public function testUnregularParticipePasse($expectedResult, $infinitiveVerb)
    {
        $this->assertEquals($expectedResult, finding_participe_passe(new InfinitiveVerb($infinitiveVerb)));
    }

    public function UnregularParticipePasseTestProvider()
    {
        return [
            [
                'mangé',
                'manger'
            ],
            [
                'eu',
                'avoir'
            ],
            [
                'reu',
                'ravoir'
            ],
            [
                'été',
                'être'
            ],
            
            [
                'agacé',
                'agacer'
            ],
            [
                'dû',
                'devoir'
            ],
            [
                'mû',
                'mouvoir'
            ],
            [
                'autopromû',
                'autopromouvoir'
            ],
            [
                'pu',
                'pouvoir'
            ],
            [
                'aperçu',
                'apercevoir'
            ],
            [
                'redu',
                'redevoir'
            ],
            [
                'dû',
                'devoir'
            ],
            [
                'vu',
                'voir'
            ],
            [
                'pourvu',
                'pourvoir'
            ],
            [
                'prévu',
                'prévoir'
            ],
            [
                'valu',
                'valoir'
            ],
            [
                'chu',
                'choir'
            ],
            [
                'assis',
                'asseoir'
            ],
            [
                'assis',
                'assoir'
            ],
            [
                'fallu',
                'falloir'
            ],
            [
                'plu',
                'pleuvoir'
            ],
            [
                'fleuri',
                'fleurir'
            ],
            [
                'failli',
                'faillir'
            ],
            [
                'voulu',
                'vouloir'
            ],
            [
                'fui',
                'fuir'
            ],
            [
                'tenu',
                'tenir'
            ],
            [
                'sailli',
                'saillir'
            ],
            [
                'bouilli',
                'bouillir'
            ],
            [
                'su',
                'savoir'
            ],
            [
                'resu',
                'resavoir'
            ],
            [
                'couvert',
                'couvrir'
            ],
            [
                'couru',
                'courir'
            ],
            [
                'mort',
                'mourir'
            ],
            [
                'remort',
                'remourir'
            ],
            [
                'acquis',
                'acquérir'
            ],
            [
                'vêtu',
                'vêtir'
            ],
            [
                'fait',
                'faire'
            ],
            [
                'brait',
                'braire'
            ],
            [
                'plu',
                'plaire'
            ],
            [
                'tu',
                'taire'
            ],
            [
                'vaincu',
                'vaincre'
            ],
            [
                'attendu',
                'attendre'
            ],
            [
                'pris',
                'prendre'
            ],
            [
                'plaint',
                'plaindre'
            ],
            [
                'joint',
                'joindre'
            ],
            [
                'cousu',
                'coudre'
            ],
            [
                'moulu',
                'moudre'
            ],
            [
                'absous',
                'absoudre'
            ],
            [
                'résolu',
                'résoudre'
            ]
        ];
    }
}
?>