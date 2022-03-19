<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->id();
            $table->string("nom",250);
            $table->string("matiere",200);
            $table->string("filiere",150);
            $table->string("contenu",150);
            $table->unsignedBigInteger("epreuve_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("epreuve_id")
                ->references("id")
                ->on("epreuves")
                ->onDelete("cascade");
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
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
        Schema::dropIfExists('corrections');
    }
}
