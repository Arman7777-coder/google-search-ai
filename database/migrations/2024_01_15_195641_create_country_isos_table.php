<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('country_isos', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('iso3');
            $table->string('full_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('country_isos');
    }
};
