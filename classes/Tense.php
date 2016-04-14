<?php
class Tense extends Enum {
	// simple tenses
	const Present = 'present';
	const Imparfait = 'imparfait';
	const Passe = 'passe';
	const Futur = 'futur'; 		// (Futur I)

	// composite tenses
	const Passe_compose = 'passe_compose';
	const Plus_que_parfait = 'plus_que_parfait';
	const Passe_anterieur = 'passe_anterieur';
	const Futur_anterieur = 'futur_anterieur';	// (Futur II)
	const Futur_compose = 'futur_compose'; 	// (Futur proche)
	const Passe_recent = 'passe_recent'; 	// (Passé proche)
	
	const Premiere_Forme = 'premiere_Forme';
	const Deuxieme_Forme = 'deuxieme_Forme';
}
?>