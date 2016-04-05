<?php
class Auxiliaire extends Enum{
	const Avoir = 'avoir';
	const AvoirandEtre = 'avoir and être';		
	const Etre = 'être';
	
	function getInfinitiveString() {
		return $this->getValue();
	}
	
	static function getVerbsThatUse(Auxiliaire $auxiliaire) {
		$infinitiveVerb = [Auxiliaire::Etre => ['accourir','advenir','aller','amuser','apparaitre','apparaître','arriver','ascendre','co-naitre','co-naître','convenir',
			'débeller','décéder','démourir','descendre','disconvenir','devenir','échoir','entre-venir','entrer','époustoufler','intervenir',
			'issir','mévenir','monter','mourir','naitre','naître','obvenir','paraitre','paraître','partir','parvenir','pourrir','prémourir',
			'provenir','ragaillardir','raller','réadvenir','re-aller','réapparaitre','réapparaître','reconvenir','redépartir','redescendre',
			'redevenir','réentrer','réintervenir','remonter','remourir','renaitre','renaître','rentrer','revenir','reparaitre','reparaître',
			'repartir','reparvenir','repasser','repourrir','rerentrer','rerester','ressortir','ressouvenir','rester','resurvenir','retomber',
			'retourner','retrépasser','revenir','s’amuser','se redépartir','se sortir','se souvenir','sortir','souvenir','stationner','sur-aller'
			,'suradvenir','survenir','tomber','trépasser','venir'], 	
		Auxiliaire::AvoirandEtre => ['accourir','ascendre','convenir','déchoir','demeurer','descendre','disparaitre','disparaître','disconvenir',
			'éclore','enclore','entrer ','monter','paraitre','paraître','passer','ragaillardir', 'ré-apparaître','réapparaître','reconvenir',
			'reparaitre','reparaître','sortir','tomber'],
		Auxiliaire::Avoir => ['acheter']];	
		return $infinitiveVerb[$auxiliaire->getValue()];
	}
}
?>
