<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscripciones extends CI_Migration {
    public function up() 
    { 
        $fields = array( 
            'id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE 
            ), 
            'cliente_id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'null' => FALSE 
            ), 
            'plan_id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'null' => FALSE 
            ), 
            'pago_id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'null' => FALSE 
            ), 
            'estado' => array( 
                'type' => 'BINARY', 
                'constraint' => 1, 
                'default' => 1 
            ), 
            'fecha' => array( 
                'type' => 'TIMESTAMP', 
                'null' => FALSE, 
                'default' => 'CURRENT_TIMESTAMP' 
            ) 
        ); 
 
        $this->dbforge->add_field($fields); 
        $this->dbforge->add_key('id', TRUE); 
        $this->dbforge->create_table('suscripciones'); 
    } 
 
    public function down() 
    { 
        $this->dbforge->drop_table('suscripciones'); 
    } 
}
?>