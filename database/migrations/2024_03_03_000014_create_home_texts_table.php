<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_title');
            $table->text('about_content');
            $table->string('services_title');
            $table->string('portfolio_title');
            $table->text('portfolio_content');
            $table->string('faq_title');
            $table->text('faq_content');
            $table->string('contact_title');
            $table->text('contact_content');
            $table->string('contact_name_input');
            $table->string('contact_email_input');
            $table->string('contact_subject_input');
            $table->string('contact_message_input');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_texts');
    }
};
