<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BedBase;
use App\Models\FurnitureDimensions;
use App\Models\FurnitureSize;
use App\Models\Material;
use App\Models\MattressFastening;
use App\Models\Table;
use App\Models\TypeTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Виды столов
        DB::table(TypeTable::$tableName)->insert([
            ['name' => 'Прямые письменные столы'],
            ['name' => 'Угловые письменные столы'],
            ['name' => 'Письменные столы под окном'],
            ['name' => 'Столы подоконники'],
            ['name' => 'Письменные столы для детей'],
            ['name' => 'Письменные столы для подростков'],
        ]);
        //Габариты
        DB::table(FurnitureDimensions::$tableName)->insert(
            [
                ['length' => 40, 'width' => 60, 'height' => 180],
                ['length' => 50, 'width' => 70, 'height' => 190],
                ['length' => 55, 'width' => 75, 'height' => 195],
                ['length' => 40, 'width' => 65, 'height' => 200],
                ['length' => 50, 'width' => 100, 'height' => 200],
            ],
        );
        //Материалы
        DB::table(Material::$tableName)->insert([
            ['name' => 'Пенополиуретан', 'appointment' => Material::$appointment[0],],
            ['name' => 'Натуральный латекс', 'appointment' => Material::$appointment[0],],
            ['name' => 'Кокосовое волокно', 'appointment' => Material::$appointment[0],],
            ['name' => 'Пружинные блоки', 'appointment' => Material::$appointment[0],],

            ['name' => 'Сосна', 'appointment' => Material::$appointment[1],],
            ['name' => 'Бук', 'appointment' => Material::$appointment[1],],
            ['name' => 'Дуб', 'appointment' => Material::$appointment[1],],
            ['name' => 'Красное дерево', 'appointment' => Material::$appointment[1],],
        ]);
        //Лежичие основания
        DB::table(BedBase::$tableName)->insert(
            [
                ['name' => 'Раскладные основания'],
                ['name' => 'Пружинные основания'],
                ['name' => 'Ламельные основания'],
                ['name' => 'Подъемные основания'],
                ['name' => 'Фиксированные основания'],
            ]
        );
        //Размеры
        DB::table(FurnitureSize::$tableName)->insert([
            ['length' => 180, 'width' => 80],
            ['length' => 180, 'width' => 90],
            ['length' => 180, 'width' => 100],
            ['length' => 210, 'width' => 80],
            ['length' => 210, 'width' => 90],
        ]);
        //Крепления
        DB::table(MattressFastening::$tableName)->insert([
            ['name' => 'Молния'],
            ['name' => 'Резинка'],
            ['name' => 'Застежки-липучки'],
            ['name' => 'Резиновые ремни'],
        ]);
        //Чехлы
        //Матрасы
        //Кровати
        //Столы
        //Хранилища вещей
    }



}
