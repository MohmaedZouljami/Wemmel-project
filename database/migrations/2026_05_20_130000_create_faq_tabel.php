<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_categorieen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->timestamps();
        });

        Schema::create('faq_vragen', function (Blueprint $table) {
            $table->id();
            $table->string('vraag');
            $table->text('antwoord');
            $table->foreignId('faq_categorie_id')->constrained('faq_categorieen')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_vragen');
        Schema::dropIfExists('faq_categorieen');
    }
};
