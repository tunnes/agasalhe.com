<?php

class Migration_trades extends CI_Migration {

    public function up() {
        
        $this->db->query('drop table trades');
        
        # Re create table trades
        $this->dbforge->add_field('item_theirs int(10) unsigned not null');
        $this->dbforge->add_field('item_yours int(10) unsigned not null');
        $this->dbforge->add_field('created datetime');
        $this->dbforge->add_field('done boolean not null');
        $this->dbforge->create_table("trades", TRUE);
		$this->db->query('alter table trades add primary key (item_theirs, item_yours)');
	    $this->db->query("alter table trades add constraint fk_item_theirs foreign key(item_theirs) references items(id)");
		$this->db->query("alter table trades add constraint fk_item_yours foreign key(item_yours) references items(id)");
		$this->db->query('alter table  `trades` ENGINE = InnoDB');
    }

    public function down() {}

}