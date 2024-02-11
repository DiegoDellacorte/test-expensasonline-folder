<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobros extends CI_Migration {
    public function up() 
    { 
        $fields = array( 
            'id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'unsigned' => TRUE, 
                'auto_increment' => TRUE 
            ), 
            'suscripcion__id' => array( 
                'type' => 'BIGINT', 
                'constraint' => 20, 
                'null' => FALSE 
            ),
            'estado' => array(
                'type' => 'SET',
                'constraint' => array('generado', 'enviado_a_cobrar', 'pagado'),
                'default' => 'generado'
            ), 
            'fecha' => array( 
                'type' => 'TIMESTAMP', 
                'null' => FALSE, 
                'default' => 'CURRENT_TIMESTAMP' 
            )         
        ); 
 
        $this->dbforge->add_field($fields); 
        $this->dbforge->add_key('id', TRUE); 
        $this->dbforge->create_table('cobros'); 
    } 
 
    public function down() 
    { 
        $this->dbforge->drop_table('cobros'); 
    } 
}
?>