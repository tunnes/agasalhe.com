<?php

class items extends Seeder {

    private $table = 'items';

    public function run() {
         //seed many records using faker
        $limit = 29;
        echo "seeding $limit items registers";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'id' => null,
                'title' => $this->faker->title,
                'description' => $this->faker->text(120),
                'active' => $this->faker->boolean(50),
                'use_state' => $this->faker->randomElement(array ('NOVO','USADO','SEMI-NOVO')),
                'user_id' => $i+1
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
