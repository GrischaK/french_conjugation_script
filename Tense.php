<?php
class Tense extends Enum {
	// simple tenses
	const Present = 0;
	const Imparfait = 1;
	const Passe = 2;
	const Futur = 3; 		// (Futur I)

	// composite tenses
	const Passe_compose = 4;
	const Plus_que_parfait = 5;
	const Passe_anterieur = 6;
	const Futur_anterieur = 7;	// (Futur II)
	const Futur_compose = 8; 	// (Futur proche)

	const Premiere_Forme = 9;
	const Deuxieme_Forme = 10;
}
?>