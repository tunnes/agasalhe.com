<?php

class Migration_CreateDatabase extends CI_Migration {

    public function up() {
		## Create Table item_images
		$this->dbforge->add_field("id int(10) primary key auto_increment");
		$this->dbforge->add_field("`user_id` int(10) unsigned NOT NULL ");
		$this->dbforge->add_field("`image` mediumblob NOT NULL ");
		$this->dbforge->create_table("item_images", TRUE);
		$this->db->query('ALTER TABLE  `item_images` ENGINE = InnoDB');
		
		## Create Table item_users
		$this->dbforge->add_field("`user_id` int(10) unsigned  NOT NULL ");
		$this->dbforge->add_field("`item_id` int(10) unsigned NOT NULL ");
		$this->dbforge->add_field("`created` datetime NULL ");
		$this->dbforge->create_table("item_users", TRUE);
		$this->db->query('ALTER TABLE  `item_users` ENGINE = InnoDB');
		
		## Create Table items
		$this->dbforge->add_field("`id` int(10) unsigned primary key auto_increment");
		$this->dbforge->add_field("`title` varchar(80) NOT NULL ");
		$this->dbforge->add_field("`description` varchar(500) NULL ");
		$this->dbforge->add_field("`active` tinyint(1) NULL ");
		$this->dbforge->create_table("items", TRUE);
		$this->db->query('ALTER TABLE  `items` ENGINE = InnoDB');
		
		## Create Table logins
		$this->dbforge->add_field("`firebase_id` varchar(200) not null ");
		$this->dbforge->add_field("`user_id` int(10) unsigned not null ");
		$this->dbforge->add_field("`jwt` varchar(200) NULL ");
		$this->dbforge->add_field("`email` varchar(200) NULL ");
		$this->dbforge->create_table("logins", TRUE);
		$this->db->query('ALTER TABLE  `logins` ENGINE = InnoDB');
		
		## Create Table users
		$this->dbforge->add_field("`id` int(10) unsigned auto_increment primary key");
		$this->dbforge->add_field("`username` varchar(80) NOT NULL ");
		$this->dbforge->add_field("`profile_image` mediumblob NULL ");
		$this->dbforge->add_field("`cep` char(8) NULL ");
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = InnoDB');
		
		## Primary key
		$this->db->query('alter table item_users add primary key(user_id, item_id);');
		$this->db->query('alter table logins add primary key(firebase_id, user_id);');
		
		## Foreign Keys
		$this->db->query("alter table item_images add foreign key user_key(user_id) references users(id);");
		$this->db->query("alter table logins add foreign key user_key(user_id) references users(id);");
		$this->db->query("alter table item_users add foreign key user_key(user_id) references users(id);");
		$this->db->query("alter table item_users add foreign key item_key(item_id) references items(id);");
    }

    public function down() {
       if ($this->dbforge->drop_database('db_desapeguei')) {
          echo 'Database deleted.';
       }
    }

}