<?php

class item_images extends Seeder {

    private $table = 'item_images';

    public function run() {
        //seed many records using faker
        $limit = 92;
        echo "seeding $limit item_images registers";

        for ($i = 62; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'id' => null,
                'image' => $this->faker->imageUrl(640, 480),
                'alt' => $this->faker->text(120), 
                'item_id' => $i
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
