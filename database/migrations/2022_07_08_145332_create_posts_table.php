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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()->references('id')
                ->on('categories')->nullOnDelete();

            $table->string('image');
            $table->integer('views')->nullable();
            $table->string('title');
            $table->longText('details');
            $table->string('description');
            $table->string('tags');
            $table->string('slug');
            $table->string('championship');
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
        Schema::dropIfExists('tidings');
    }
};
