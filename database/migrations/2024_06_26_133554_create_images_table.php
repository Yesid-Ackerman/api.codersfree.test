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
        Schema::create('images', function (Blueprint $table) {
            // $table->id();
            $table->string('url');
            // $table->string('imageable_id');
            $table->string('imageable_type');

            $table->unsignedBigInteger('imageable_id');
            $table->primary(['imageable_id','imageable_type']);

            $table->timestamps();
        });
        DB::table('images')->insert([
            ['url' => 'https://via.placeholder.com/150', 'imageable_id' =>
            DB::table('users')->where('id', 1)->value('id'), 'imageable_type' => 'App\Models\User'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
