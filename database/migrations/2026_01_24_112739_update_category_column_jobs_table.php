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
        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('category', [
                'Technology', 
                'Design & Creative', 
                'Business Management', 
                'Sales & Marketing', 
                'Finance & Accounting', 
                'Human Resources', 
                'Customer Service', 
                'Healthcare', 
                'Education', 
                'Engineering', 
                'Construction & Trades', 
                'Legal', 
                'Media & Communication', 
                'Hospitality & Tourism', 
                'Logistics & Transportation', 
                'Retail & E-commerce', 
                'Government & Public Service', 
                'Science & Research', 'Agriculture', 
                'Maintenance & Services', 
                'Arts & Entertainment', 
                'Other'])
                ->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('category')->nullable()->change();
        });
    }
};
