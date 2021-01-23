<?php
class Player{

    public $table = 'players';

    public function __construct(){}

    /**
     * get
     */
    public function get($id=null){
        global $DB;
        $where = ( $id!=null ) ? ' AND id='.intval($id) : '' ;
        $results = $DB->query('SELECT * FROM '.$this->table.' WHERE 1=1');

        $output = [];
        while ($row = $results->fetchArray()) {
            array_push( $output, [
                'id'        => $row['id'],
                'name'      => $row['name'],
                'lastname'  => $row['lastname'],
                'fullname'  => $row['name'].' '.$row['lastname'],
                'alias'     => $row['alias'],
                'classcolor'=> $row['classcolor'],
            ]);
        }

        return $output;
    }
    
    /**
     * get_with_matches
     */
    public function get_with_matches($id=null){
        global $DB;
        global $Match;
        $where = ( $id!=null ) ? ' AND id='.intval($id) : '' ;
        $results = $DB->query('SELECT * FROM '.$this->table.' WHERE 1=1');

        $output = [];
        while ($row = $results->fetchArray()) {

            $player_matches = $Match->get_match_user($row['id']);
            $player_match = $player_matches[0];

            array_push( $output, [
                'id'        => $row['id'],
                'name'      => $row['name'],
                'lastname'  => $row['lastname'],
                'fullname'  => $row['name'].' '.$row['lastname'],
                'alias'     => $row['alias'],
                'classcolor'=> $row['classcolor'],
                'match_data'=> $player_match,
            ]);
        }

        usort($output, function($a, $b) {
            return $a['match_data']['perc'] <=> $b['match_data']['perc'];
        });

        $output = array_reverse($output);

        return $output;
    }

    /**
     * add
     */
    public function add(){
        global $DB;
        global $_POST;
        $playerQ = $DB->query('INSERT INTO '.$this->table.' (name, lastname, alias, classcolor) VALUES ("'.$_POST['name'].'","'.$_POST['lastname'].'","'.strtoupper(substr($_POST['name'],0,1).substr($_POST['lastname'],0,1)).'","'.$_POST['classcolor'].'")');
        
        if ( $playerQ ){
            return true;
        }
    }

}
?>