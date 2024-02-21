<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_infos', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('email');
            $table->integer('phone');
            $table->string('logo');
            $table->string('favicon_logo');
            $table->string('footer_logo')->nullable();
            $table->string('bradcrum_photo')->nullable();
            $table->longText('footer_des')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('address')->nullable();
            $table->string('google_tag')->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->string('facebook_messenger')->nullable();
            $table->string('bullet_text')->nullable();
            $table->string('bullet_content')->nullable();
            $table->string('copyright_text')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_infos');
    }
};
