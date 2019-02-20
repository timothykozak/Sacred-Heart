<?php
// This script is used by the parish website to send e-mail.
// See SubmitForm.php for how to use.
// Problem if the from is malformed, so just embed it in the message
$totalmessage = 'From: ' . $_GET['from'] . "\n\n" . $_GET['themessage'];
mail('timothykozak@yahoo.com', $_GET['thesubject'], $totalmessage, 'From: ParishWebsite');
mail('tkozak@diosteub.org', $_GET['thesubject'], $totalmessage, 'From: ParishWebsite');
mail('wserbonich@athenscatholic.org', $_GET['thesubject'], $totalmessage, 'From: ParishWebsite');
mail($_GET['to'], $_GET['thesubject'], $totalmessage, 'From: ParishWebsite');
header("Location: " . $_GET['redirect']);
?>
