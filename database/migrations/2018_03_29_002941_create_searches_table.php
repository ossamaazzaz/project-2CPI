<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW searches AS SELECT `products`.`id`, `products`.`name`, `products`.`brand`, `product_details`.`description` FROM `products` LEFT JOIN `product_details` ON `products`.`id` = `product_details`.`product_id`');
        // DB::statement('CREATE INDEX searchindex ON searches');
        // DB::statement('CREATE FULLTEXT INDEX ON [searches](id,name,brand,description) ON FullText WITH CHANGE_TRACKING AUTO');

            // CREATE VIEW searches AS

            //   SELECT
            //     products.id AS searchable_id,
            //     'name' AS searchable_type,
            //     products.name AS term
            //   FROM products

            //   JOIN product_details ON products.id = product_details.product_id

            //   UNION

            //   SELECT
            //     statuses.id AS searchable_id,
            //     'Status' AS searchable_type,
            //     statuses.body AS term
            //   FROM statuses

            //   UNION

            //   SELECT
            //     users.id AS searchable_id,
            //     'User' AS searchable_type,
            //     users.name AS term
            //   FROM users
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW searches');
    }
}
