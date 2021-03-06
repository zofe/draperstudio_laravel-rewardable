<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) PackageBackup <hello@draperstud.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('reward')->default(0);

            $table->integer('requirement');
            $table->integer('requirement_type_id');

            $table->timestamps();
        });

        Schema::create('badges_awarded', function (Blueprint $table) {
            $table->integer('badge_id');

            $table->morphs('badgeable');
            $table->timestamp('awarded_at');

            $table->text('revoke_reason')->nullable();
            $table->timestamp('revoked_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('badges');
        Schema::drop('badges_awarded');
    }
}
