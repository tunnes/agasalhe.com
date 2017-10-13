<?php

class users extends Seeder {

    private $table = 'users';

    public function run() {
        //seed many records using faker
        $limit = 30;
        echo "seeding $limit user registers";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'id' => null,
                'username' => $this->faker->name,
                'profile_image' => $this->faker->imageUrl(640, 480),
                'cep' => $this->faker->randomNumber(8, false),
                'about_me' => $this->faker->text(120),
                'email' => $this->faker->email,
                'firebase_id' => $this->faker->randomLetter
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
    
    
}
