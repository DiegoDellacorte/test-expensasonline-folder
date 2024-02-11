<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planes extends CI_Migration {
    public function up() 
    { 
        $fields = array( 
            'id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE 
            ), 
            'costo' => array( 
                'type' => 'INT', 
                'constraint' => 11, 
                'null' => FALSE 
            ), 
            'name' => array( 
                'type' => 'VARCHAR', 
                'constraint' => 50, 
                'null' => FALSE 
            )            
        ); 
 
        $this->dbforge->add_field($fields); 
        $this->dbforge->add_key('id', TRUE); 
        $this->dbforge->create_table('planes');

        $data = array(
            array(
                'costo' => 10000,
                'name' => 'Básico'
            ),
            array(
                'costo' => 25000,
                'name' => 'Pro'
            ),
            array(
                'costo' => 70000,
                'name' => 'Empresas'
            )
        );
        $this->db->insert('planes', $data);
    } 
 
    public function down() 
    { 
        $this->dbforge->drop_table('planes'); 
    } 
}
?>