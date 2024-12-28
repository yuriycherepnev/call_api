<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCallInfo extends Migration
{
    const TABLE_CALL_TAG = 'call_tag';
    const TABLE_CALL_STATUS = 'call_status';
    const TABLE_CALL_INFO = 'call_info';

    const CALL_TAGS = [
        'заказ',
        'услуги',
        'консультация',
        'перевод',
        'другое',
    ];

    const CALL_STATUSES = [
        'не обработан',
        'обработан',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_CALL_TAG, function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create(self::TABLE_CALL_STATUS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        foreach (self::CALL_TAGS as $tag) {
            DB::table(self::TABLE_CALL_TAG)->insert([
                'name' => $tag,
            ]);
        }

        foreach (self::CALL_STATUSES as $status) {
            DB::table(self::TABLE_CALL_STATUS)->insert([
                'name' => $status,
            ]);
        }

        Schema::create(self::TABLE_CALL_INFO, function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('comment');
            $table->string('linkedid');
            $table->unsignedBigInteger('id_tag');
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_status')
                ->references('id')
                ->on(self::TABLE_CALL_STATUS)
                ->onDelete('cascade');

            $table->foreign('id_tag')
                ->references('id')
                ->on(self::TABLE_CALL_TAG)
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_CALL_INFO);
        Schema::dropIfExists(self::TABLE_CALL_TAG);
        Schema::dropIfExists(self::TABLE_CALL_STATUS);
    }
}
