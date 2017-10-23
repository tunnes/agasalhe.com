<?php

class items extends Seeder {

    private $table = 'items';

    public function run() {
         //seed many records using faker
        $limit = 92;
        echo "seeding $limit items registers";

        for ($i = 62; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'id' => null,
                'title' => $this->faker->title,
                'description' => $this->faker->text(120),
                'active' => $this->faker->boolean(50),
                'use_state' => $this->faker->randomElement(array ('NOVO','USADO','SEMI-NOVO')),
                'category' => $this->faker->randomElement(array ('MOVEL','ELETRONICO','ELETRODOMESTICO','BRINQUEDO','ROUPA','UTENSILIO','FERRAMENTA','INSTRUMENTO')),
                'user_id' => $i
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
