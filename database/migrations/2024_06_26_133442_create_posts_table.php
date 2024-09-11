<?php

use App\Models\Post;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('extract');
            $table->string('body');

            $table->enum('status',[Post::BOORADOR,Post::PUBLICADO])->default(Post::BOORADOR)->nullable();

            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
        DB::table('posts')->insert([
            'name'=>'Prueba',
            'slug' => 'slugs',
            'extract' => 'extract',
            'body' => 'body',
            'status' => Post::BOORADOR,
            'category_id' => 1,
            'user_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
