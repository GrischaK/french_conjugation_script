<?php
class Auxiliaire extends Enum{
	const Avoir = 'avoir';
	const AvoirandEtre = 'avoir and être';		
	const Etre = 'être';
	
	function getInfinitiveString() {
		return $this->getValue();
	}
	
	static function getVerbsThatUse(Auxiliaire $auxiliaire) {
		$only_with_auxiliaire_avoir = ['acheter','aimer','balader','coudre','habiller','hérisser','manger'];
		$infinitiveVerb = 
		[Auxiliaire::Etre => ['accourir','advenir','aller','apparaitre','apparaître','arriver','ascendre','co-naitre','co-naître','convenir',
			'débeller','démourir','descendre','disconvenir','devenir','échoir','entre-venir','emmourir','entrer','époustoufler','intervenir',
			'issir','mésadvenir','mésavenir','mévenir','monter','moquer','mourir','naitre','naître','obvenir','paraitre','paraître','partir',
			'parvenir','passer','pourir','pourrir','prémourir','provenir','ragaillardir','raller','réadvenir','re-aller','réapparaitre',
		    'réapparaître','reconvenir','redépartir','redevenir','réentrer','réintervenir','remourir','renaitre','renaître','rentrer','revenir',
		    'reparaitre','reparaître','repartir','reparvenir','repasser','ré-apparaître','réaccroupir','réacharner', 'redévergonder','réinsurger','remoquer','reprosterner','resouvenir','retrémousser',
			'repourrir','rerentrer','rerester','ressortir','ressouvenir','rester','resurvenir','retomber','retrépasser','revenir','sortir',
			 'souvenir','stationner','sur-aller','suradvenir','survenir','tomber','trépasser','venir'],  // + all pronominal version of verbs	
		Auxiliaire::AvoirandEtre => ['accourir','ascendre','convenir','déchoir','demeurer','descendre','disparaitre','disparaître','disconvenir',
			'éclore','enclore','entrer ','monter','paraitre','paraître','passer','ragaillardir', 'ré-apparaître','réapparaître','reconvenir',
			'reparaitre','reparaître','sortir','tomber'],
		Auxiliaire::Avoir => $only_with_auxiliaire_avoir];	
		return $infinitiveVerb[$auxiliaire->getValue()];
	}
}
?>