<?php
require 'db/class.DB.php';
$DB = New DB();

// Models
require 'lib/class.Player.php';
require 'lib/class.Match.php';

// Init Models
$Player = New Player();
$Match = New Match();
?>