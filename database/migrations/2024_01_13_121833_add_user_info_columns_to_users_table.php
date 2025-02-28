<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('uuid')->after('email');
            $table->string('phone_number')->nullable()->after('uuid');
            $table->string('avatar')->nullable()->after('phone_number');
            $table->string('passport')->nullable()->after('avatar');
            $table->string('address')->nullable()->after('passport');
            $table->string('address2')->nullable()->after('address');
            $table->date('birth_date')->nullable()->after('address2');
            $table->string('country')->nullable()->after('birth_date');
            $table->string('city')->nullable()->after('birth_date');
            $table->string('state')->nullable()->after('city');
            $table->string('zip_code')->nullable()->after('state');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('address2');
            $table->dropColumn('passport');
            $table->dropColumn('birth_date');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
            $table->dropColumn('avatar');
        });
    }
};
