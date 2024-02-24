<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'posts', function ( Blueprint $table ) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string( 'title', 280 );
            $table->string( 'slug' )->unique();
            $table->string( 'thumbnail', 500 )->nullable();
            $table->longText( 'content' );
            $table->foreignId( 'post_category_id' )
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'posts' );
    }
};
