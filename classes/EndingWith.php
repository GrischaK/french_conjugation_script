<?php
class EndingWith extends Enum
{
    const ER = '-er';// included -uer + -üer + ier + -iller + -éer
    const IR = '-ir';
    const OIR = '-oir';// not ExceptionModel SEOIR !in_array($verb, $seoir)
    const I_TREMA_R = '-ïr';
    const RE = '-re';
}
?>