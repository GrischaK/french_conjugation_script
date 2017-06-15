<?php
require_once  'verbs.php';
class Auxiliaire extends Enum{
	const Avoir = 'avoir';
	const AvoirandEtre = 'avoir and être';		
	const Etre = 'être';
	
	function getInfinitiveString() {
		return $this->getValue();
	}
	
	static function getVerbsThatUse(Auxiliaire $auxiliaire) {
		$verbByAuxiliare = 
			[Auxiliaire::Etre => ['accourir','advenir','aller','apparaitre','apparaître','arriver','ascendre','co-naitre','co-naître','convenir',
				'débeller','démourir','descendre','disconvenir','devenir','échoir','entre-venir','emmourir','entrer','époustoufler','intervenir',
				'issir','mésadvenir','mésavenir','mévenir','monter','moquer','mourir','naitre','naître','obvenir','paraitre','paraître','partir',
				'parvenir','passer','pourir','pourrir','prémourir','provenir','ragaillardir','raller','réadvenir','re-aller','réapparaitre',
			    'réapparaître','reconvenir','redépartir','redevenir','réentrer','réintervenir','remourir','renaitre','renaître','rentrer','revenir',
			    'reparaitre','reparaître','repartir','reparvenir','repasser','ré-apparaître','réaccroupir','réacharner', 'redévergonder','réinsurger','remoquer','reprosterner','resouvenir','retrémousser','repourrir','rerentrer','rerester','ressortir','ressouvenir','rester','resurvenir','retomber','retrépasser','revenir','sortir',
				 'souvenir','stationner','sur-aller','suradvenir','survenir','tomber','trépasser','venir'],  // + all pronominal version of verbs	
			Auxiliaire::AvoirandEtre => ['accourir','ascendre','convenir','déchoir','demeurer','descendre','disparaitre','disparaître','disconvenir',
				'éclore','enclore','entrer ','monter','paraitre','paraître','passer','ragaillardir', 'ré-apparaître','réapparaître','reconvenir',
				'reparaitre','reparaître','sortir','tomber']];
		// $infinitiveVerb is not a simple array but an array of verrb for each start character so we have to flatten it first
		$flattenedListOfInvinitiveVerbs = call_user_func_array("array_merge", $infinitiveVerb);
		$verbByAuxiliaire[Auxiliaire::Avoir] = array_diff($flattenedListOfInfinitiveVerbs, 
								  array_merge($verbByAuxiliaire[Auxiliaire::Etre],
									     $verbByAuxiliaire[Auxiliaire::AvoirandEtre]));
		return $infinitiveVerb[$auxiliaire->getValue()];
	}
}
		// débeller,démourir, descendre,entrer, époustoufler, monter, obvenir, partir,pourir,pourrir,prémourir, ragaillardir,réapparaitre,réapparaître,rentrer,repartir,repasser,repourrir,ressortir,stationner, -> +passive
		// emmourir, moquer, passer,réaccroupir,réacharner,redévergonder,réinsurger,remoquer,reprosterner,retrémousser (+passiv+pronominal) // passer no passive for etre
		// mourir,redépartir,resouvenir,ressouvenir,sortir  +pronominal 
		// -> souvenir not active, but passive+pronominal tab should be active
?>
