 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Base extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('mode', ['round-robin', 'groups']);
            $table->enum('playMode', ['runningOutTheClock', 'twoSets', 'twoWinningSets', 'threeWinningSets']);
            $table->integer('numberOfGroups')->nullable();
            $table->integer('numberOfTeams');
            $table->integer('numberOfFields');
            $table->string('formOfSport');
            $table->timestamps();
        });

        Schema::create('times', function (Blueprint $table) {
            $table->increments('id');
            $table->time('startTime');
            $table->time('timePerGame');
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tournament_id');
            $table->timestamps();
        });

        Schema::create('game', function (Blueprint $table) {
            $table->integer('numberOfGames');
            $table->string('team1');
            $table->string('team2');
            $table->string('referee');
            $table->string('winningTeam');
            $table->string('fieldNumber');
            $table->integer('winningPoints');
        });

        Schema::create('results', function (Blueprint $table) {
            $table->string('teams');
            $table->integer('numberOfGames');
            $table->integer('pointsPerGame');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('game');
        Schema::dropIfExists('times');
        Schema::dropIfExists('results');
    }
    }
