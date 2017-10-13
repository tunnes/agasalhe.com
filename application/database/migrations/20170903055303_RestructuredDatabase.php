<?php

class Migration_RestructuredDatabase extends CI_Migration {

    public function up() {
        
        $this->db->query('alter table users add column nickname varchar(50) not null after username');
        
        
        /*$this->db->query('drop table logins');
        $this->db->query('drop table item_users');
        
        $this->db->query('alter table item_images drop foreign key `item_images_ibfk_1`');
        $this->db->query('alter table item_images drop column user_id');
        $this->db->query('alter table item_images add column alt varchar(80), add column item_id int(10) unsigned not null');
        
        
        $this->db->query('drop table users');
        
        # Create table users again
        $this->dbforge->add_field("`id` int(10) unsigned auto_increment primary key");
		$this->dbforge->add_field("`username` varchar(80) NOT NULL ");
		$this->dbforge->add_field("`profile_image` mediumblob NULL ");
		$this->dbforge->add_field("`cep` char(8) NULL ");
		$this->dbforge->add_field("`about_me` varchar(250) NULL ");
		$this->dbforge->add_field("`email` varchar(80) NOT NULL ");
		$this->dbforge->add_field("`firebase_id` varchar(200) NOT NULL ");
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = InnoDB');
        
        $this->db->query("alter table items 
            add column use_state enum('NOVO', 'USADO', 'SEMI-NOVO'),
            add column user_id int(10) unsigned not null"); 
        $this->db->query("alter table items add foreign key (user_id) references users(id)");
        
       
        # Create table wishes
        $this->dbforge->add_field('user_id int(10) unsigned not null');
        $this->dbforge->add_field('item_id int(10) unsigned not null');
        $this->dbforge->create_table("wishes", TRUE);
		$this->db->query('alter table wishes add primary key(user_id, item_id)');
	    $this->db->query("alter table wishes add foreign key user_key(user_id) references users(id)");
		$this->db->query("alter table wishes add foreign key item_key(item_id) references items(id)");
		
		# Create table likes
        $this->dbforge->add_field('user_id int(10) unsigned not null');
        $this->dbforge->add_field('item_id int(10) unsigned not null');
        $this->dbforge->create_table("likes", TRUE);
		$this->db->query('alter table likes add primary key(user_id, item_id)');
	    $this->db->query("alter table likes add foreign key user_key(user_id) references users(id)");
		$this->db->query("alter table likes add foreign key item_key(item_id) references items(id)");
		
		# Create table trades
		$this->dbforge->add_field('user_id int(10) unsigned not null');
        $this->dbforge->add_field('item_id int(10) unsigned not null');
        $this->dbforge->add_field('created datetime');
        $this->dbforge->create_table("trades", TRUE);
		$this->db->query('alter table trades add primary key(user_id, item_id)');
	    $this->db->query("alter table trades add foreign key user_key(user_id) references users(id)");
		$this->db->query("alter table trades add foreign key item_key(item_id) references items(id)");
		
		$this->db->query('alter table item_images add foreign key (item_id) references items(id)');*/
	
       
    }

    public function down() {
       
    }

}