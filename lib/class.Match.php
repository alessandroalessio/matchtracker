<?php
class Match{

    public $table = 'matches';

    public function __construct(){}

    /**
     * get_match_user
     */
    public function get_match_user($id_user){
        global $DB;
        $results = $DB->query('SELECT id_user, SUM(win) AS win, COUNT(win) AS total FROM '.$this->table.' WHERE id_user='.$id_user);

        $output = [];
        while ($row = $results->fetchArray()) {
            array_push( $output, [
                'id_user'   => $row['id_user'],
                'win'       => $row['win'],
                'total'     => $row['total'],
                'perc'      => ($row['win']>0) ? (100*$row['win'])/$row['total'] : '0',
            ]);
        }

        return $output;
    }

    /**
     * add
     */
    public function add(){
        global $DB;
        global $_POST;
        $date = time();
        $winnerQ = $DB->query('INSERT INTO '.$this->table.' (id_user, win, date) VALUES ('.intval($_POST['winner']).',1,'.$date.')');
        $looserQ = $DB->query('INSERT INTO '.$this->table.' (id_user, win, date) VALUES ('.intval($_POST['looser']).',0,'.$date.')');
        
        if ( $winnerQ && $looserQ ){
            return true;
        }
    }

}
?>