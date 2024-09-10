<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('fichier')->nullable();
            $table->foreignId('type_document_id')->constrained();
            $table->timestamp('date')->useCurrent();
            $table->unsignedBigInteger('user_created')->nullable()->references('id')->on('users');
            $table->unsignedBigInteger('user_modified')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
