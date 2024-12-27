<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCallExtensionAndQueue extends Migration
{
    const CALL_GROUP_QUEUE = 'call_group_queue';
    const CALL_GROUP_EXTENSION = 'call_group_extension';

    const EXTENSIONS = [
        [1, "104"],
        [1, "109"],
        [1, "110"],
        [1, "111"],
        [1, "127"],
        [1, "128"],
        [1, "180"],
        [1, "185"],
        [1, "186"],
        [1, "600"],
        [1, "601"],
        [1, "602"],
        [1, "608"],
        [2, "146"],
        [2, "642"],
        [2, "605"],
        [2, "603"],
        [3, "430"],
        [3, "431"],
        [4, "231"],
        [4, "230"],
        [5, "240"],
        [5, "241"],
        [6, "220"],
        [6, "221"],
        [8, "250"],
        [8, "251"],
        [9, "366"],
        [10, "281"],
        [10, "282"],
        [11, "377"],
        [13, "270"],
        [13, "702"],
        [14, "290"],
        [14, "291"],
        [14, "292"],
        [15, "252"],
        [16, "519"],
        [16, "520"],
        [17, "507"],
        [17, "508"],
        [18, "513"],
        [18, "514"],
        [19, "271"],
        [19, "272"],
        [20, "510"],
        [20, "511"],
        [21, "300"],
        [21, "302"],
        [22, "130"],
        [24, "3110029"],
        [25, "373"],
        [25, "374"],
        [28, "274"],
        [28, "275"],
        [29, "2147483647"],
        [30, "361"],
        [30, "362"],
        [30, "364"],
        [30, "369"],
        [33, "159"],
        [34, "159"],
        [35, "274"],
        [35, "275"],
        [2, "606"],
        [2, "607"],
        [2, "635"],
        [2, "663"],
        [2, "625"],
        [2, "504"],
        [40, "526"],
        [40, "527"],
        [41, "274"],
        [41, "275"],
    ];

    const QUEUES = [
        [1, "3252121", "880"],
        [3, "4412128", "611"],
        [4, "4412123", "613"],
        [5, "4412124", "626"],
        [6, "4412125", "627"],
        [1, "3254721", "629"],
        [8, "3201885", "623"],
        [9, "3206686", "614"],
        [10, "3254722", "630"],
        [11, "3258347", "612"],
        [12, "3207695", "625"],
        [14, "3207696", "618"],
        [15, "3277202", "615"],
        [16, "4069469", "617"],
        [17, "3259656", "622"],
        [18, "3279474", "628"],
        [19, "3259464", "610"],
        [20, "3259755", "621"],
        [21, "3053142", "620"],
        [23, "3263139", "713"],
        [25, "3216818", "616"],
        [28, "3252006", "631"],
        [32, "3206685", "632"],
        [35, "3252006", "631"],
        [36, "6000111", "633"],
        [37, "3209140", "619"],
        [38, "3274474", "369"],
        [32, "3252124", "634"],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_group_extension', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_call_group');
            $table->string('extension');

            $table->foreign('id_call_group')
                ->references('id')
                ->on('call_group')
                ->onDelete('cascade');
        });

        foreach (self::EXTENSIONS as $extension) {
            DB::table('call_group_extension')->insert([
                'id_call_group' => $extension[0],
                'extension' => $extension[1]
            ]);
        }

        Schema::create('call_group_queue', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_call_group');
            $table->string('did');
            $table->string('queue');

            $table->foreign('id_call_group')
                ->references('id')
                ->on('call_group')
                ->onDelete('cascade');
        });

        foreach (self::QUEUES as $queue) {
            DB::table('call_group_queue')->insert([
                'id_call_group' => $queue[0],
                'did' => $queue[1],
                'queue' => $queue[2]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_group_extension');
        Schema::dropIfExists('call_group_queue');
    }
}
