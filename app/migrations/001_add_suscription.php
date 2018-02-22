<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_suscription extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'BIGINT',
                                'auto_increment' => TRUE
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'id_campaign' => array(
                                'type' => 'INT',
                        ),
                        'description' => array(
                                'type' => 'VARCHAR',
                                'null' => TRUE,
                                'constraint' => '500',
                        ),
                        'date' => array(
                                'type' => 'DATETIME',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('suscription');
        }

        public function down()
        {
                $this->dbforge->drop_table('suscription');
        }
}