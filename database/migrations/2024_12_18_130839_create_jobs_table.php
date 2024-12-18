<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('title');
            $table->string('short_description');
            $table->text('full_description');
            $table->json('details');
            $table->timestamps();
        });
    }

    // Converts data to json during insertion and retrieving 
    protected $casts = [
        'job_details' => 'array'
    ];

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
