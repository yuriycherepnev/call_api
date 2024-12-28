<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCallGroup extends Migration
{
    const TABLE_CALL_GROUP = 'call_group';

    private const CALL_GROUPS = [
        ["id" => 1, "name" => "Интернет-магазин"],
        ["id" => 2, "name" => "Оператор контакт центра"],
        ["id" => 3, "name" => "Большевиков пр., д. 42"],
        ["id" => 4, "name" => "Витебский пр., д. 11А"],
        ["id" => 5, "name" => "Руставели ул., д. 42"],
        ["id" => 6, "name" => "Сердобольская ул., д. 3"],
        ["id" => 7, "name" => "Черняховского ул., д. 21"],
        ["id" => 8, "name" => "Оптиков ул., д. 15"],
        ["id" => 9, "name" => "Выборгская наб., д. 61А"],
        ["id" => 10, "name" => "Шаумяна пр., д. 4"],
        ["id" => 11, "name" => "1-й Верхний пер., д. 2А"],
        ["id" => 12, "name" => "Политехническая ул., д. 15А"],
        ["id" => 13, "name" => "Краснопутиловская ул., д. 46А"],
        ["id" => 14, "name" => "г. Кингисепп, 4-й проезд, д. 1"],
        ["id" => 15, "name" => "Выборгское шоссе, д. 22Б"],
        ["id" => 16, "name" => "КИМа пр., д. 6, В.О."],
        ["id" => 17, "name" => "Непокорённых пр., д. 64А"],
        ["id" => 18, "name" => "Харченко ул., д. 41"],
        ["id" => 19, "name" => "Белорусская ул., д. 7, лит. А"],
        ["id" => 20, "name" => "Народного Ополчения пр., д. 201К"],
        ["id" => 21, "name" => "пос. Ленсоветовский, Московское ш. 231 к.5"],
        ["id" => 22, "name" => "Софийская ул., д. 127, к.6"],
        ["id" => 23, "name" => "Партизанская ул., д. 15 к.1"],
        ["id" => 24, "name" => "Мурманское шocce, 25км"],
        ["id" => 25, "name" => "Выборгское шоссе, д. 214"],
        ["id" => 26, "name" => "8-я Советская ул. д. 4"],
        ["id" => 27, "name" => "г. Кириши, пр.Победы, д. 6"],
        ["id" => 28, "name" => "Петровский проспект д. 20Б"],
        ["id" => 29, "name" => "shini78"],
        ["id" => 30, "name" => NULL],
        ["id" => 31, "name" => "Пустая группа"],
        ["id" => 32, "name" => "Салова ул., 32"],
        ["id" => 33, "name" => "Сезон"],
        ["id" => 34, "name" => "Отдел рекламы"],
        ["id" => 35, "name" => "Ленинский пр. 101 к 3"],
        ["id" => 36, "name" => "Профессора Попова ул., д. 38, лит. Щ пом.15"],
        ["id" => 37, "name" => "Грузовой проезд, д. 5"],
        ["id" => 38, "name" => "Бухарестская ул., д. 120 А"],
        ["id" => 39, "name" => "г. Выборг, 136 км трассы «Скандинавия» АБЗ «Светлое»"],
        ["id" => 40, "name" => NULL],
        ["id" => 41, "name" => "Петровский проспект д. 20Б"]
    ];

    /**
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_CALL_GROUP, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
        });

        foreach (self::CALL_GROUPS as $group) {
            DB::table(self::TABLE_CALL_GROUP)->insert([
                'id' => $group['id'],
                'name' => $group['name']
            ]);
        }
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_CALL_GROUP);
    }
}
