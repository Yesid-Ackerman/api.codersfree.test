<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')->references('id')->on('posts');
            $table->foreignId('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });
        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
