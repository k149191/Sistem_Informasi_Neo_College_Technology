<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            if (!Schema::hasColumn('news', 'author_name')) {
                $table->string('author_name')->nullable()->after('content');
            }
            if (!Schema::hasColumn('news', 'is_carousel')) {
                $table->boolean('is_carousel')->default(false)->after('published_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['author_name', 'is_carousel']);
        });
    }
};