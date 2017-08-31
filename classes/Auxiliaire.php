<?php
			
class Auxiliaire extends Enum{
	const Avoir = 'avoir';
	const AvoirandEtre = 'avoir and être';		
	const Etre = 'être';
	
	function getInfinitiveString() {
		return $this->getValue();
	}
	
	static function getVerbsThatUse(Auxiliaire $auxiliaire) {
	include  'verbs.php';				
		$verbByAuxiliaire = 
			[Auxiliaire::Etre => ['advenir','aller','allier','allier','arriver','arroger','co-naitre','co-naître','devenir','débeller','décéder','démourir','emmourir','entre-venir','entrer','échoir','époustoufler','intervenir','issir','moquer','mourir','mésadvenir','mésavenir','mévenir','naitre','naître','obvenir','partir','parvenir','provenir','prémourir','raller','re-aller','redevenir','redépartir','redévergonder','remoquer','remourir','renaitre','renaître','rentrer','reparaitre','reparaître','repartir','reparvenir','repasser','repourrir','reprosterner','rerentrer','rerester','resouvenir','ressortir','ressouvenir','rester','resurvenir','retomber','retrémousser','retrépasser','revenir','réaccroupir','réacharner','réadvenir','réentrer','réinsurger','réintervenir','souvenir','stationner','sur-aller','suradvenir','survenir','trépasser','venir','méchoir','revorcher','s’emmourir','se moquer','se mourir','se réaccroupir','se réacharner','se redépartir','se redévergonder','se réinsurger','se remoquer','se reprosterner','se resouvenir','se ressouvenir','se retrémousser','se souvenir'],  // + all pronominal version of verbs	
			Auxiliaire::AvoirandEtre => ['accourir','alunir','amerrir','apparaitre','apparaître','ascendre','atterrir','changer','convenir','crever','croupir','demeurer','descendre','disconvenir','disparaitre','disparaître','divorcer','déchoir','décroître','dégeler','dégénérer','déménager','embellir','enclore','grandir','grossir','maigrir','monter','paraitre','paraître','passer','pourir','pourrir','ragaillardir','rajeunir','reconvenir','redescendre','reparaitre','reparaître','ré-apparaître','réapparaitre','réapparaître','sortir','se sortir','tomber','viellir','éclore']];
		$verbByAuxiliaire[Auxiliaire::Avoir] = array_diff($infinitiveVerb, 
								  array_merge($verbByAuxiliaire[Auxiliaire::Etre],
									     $verbByAuxiliaire[Auxiliaire::AvoirandEtre]));
		return $verbByAuxiliaire[$auxiliaire->getValue()];
	}
}
		// débeller,démourir, descendre,entrer, époustoufler, monter, obvenir, partir,pourir,pourrir,prémourir, ragaillardir,réapparaitre,réapparaître,rentrer,repartir,repasser,repourrir,ressortir,stationner, -> +passive
		// emmourir, moquer, passer,réaccroupir,réacharner,redévergonder,réinsurger,remoquer,reprosterner,retrémousser (+passiv+pronominal) // passer no passive for etre
		// mourir,redépartir,resouvenir,ressouvenir,sortir  +pronominal 
		// -> souvenir not active, but passive+pronominal tab should be active
?>