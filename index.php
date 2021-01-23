<?php
require 'bootstrap.php';
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>MatchTracker</title>
    <?php require 'partials/head.php'; ?>
  </head>
  <body>

    <?php require 'partials/header.php'; ?>

    <div class="container-fluid">
      <?php
      $players = $Player->get_with_matches();
      if ( count($players)>0 ) : ?>
        <?php foreach ( $players AS $player_id => $player_data ) : ?>
          <?php
          // $player_matches = $Match->get_match_user($player_data['id']);
          // $player_match = $player_matches[0];
          $player_match = $player_data['match_data'];
          ?>
          <div class="row p-3">
              <div class="col-12">
                <h2 class="name"><?php echo $player_data['fullname']; ?></h2>
                <div class="progress rounded-pill" style="height: 30px">
                  <div class="progress-bar rounded-pill <?php echo ($player_data['classcolor']=='') ? '' : 'bg-'.$player_data['classcolor']; ?>" role="progressbar" style="width: <?php echo $player_match['perc']; ?>%" aria-valuenow="<?php echo $player_match['win']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $player_match['total']; ?>"><?php echo $player_match['win']; ?>/<?php echo $player_match['total']; ?></div>
                </div>
              </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <?php require 'partials/nav.php'; ?>
    <?php require 'partials/modal.php'; ?>
  
  </body>

  <!-- MDB -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('#SubmitMatchForm').bind('click', function (){
      $('#addMatchForm').submit();
    });
    $('#SubmitPlayerForm').bind('click', function (){
      $('#addPlayerForm').submit();
    });
  });
  </script>
</html>
<?php $DB->close(); ?>