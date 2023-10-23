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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('documentId'); //id tai lieu

            $table->text('documentName'); //ten hien thi tai lieu
            $table->text('documentFileName'); //ten file luu tru cua tai lieu
            $table->integer('id'); //id cua nguoi dang tai
            $table->integer('typeId'); //id cua loai tai lieu
            $table->string('image'); //ten hinh anh (tu gan)
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
