<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->string('image')->nullable();
            $table->integer('hits')->default(0);
            $table->enum('aktif', ['Y', 'N'])->default('Y');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->timestamps();
    
            // Foreign key jika ada relasi dengan tabel user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
