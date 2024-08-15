<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Topic;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            // Проверяем, существует ли столбец category_id, прежде чем добавлять его
            if (!Schema::hasColumn('topics', 'category_id')) {
                $table->unsignedBigInteger('category_id')->default(1);
            }

            if (!Schema::hasColumn('topics', 'tags')) {
                $table->string('tags')->nullable();
            }
        });

        // Устанавливаем значение для всех существующих записей, если они не имеют категории
        Topic::whereNull('category_id')->update(['category_id' => 1]);

        Schema::table('topics', function (Blueprint $table) {
            // Добавляем внешний ключ после того, как убедились, что столбец существует
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('tags');
        });
    }
};