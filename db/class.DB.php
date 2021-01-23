<?php
class DB extends SQLite3{
    
    public function __construct() {
        $this->open('db/main.db');
    }
    
}
?>