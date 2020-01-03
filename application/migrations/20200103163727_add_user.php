<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nome' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'created_date' => array(
                                'type' => 'TIMESTAMP',
                                'current_timestamp' => 'TRUE',
                        ),
                        'senha' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                ));
                $this->dbforge->add_key('user_id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}
