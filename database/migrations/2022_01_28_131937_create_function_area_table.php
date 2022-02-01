<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcareas', function (Blueprint $table) {
            $table->id();
            $table->string("Fam_Desc");
            $table->integer("Fam_Year");
            $table->timestamps();
        });

        Schema::create('igmetricms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("funcareas_id")->unsigned()->index();
            $table->foreign("funcareas_id")
                ->references("id")
                ->on("funcareas")
                ->onDelete("restrict")
                ->onUpdate("restrict");

            $table->text("igm_desc");
            $table->integer("igm_func_area");
            $table->integer("igm_active");
            $table->timestamps();
        });

        Schema::create('igmetricds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("igmetricms_id")->unsigned()->index();
            $table->foreign("igmetricms_id")
                ->references("id")
                ->on("igmetricms")
                ->onDelete("restrict")
                ->onUpdate("restrict");

            $table->string("igd_desc");
            $table->integer("igd_active");
            $table->timestamps();
        });

        Schema::create('igm_quests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("igmetricds_id")->unsigned()->index();
            $table->foreign("igmetricds_id")
                ->references("id")
                ->on("igmetricds")
                ->onDelete("restrict")
                ->onUpdate("restrict");

            $table->text("q_desc");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('func_areas');
        Schema::dropIfExists("igmetricms");
        Schema::dropIfExists("igmetricds");
        Schema::dropIfExists("igm_quests");
    }
}
