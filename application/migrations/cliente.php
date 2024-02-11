<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Migration {
    public function up() 
    { 
        $fields = array( 
            'id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE 
            ), 
            'name' => array( 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => FALSE 
            ), 
            'email' => array( 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => FALSE 
            )
        ); 
 
        $this->dbforge->add_field($fields); 
        $this->dbforge->add_key('id', TRUE); 
        $this->dbforge->create_table('cliente'); 
    } 
 
    public function down() 
    { 
        $this->dbforge->drop_table('cliente'); 
    } 
}
?>