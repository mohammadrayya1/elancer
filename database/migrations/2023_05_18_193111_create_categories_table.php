<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();//primary key big integer auto unsignd
            //
            $table->string("name",200)->unique();
            $table->string("slug")->unique();
          //  $table->unsignedBigInteger("parent_id")->nullable();
          //$table->foreign("parent_id")->references("id")->on("categories")->cascadeOnDelete();
         // $table->foreign("parent_id")->references("id")->on("categories")->onDelete('cascade');
            //or
            //$table->foreign("parent_id")->references("id")->on("categories")->nullOnDelete();
            $table->foreignId("parent_id")
                  ->nullable()
                  ->constrained("categories","id")
                  ->nullOnDelete();
            $table->text("description")->nullable();
            $table->string("art_path")->nullable();

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
        Schema::dropIfExists('categories');
    }
};
