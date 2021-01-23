    <!--
      Add Match Modal
    --->
    <div class="modal fade" id="addMatch" tabindex="-1">
      <div class="modal-dialog">
        <form id="addMatchForm" action="route.php" method="POST">
          <input type="hidden" name="model" value="match">
          <input type="hidden" name="action" value="add">
          <div class="modal-content">
            <div class="modal-body text-center">
              <h3>Chi ha vinto?</h3>
              <div class="winner-container pt-1 pb-3">
                <?php if ( count($players)>0 ) : ?>
                  <?php foreach ( $players AS $player_id => $player_data ) : ?>
                    <input type="radio" class="btn-check" name="winner" id="winner<?php echo $player_data['id']; ?>" value="<?php echo $player_data['id']; ?>" autocomplete="off" />
                    <label class="btn btn-lg btn-floating btn-<?php echo $player_data['classcolor']; ?>" for="winner<?php echo $player_data['id']; ?>"><h4 class="pt-2"><?php echo $player_data['alias']; ?></h4></label>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <h3>Chi ha perso?</h3>
              <div class="loser-container">
                <?php if ( count($players)>0 ) : ?>
                    <?php foreach ( $players AS $player_id => $player_data ) : ?>
                      <input type="radio" class="btn-check" name="looser" id="looser<?php echo $player_data['id']; ?>" value="<?php echo $player_data['id']; ?>" autocomplete="off" />
                      <label class="btn btn-lg btn-floating btn-<?php echo $player_data['classcolor']; ?>" for="looser<?php echo $player_data['id']; ?>"><h4 class="pt-2"><?php echo $player_data['alias']; ?></h4></label>
                    <?php endforeach; ?>
                  <?php endif; ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Annulla</button>
              <button type="button" class="btn btn-primary" id="SubmitMatchForm">Salva</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--
      Add Player Modal
    --->
    <div class="modal fade" id="addPlayer" tabindex="-1">
      <div class="modal-dialog">
        <form id="addPlayerForm" action="route.php" method="POST">
          <input type="hidden" name="model" value="player">
          <input type="hidden" name="action" value="add">
          <div class="modal-content">
            <div class="modal-body">
              <div class="container">
                <div class="row">
                    <div class="col-12 pb-2"><span>Inserisci i dati del giocatore</span></div>
                </div>
                <div class="row">
                  <div class="col-12 p-2">
                    <div class="form-outline">
                      <input type="text" id="name" name="name" class="form-control form-control-lg" />
                      <label class="form-label" for="name">Nome</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 p-2">
                    <div class="form-outline">
                      <input type="text" id="lastname" name="lastname" class="form-control form-control-lg" />
                      <label class="form-label" for="lastname">Cognome</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12 pb-2"><span>Scegli il colore del tuo giocatore</span></div>
                </div>
                <div class="row">
                  <div class="col-12 p-2 text-center">
                    <?php 
                    $colorclasses = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                    foreach ( $colorclasses AS $color ) : ?>
                      <input type="radio" class="btn-check" name="classcolor" id="looser<?php echo $color; ?>" value="<?php echo $color; ?>" autocomplete="off" />
                      <label class="btn btn-lg btn-floating btn-<?php echo $color; ?>" for="looser<?php echo $color; ?>">&nbsp;</label>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Annulla</button>
              <button type="button" class="btn btn-primary" id="SubmitPlayerForm">Salva</button>
            </div>
          </div>
        </form>
      </div>
    </div>