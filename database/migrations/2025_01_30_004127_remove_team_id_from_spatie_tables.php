<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// this command create miigration file for remove team_id from role ,permission table
// php artisan make:migration remove_team_id_from_spatie_tables
return new class extends Migration {
    public function up()
    {
        // Remove team_id from roles table (if it exists)
        Schema::table('roles', function (Blueprint $table) {
            if (Schema::hasColumn('roles', 'team_id')) {
                $table->dropColumn('team_id');
            }
        });

        // Remove team_id from model_has_roles table (if it exists)
        Schema::table('model_has_roles', function (Blueprint $table) {
            if (Schema::hasColumn('model_has_roles', 'team_id')) {
                $table->dropColumn('team_id');
            }
        });

        // Remove team_id from model_has_permissions table (if it exists)
        Schema::table('model_has_permissions', function (Blueprint $table) {
            if (Schema::hasColumn('model_has_permissions', 'team_id')) {
                $table->dropColumn('team_id');
            }
        });
    }

    public function down()
    {
        // Re-add team_id if needed (rollback)
        Schema::table('roles', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable()->after('guard_name');
        });

        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable()->after('role_id');
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable()->after('model_id');
        });
    }
};
