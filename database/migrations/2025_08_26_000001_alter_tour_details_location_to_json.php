<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // 1) Add temporary JSON column
        DB::statement("ALTER TABLE `tour_details` ADD COLUMN `location_tmp` JSON NULL AFTER `description`");

        // 2) Migrate existing string values into JSON object {"en": value}
        DB::statement("UPDATE `tour_details` SET `location_tmp` = CASE WHEN `location` IS NULL OR `location` = '' THEN NULL ELSE JSON_OBJECT('en', `location`) END");

        // 3) Drop old column and rename temp to final
        DB::statement("ALTER TABLE `tour_details` DROP COLUMN `location`");
        DB::statement("ALTER TABLE `tour_details` CHANGE `location_tmp` `location` JSON NULL");
    }

    public function down()
    {
        // 1) Add temporary VARCHAR column
        DB::statement("ALTER TABLE `tour_details` ADD COLUMN `location_tmp` VARCHAR(255) NULL AFTER `description`");

        // 2) Extract English value from JSON if present
        DB::statement("UPDATE `tour_details` SET `location_tmp` = CASE WHEN `location` IS NULL THEN NULL ELSE JSON_UNQUOTE(JSON_EXTRACT(`location`, '$.en')) END");

        // 3) Drop JSON column and rename temp back
        DB::statement("ALTER TABLE `tour_details` DROP COLUMN `location`");
        DB::statement("ALTER TABLE `tour_details` CHANGE `location_tmp` `location` VARCHAR(255) NULL");
    }
};


