<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserMigration extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number', 18)->nullable();
            $table->string('alamat')->nullable();
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('roles')->default(2)->comment('1= user, 2= admin');
            $table->tinyInteger('status')->default(2)->comment('1= Active, 2= Non Active');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('products');
    }
}
