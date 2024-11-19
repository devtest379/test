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
        Schema::table('users', function (Blueprint $table) {
            // Adding the new columns
            $table->string('document_url')->nullable();  // URL of the uploaded document
            $table->boolean('document_verified')->default(false);  // If the document is verified by admin
            $table->boolean('verification_requested')->default(false);  // If the user has requested verification
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns if rolling back the migration
            $table->dropColumn(['document_url', 'document_verified', 'verification_requested']);
        });
    }
};
