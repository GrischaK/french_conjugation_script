<link rel="stylesheet" type="text/css" media="screen" property="stylesheet" href="../../tabs.css" />
<?php
require_once 'classes/Auxiliaire.php';
require_once 'classes/InfinitiveVerb.php';
require_once 'groups/verbes_pronominaux.php';
require_once 'groups/verbes_exclusivement_pronominaux.php';
require_once 'groups/verbes_intransitifs.php';
require_once 'groups/verbes_transitifs.php';
require_once 'groups/irregular-verb-groups.php';
require_once 'groups/verbes_defectifs.php';
require_once 'groups/verbes_en_ancien.php';
require_once 'groups/verbes_impersonnels.php';
require_once 'groups/translation.php';
$func_array = [ 
		preg_grep ( "/.*er$/", $infinitiveVerb ),
		preg_grep ( "/.*[iï]r$/", $infinitiveVerb ),
		preg_grep ( "/.*re$/", $infinitiveVerb ),
		array_diff ( $infinitiveVerb, Auxiliaire::getVerbsThatUse ( new Auxiliaire ( Auxiliaire::Etre ) ) ),
		Auxiliaire::getVerbsThatUse ( new Auxiliaire ( Auxiliaire::Etre ) ),
		Auxiliaire::getVerbsThatUse ( new Auxiliaire ( Auxiliaire::AvoirandEtre ) ),
		$verbes_pronominaux,
		array_diff ( $infinitiveVerb, $verbes_pronominaux ),
		$verbes_exclusivement_pronominaux,
		$verbes_transitifs,
		$verbes_intransitifs,
		$verbes_en_ancien,
		$verbes_defectifs,
		$verbes_impersonnels,
		$cer,
		$ger,
		$eler_ele,
		$eler_elle,
		$eter_ete,
		$eter_ette,
		$yer_ie,
		$e_akut_er,
		$ecer,
		$eger,
		$eyer,
		$envoyer,
		$vouloir,
		$avoir_irr,
		$voir,
		$cevoir,
		$devoir,
		$mouvoir,
		$pleuvoir,
		$pouvoir,
		$savoir,
		$falloir,
		$seoir,
		$valoir,
		$haiir,
		$indre,
		$battre,
		$crire,
		$mettre,
		$prendre,
		$rompre,
		$etre_irr,
		$faire 
];
if ($_GET ["buchstabe"] == "kategorien") {
	$per_page = 200;
	$params = explode ( $char_split, $_GET ["verb"] );
	$num = 0;
	$start = 0;
	$page = 0;
	if (count ( $params ) > 1)
		$page = $params [1];
	$start = $page * $per_page;
	
	$h1 = "Unknown group name!!!";
	for($a = 0; $a < count ( $kategorien ); $a ++)
		if ($params [0] == $kategorien [$a]) {
			$array = $func_array [$a];
			$h1 = $titles [$a];
			break;
		}
	echo '<h1>Kategorie: ' . $h1 . '</h1>';
	echo '<table width="100%">';
	$array = array_chunk ( $array, 4 );
	foreach ( $array as $chunk ) {
		if ($num >= $start)
			echo '<tr>';
		foreach ( $chunk as $val ) {
			$num ++;
			if ($num <= $start)
				continue;
			if ($num > $start + $per_page)
				break;
			echo '<td><a class="franzoesisch" href="../../' . mb_substr ( $val, 0, 1, 'utf-8' ) . '/' . $val . '/">' . $val . '</a></td>';
		}
		if ($num > $start + $per_page)
			break;
		if ($num > $start)
			'</tr>';
	}
	echo '</table>';
	echo '<div id="prev_next">';
	if ($page > 0)
		echo '<a href="../' . $params [0] . $char_split . ($page - 1) . '/">&lt; Vorherige</a>';
	if ($num > $start + $per_page)
		echo '<a href="../' . $params [0] . $char_split . ($page + 1) . '/">Nächste &gt;</a>';
	echo '</div>';
} else {
	?>
<h1><?php echo $_GET['verb'];?></h1>
<?php
	translation ( $_GET ['verb'], $fr_de [$_GET ['verb']] );
	echo '<h2 class="home">Die Konjugation von ' . $_GET ['verb'] . '</h2>';
	$infinitiveVerb = new InfinitiveVerb ( $_GET ['verb'] );
	if (canBeConjugatedWith ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::AvoirandEtre ) )) {
		?>
<div class="tabbable boxed parentTabs">
	<ul class="nav nav-pills">
		<li class="active"><a href="#auxiliary1" data-toggle="tab"> Hilfsverb être</a></li>
		<li><a href="#auxiliary2" data-toggle="tab">Hilfsverb avoir</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="auxiliary1">
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#sentence-type11" data-toggle="tab">Aussagesatz</a></li>
					<li><a href="#sentence-type12" data-toggle="tab">Fragesatz</a></li>
					<li><a href="#sentence-type13" data-toggle="tab">Verneinung</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="sentence-type11">
						<div class="tabbable">
							<ul class="nav nav-tabs">
                        <?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
                        <li class="active"><a href="#etre-voice111" data-toggle="tab">aktiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_transitifs) && (!canBeConjugatedWith ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ) ))) { ?>
                        <li><a href="#etre-voice112" data-toggle="tab">passiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
                        <li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#etre-voice113" data-toggle="tab">reflexiv</a></li>
                        <?php } ?>							
                     </ul>
							<div class="tab-content">
							<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="etre-voice111">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1111" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1112" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1111">
											<?php
			$css_class = 'light_blue';
			require_once ("text.php");
			$category = '-etre-declarative-active-masculine';
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1112">
											<?php
			$css_class = 'ForestGreen';
			$category = '-etre-declarative-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs) && (!canBeConjugatedWith ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ) ))) { ?>
								<div class="tab-pane fade" id="etre-voice112">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1121" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1122" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1121">
											<?php
			$css_class = 'DarkOrange';
			$category = '-etre-declarative-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1122">
											<?php
			$css_class = 'DarkGoldenRod';
			$category = '-etre-declarative-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="etre-voice113">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1131" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1132" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1131">
											<?php
			$css_class = 'LightSlateGrey';
			$category = '-etre-declarative-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1132">
											<?php
			$css_class = 'LightSlateGrey';
			$category = '-etre-declarative-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="sentence-type12">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<li class="active"><a href="#etre-voice121" data-toggle="tab">aktiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<li><a href="#etre-voice122" data-toggle="tab">passiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#etre-voice123" data-toggle="tab">reflexiv</a></li>
								<?php } ?>						
							</ul>
							<div class="tab-content">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="etre-voice121">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1211" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1212" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1211">
											<?php
			$css_class = 'OliveDrab';
			$category = '-etre-interrogative-active-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1212">
											<?php
			$css_class = 'Olive';
			$category = '-etre-interrogative-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<div class="tab-pane fade" id="etre-voice122">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1221" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1222" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1221">
											<?php
			$css_class = 'Plum';
			$category = '-etre-interrogative-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1222">
											<?php
			$css_class = 'Pink';
			$category = '-etre-interrogative-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>	
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="etre-voice123">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1231" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1232" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1231">
											<?php
			$css_class = 'Cyan';
			$category = '-etre-interrogative-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1232">
											<?php
			$css_class = 'CornflowerBlue';
			$category = '-etre-interrogative-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="sentence-type13">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<li class="active"><a href="#etre-voice131" data-toggle="tab">aktiv</a></li>
								 <?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<li><a href="#etre-voice132" data-toggle="tab">passiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#etre-voice133" data-toggle="tab">reflexiv</a></li>
								<?php } ?>							
							</ul>
							<div class="tab-content">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="etre-voice131">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1311" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1312" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1311">
											<?php
			$css_class = 'Peru';
			$category = 'etre-negation-active-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1312">
											<?php
			$css_class = 'SandyBrown';
			$category = 'etre-negation-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
			?>							
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<div class="tab-pane fade" id="etre-voice132">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1321" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1322" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1321">
											<?php
			$css_class = 'Teal';
			$category = 'etre-negation-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1322">
											<?php
			$css_class = 'Turquoise';
			$category = 'etre-negation-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="etre-voice133">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#etre-voice-gender1331" data-toggle="tab">männlich</a></li>
											<li><a href="#etre-voice-gender1332" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="etre-voice-gender1331">
											<?php
			$css_class = 'MediumSeaGreen';
			$category = 'etre-negation-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="etre-voice-gender1332">
											<?php
			$css_class = 'MediumSpringGreen';
			$category = 'etre-negation-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="auxiliary2">
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#sentence-type21" data-toggle="tab">Aussagesatz</a></li>
					<li><a href="#sentence-type22" data-toggle="tab">Fragesatz</a></li>
					<li><a href="#sentence-type23" data-toggle="tab">Verneinung</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="sentence-type21">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<li class="active"><a href="#avoir-voice211" data-toggle="tab">aktiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<li><a href="#avoir-voice212" data-toggle="tab">passiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#avoir-voice213" data-toggle="tab">reflexiv</a></li>
								<?php } ?>	
							</ul>
							<div class="tab-content">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="avoir-voice211">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2111" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2112" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2111">
											<?php
			$css_class = 'light_blue';
			$category = '-avoir-declarative-active-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2112">
											<?php
			$css_class = 'DeepSkyBlue';
			$category = '-avoir-declarative-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<div class="tab-pane fade" id="avoir-voice212">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2121" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2122" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2121">
											<?php
			$css_class = 'DarkOrange';
			$category = '-avoir-declarative-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2122">
											<?php
			$css_class = 'DarkGoldenRod';
			$category = '-avoir-declarative-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="avoir-voice213">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2131" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2132" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2131">
											<?php
			$css_class = 'LightSlateGrey';
			$category = '-avoir-declarative-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2132">
											<?php
			$css_class = 'Silver';
			$category = '-avoir-declarative-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="sentence-type22">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<li class="active"><a href="#avoir-voice221" data-toggle="tab">aktiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<li><a href="#avoir-voice222" data-toggle="tab">passiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#avoir-voice223" data-toggle="tab">reflexiv</a></li>
								<?php } ?>							
							</ul>
							<div class="tab-content">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="avoir-voice121">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2211" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2212" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2211">
											<?php
			$css_class = 'OliveDrab';
			$category = '-avoir-interrogative-active-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2212">
											<?php
			$css_class = 'Olive';
			$category = '-avoir-interrogative-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<div class="tab-pane fade" id="avoir-voice222">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2221" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2222" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2221">
											<?php
			$css_class = 'Plum';
			$category = '-avoir-interrogative-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2222">
											<?php
			$css_class = 'Pink';
			$category = '-avoir-interrogative-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>	
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="avoir-voice223">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2231" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2232" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2231">
											<?php
			$css_class = 'Cyan';
			$category = '-avoir-interrogative-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2232">
											<?php
			$css_class = 'CornflowerBlue';
			$category = '-avoir-interrogative-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="sentence-type23">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<li class="active"><a href="#avoir-voice231" data-toggle="tab">aktiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<li><a href="#avoir-voice232" data-toggle="tab">passiv</a></li>
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#avoir-voice233" data-toggle="tab">reflexiv</a></li>
								<?php } ?>					
							</ul>
							<div class="tab-content">
								<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
								<div class="tab-pane fade active in" id="avoir-voice231">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2311" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2312" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2311">
											<?php
			$css_class = 'Peru';
			$category = 'avoir-negation-active-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2312">
											<?php
			$css_class = 'SandyBrown';
			$category = 'avoir-negation-active-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
			?>		
											</div>
										</div>
									</div>
								</div>
								<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
								<div class="tab-pane fade" id="avoir-voice232">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2321" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2322" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2321">
											<?php
			$css_class = 'Teal';
			$category = 'avoir-negation-passive-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2322">
											<?php
			$css_class = 'Turquoise';
			$category = 'avoir-negation-passive-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
										</div>
									</div>
								</div> 
								<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
								<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="avoir-voice233">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#avoir-voice-gender2331" data-toggle="tab">männlich</a></li>
											<li><a href="#avoir-voice-gender2332" data-toggle="tab">weiblich</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane fade active in" id="avoir-voice-gender2331">
											<?php
			$css_class = 'MediumSeaGreen';
			$category = 'avoir-negation-pronominal-masculine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
											<div class="tab-pane fade" id="avoir-voice-gender2332">
        								    <?php
			$css_class = 'MediumSpringGreen';
			$category = 'avoir-negation-pronominal-feminine';
			require_once ("text.php");
			print_explanatory_text ( $infinitiveVerb );
			print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
			?>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } else { if (canBeConjugatedWith ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ) )) { ?>
<div class="tabbable boxed parentTabs">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#sentence-type11" data-toggle="tab">Aussagesatz</a></li>
		<li><a href="#sentence-type12" data-toggle="tab">Fragesatz</a></li>
		<li><a href="#sentence-type13" data-toggle="tab">Verneinung</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-content">
			<div class="tab-pane fade active in" id="sentence-type11">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<li class="active"><a href="#voice111" data-toggle="tab">aktiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
						<li><a href="#voice112" data-toggle="tab">passiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#voice113" data-toggle="tab">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>					
						<div class="tab-pane fade active in" id="voice111">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1111" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1112" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1111">
									<?php
				$css_class = 'light_blue';
				$category = '-declarative-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1112">
									<?php
				$css_class = 'DeepSkyBlue';
				$category = '-declarative-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>						
						<div class="tab-pane fade" id="voice112">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1121" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1122" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1121">
									<?php
				$css_class = 'DarkOrange';
				$category = '-declarative-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>	
									</div>
									<div class="tab-pane fade" id="voice-gender1122">
									<?php
				$css_class = 'DarkGoldenRod';
				$category = '-declarative-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>	
									</div>
								</div>
							</div>
						</div>						
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="voice113">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1131" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1132" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1131">
									<?php
				$css_class = 'LightSlateGrey';
				$category = '-declarative-pronominal-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>							  
									</div>
									<div class="tab-pane fade" id="voice-gender1132">
									<?php
				$css_class = 'Silver';
				$category = '-declarative-pronominal-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>						
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="sentence-type12">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<li class="active"><a href="#voice121" data-toggle="tab">aktiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
                        <li><a href="#voice122" data-toggle="tab">passiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#voice123" data-toggle="tab">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>				
						<div class="tab-pane fade active in" id="voice121">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1211" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1212" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1211">
                                    <?php
				$css_class = 'OliveDrab';
				$category = '-interrogative-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1212">
                                    <?php
				$css_class = 'Olive';
				$category = '-interrogative-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>					
						<div class="tab-pane fade" id="voice122">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1221" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1222" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1221">
                                    <?php
				$css_class = 'Plum';
				$category = '-interrogative-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1222">
                                    <?php
				$css_class = 'Pink';
				$category = '-interrogative-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>					
						<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="voice123">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1231" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1232" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1231">
                                    <?php
				$css_class = 'Cyan';
				$category = '-interrogative-pronominal-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1232">
                                    <?php
				$css_class = 'CornflowerBlue';
				$category = '-interrogative-pronominal-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>						
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="sentence-type13">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<li class="active"><a href="#voice131" data-toggle="tab">aktiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
                        <li><a href="#voice132" data-toggle="tab">passiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#voice133" data-toggle="tab">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<div class="tab-pane fade active in" id="voice131">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1311" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1312" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1311">
									<?php
				$css_class = 'Peru';
				$category = '-negation-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1312">
									<?php
				$css_class = 'SandyBrown';
				$category = '-negation-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
						<div class="tab-pane fade" id="voice132">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1321" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1322" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1321">
									<?php
				$css_class = 'Teal';
				$category = '-negation-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1322">
									<?php
				$css_class = 'Turquoise';
				$category = '-negation-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Avoir ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="voice133">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1331" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1332" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1331">
									<?php
				$css_class = 'MediumSeaGreen';
				$category = '-negation-pronominal-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1332">
									<?php
				$css_class = 'MediumSpringGreen';
				$category = '-negation-pronominal-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } if (canBeConjugatedWith ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ) )) { ?>
<div class="tabbable boxed parentTabs">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#sentence-type11" data-toggle="tab">Aussagesatz</a></li>
		<li><a href="#sentence-type12" data-toggle="tab">Fragesatz</a></li>
		<li><a href="#sentence-type13" data-toggle="tab">Verneinung</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-content">
			<div class="tab-pane fade active in" id="sentence-type11">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<li class="active"><a href="#voice111" data-toggle="tab">aktiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
						<li><a href="#voice112">passiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#voice113">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
				<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>	
						<div class="tab-pane fade active in" id="voice111">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1111" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1112" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1111">
                                    <?php
				$css_class = 'light_blue';
				$category = '-declarative-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
                                   </div>
									<div class="tab-pane fade" id="voice-gender1112">
									<?php
				$css_class = 'DeepSkyBlue';
				$category = '-declarative-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
			<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>			
						<div class="tab-pane fade" id="voice112">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1121" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1122" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1121">
									<?php
				$css_class = 'DarkOrange';
				$category = '-declarative-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1122">
                                    <?php
				$css_class = 'DarkGoldenRod';
				$category = '-declarative-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>	
									</div>
								</div>
							</div>
						</div>
			<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>			
						<div class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in<?php } ?>" id="voice113">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1131" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1132" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1131">
									<?php
				$css_class = 'LightSlateGrey';
				$category = '-declarative-pronominal-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1132">
                                    <?php
				$css_class = 'Silver';
				$category = '-declarative-pronominal-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::DeclarativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
			<?php } ?>						
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="sentence-type12">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>					
						<li class="active"><a href="#voice121" data-toggle="tab">aktiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
                        <li><a href="#voice122" data-toggle="tab">passiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>class="active" <?php } ?>><a href="#voice123" data-toggle="tab">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<div class="tab-pane fade active in" id="voice121">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1211" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1212" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1211">
                                    <?php
				$css_class = 'OliveDrab';
				$category = '-interrogative-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1212">
                                    <?php
				$css_class = 'Olive';
				$category = '-interrogative-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
						<div class="tab-pane fade" id="voice122">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1221" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1222" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1221">
                                    <?php
				$css_class = 'Plum';
				$category = '-interrogative-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1222">
                                    <?php
				$css_class = 'Pink';
				$category = '-interrogative-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>	
						<div
							class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in <?php } ?>"
							id="voice123">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1231" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1232" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1231">
                                    <?php
				$css_class = 'Cyan';
				$category = '-interrogative-pronominal-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1232">
                                    <?php
				$css_class = 'CornflowerBlue';
				$category = '-interrogative-pronominal-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::InterrogativeSentence ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="sentence-type13">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<li class="active"><a href="#voice131" data-toggle="tab">aktiv</a></li>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
                        <li><a href="#voice132" data-toggle="tab">passiv</a></li>
                        <?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>
						<li <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?> class="active" <?php } ?>><a href="#voice133" data-toggle="tab">reflexiv</a></li>
						<?php } ?>
					</ul>
					<div class="tab-content">
						<?php if(!in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) { ?>
						<div class="tab-pane fade active in" id="voice131">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1311" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1312" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1311">
									<?php
				$css_class = 'Peru';
				$category = '-negation-active-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1312">
									<?php
				$css_class = 'SandyBrown';
				$category = '-negation-active-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Active ), new SentenceType ( SentenceType::Negation ) );
				?>  
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_transitifs)) { ?>
						<div class="tab-pane fade" id="voice132">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1321" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1322" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1321">
									<?php
				$css_class = 'Teal';
				$category = '-negation-passive-masculine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
									<div class="tab-pane fade" id="voice-gender1322">
									<?php
				$css_class = 'Turquoise';
				$category = '-negation-passive-feminine';
				require_once ("text.php");
				print_explanatory_text ( $infinitiveVerb );
				print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Passive ), new SentenceType ( SentenceType::Negation ) );
				?>
									</div>
								</div>
							</div>
						</div>
						<?php } if(in_array($infinitiveVerb, $verbes_pronominaux)) { ?>	
						<div
							class="tab-pane fade <?php if(in_array($infinitiveVerb, $verbes_exclusivement_pronominaux)) {?>active in <?php } ?>"
							id="voice133">
							<div class="tabbable">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#voice-gender1331" data-toggle="tab">männlich</a></li>
									<li><a href="#voice-gender1332" data-toggle="tab">weiblich</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade active in" id="voice-gender1331">
									<?php
				$css_class = 'MediumSeaGreen';
				$category = '-negation-pronominal-masculine';
									require_once ("text.php");
									print_explanatory_text ( $infinitiveVerb );
									print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Masculine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
									?>
									</div>
									<div class="tab-pane fade" id="voice-gender1332">
									<?php
									$css_class = 'MediumSpringGreens';
									$category = '-negation-pronominal-feminine';
									require_once ("text.php");
									print_explanatory_text ( $infinitiveVerb );
									print_conjugations_of_verb ( $infinitiveVerb, new Auxiliaire ( Auxiliaire::Etre ), new Gender ( Gender::Feminine ), new Voice ( Voice::Pronominal ), new SentenceType ( SentenceType::Negation ) );
									?>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		}
	} 
	?>
<div id="hidden_player"></div>
<?php } ?>
<script>
   $("ul.nav-tabs a").click(function (e) {
     e.preventDefault();
     $(this).tab('show');
   });
</script>