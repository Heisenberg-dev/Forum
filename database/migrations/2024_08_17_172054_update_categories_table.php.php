<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            
            if (!Schema::hasColumn('categories', 'new_column')) {
                $table->string('new_column')->nullable();
            }
        });
    }

    
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
         
            if (Schema::hasColumn('categories', 'new_column')) {
                $table->dropColumn('new_column');
            }
        });
    }
};
