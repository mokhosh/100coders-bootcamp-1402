<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->default('...')->after('email');
        });

        // User::get()->each(function (User $user) {
        //     $user->update([
        //         'username' => str($user->email)->before('@'),
        //     ]);
        // });

        User::chunk(100, function (Collection $users) {
            $users->each(function (User $user) {
                $user->update([
                    'username' => str($user->email)->before('@'),
                ]);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
    }
};
