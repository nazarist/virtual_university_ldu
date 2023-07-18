<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    private static array $groups = [
        '1002' => [
            "МН31з",
            "МН31с",
            "ПБ13к",
            "ПБ23с",
            "ПБ31з",
            "ПБ31к",
            "ПБ32з",
            "ПБ32к",
            "ПБ33к",
            "ПБ34с",
            "ПБ35с",
            "ПБ36с",
            "ПБ37мс",
            "ПБ43з",
            "ПБ43к",
            "ПБа31з",
            "ПБа31с",
            "ТТ31",
            "ТТ31з",
            "МН11з",
            "МН11с",
            "МН12с",
            "МН21з",
            "МН21с",
            "МН41з",
            "МН41с",
            "МН51м",
            "МН51мз",
            "МН61м",
            "МН61мз",
            "ПБ11з",
            "ПБ11к",
            "ПБ12з",
            "ПБ12к",
            "ПБ14с",
            "ПБ15с",
            "ПБ16с",
            "ПБ17с",
            "ПБ21з",
            "ПБ21к",
            "ПБ41з",
            "ПБ41к",
            "ПБ51м",
            "ПБ51мз",
            "ПБ61м",
            "ПБ61мз",
            "ПБа11с",
            "ПБа21з",
            "ПБа21с",
            "ПБа41з",
            "ПБа41с",
            "ТТ11з",
            "ТТ11с",
            "ТТ21з",
            "ТТ21с",
            "ТТ41",
            "ТТ41з",
            "ТТ51м",
            "ТТ51мз",
            "ТТ61м",
            "ТТ61мз",
            "ПБ22з",
            "ПБ22к",
            "ПБ24с",
            "ПБ25с",
            "ПБ26с",
            "ПБ42з",
            "ПБ42к",
            "ПБ52мз",
            "ПБ62мз",
            "ПБ44с",
            "ПБ45с"
        ],
        '1004' => [
            "ЕК11з",
            "ЕК11с",
            "ЕК21з",
            "ЕК21с",
            "ЕК31з",
            "ЕК31с",
            "ЕК41",
            "ЕК41з",
            "ЕК51м",
            "ЕК51мз",
            "ЕК61мз",
            "КБ11с",
            "КБ12с",
            "КБ21з",
            "КБ21с",
            "КБ31",
            "КБ31з",
            "КБ41",
            "КБ41з",
            "КБ51м",
            "КБ51мз",
            "КБ61м",
            "КБ61мз",
            "КН11",
            "КН12с",
            "КН13с",
            "КН21",
            "КН21з",
            "КН31",
            "КН31з",
            "КН41",
            "КН41з",
            "КН51м",
            "КН51мз",
            "КН61м",
            "КН61мз",
            "ЦБ11з",
            "ЦБ11к",
            "ЦБ12с",
            "ЦБ13с",
            "ЦБ21з",
            "ЦБ21к",
            "ЦБ31з",
            "ЦБ31к",
            "ЦБ41з",
            "ЦБ41к",
            "ЦБ51м",
            "ЦБ51мз",
            "ЦБ61м",
            "ЦБ61мз",
            "ЦБо11з",
            "ЦБо11с",
            "ЦБо21с",
            "ЦБо31з",
            "ЦБо31с",
            "ЦБо41з",
            "ЦБо41с",
            "ЦБо51м",
            "ЦБо51мз",
            "ЦБо61мз",
            "КН22с",
            "КН23с",
            "КН32с",
            "ЦБ22с",
            "ЦБ32с",
            "ЦБ42c",
            "ЦБ52мз"
        ],
        '1008' => [
            "ЕК11а",
            "ЕК11аз",
            "ЕК21а",
            "КН11а",
            "КН21а",
            "МН11а",
            "МН11аз",
            "МН21а",
            "ПБ11а",
            "ПБ11аз",
            "ПБ21а",
            "ЦБ11а"
        ],
        '1009' => [
            "АП11с",
            "АП12с",
            "АП13с",
            "АП14с",
            "АП21с",
            "АП31с",
            "АП41с",
            "АП51м",
            "АП51мз",
            "АП61м",
            "АП61мз",
            "ПЕ11",
            "ПО11а",
            "ПО21а",
            "ПО31а",
            "ПО41а",
            "ПС11з",
            "ПС11с",
            "ПС12с",
            "ПС21з",
            "ПС21с",
            "ПС31",
            "ПС31з",
            "ПС41",
            "ПС41з",
            "ПС51м",
            "ПС51мз",
            "ПС61м",
            "ПС61мз",
            "СР11з",
            "СР11с",
            "СР21з",
            "СР21с",
            "СР31з",
            "СР31с",
            "СР41з",
            "СР41с",
            "СР51м",
            "СР51мз",
            "СР61м",
            "АП22с",
            "АП23с",
            "АП24с",
            "АП25с",
            "АП32с",
            "АП42с",
            "ПС22с",
            "ПС32с",
            "ПС42с",
            "СР22с",
            "АП33с",
            "АП43с"
        ],
    ];

    public static function getCountGroups(): int
    {
        $allCount = 0;
        foreach (self::$groups as $group) {
            $allCount += count($group);
        }
        return $allCount;
    }


    private static int $groupsIndex = 0;

    public static function getData()
    {
        static $pointerReset = true;
        if ($pointerReset){
            reset(self::$groups);
            $pointerReset = false;
        }

        $groups = current(self::$groups);
        $group = $groups[self::$groupsIndex];
        self::$groupsIndex++;

        if (count($groups) <= self::$groupsIndex)
        {
            next(self::$groups);
            self::$groupsIndex = 0;
        }

        return [
            'faculty_id' => Faculty::query()->where('parse_no', key(self::$groups))->first()->id ,
            'group' => $group
        ];
    }
    public function definition(): array
    {
        $data = self::getData();
        return [
            'faculty_id' => $data['faculty_id'],
            'name' => $data['group']
        ];
    }
}
