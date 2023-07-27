<?php

use App\Models\Faculty;
use App\Models\User;
use App\Models\Group;
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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('moodle_session')->nullable();
            $table->timestamp('session_at')->nullable();
            $table->foreignIdFor(User::class, 'user_id')->unique();
            $table->foreignIdFor(Faculty::class, 'faculty_id');
            $table->foreignIdFor(Group::class, 'group_id');
            $table->string('ldu_login');
            $table->string('ldu_password');
            $table->enum('course', [1,2,3,4,5])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
