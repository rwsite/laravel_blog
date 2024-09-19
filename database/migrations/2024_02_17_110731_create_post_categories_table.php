<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'post_categories', function ( Blueprint $table ) {
            $table->id();

            $table->string( 'title', 280 );
            $table->string('slug', 120)->unique();
            $table->string('content', 500)->nullable();
            $table->string('image', 500)->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('post_categories');

            $table->timestamps();
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'post_categories' );
    }
};
