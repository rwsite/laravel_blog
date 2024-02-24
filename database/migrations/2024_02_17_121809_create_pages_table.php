<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'pages', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string( 'title', 280 );
            $table->string( 'thumbnail', 500 )->nullable();
            $table->longText( 'content' )->nullable();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'pages' );
    }
};
