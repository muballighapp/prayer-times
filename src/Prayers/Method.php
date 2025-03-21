<?php

namespace Muballigh\Prayers;

use Muballigh\MoonSighting\Isha;

class Method
{
    /**
     * All methods available for computation
     */
    const METHOD_JAFARI = 'JAFARI'; // 0;
    const METHOD_KARACHI = 'KARACHI'; // 1;
    const METHOD_ISNA = 'ISNA'; // 2;
    const METHOD_MWL = 'MWL'; // 3
    const METHOD_MAKKAH = 'MAKKAH'; // 4;
    const METHOD_EGYPT = 'EGYPT'; // 5;
    const METHOD_TEHRAN = 'TEHRAN'; // 7;
    const METHOD_GULF = 'GULF'; // 8
    const METHOD_KUWAIT = 'KUWAIT'; // 9
    const METHOD_QATAR = 'QATAR'; // 10
    const METHOD_SINGAPORE = 'SINGAPORE'; // 11
    const METHOD_FRANCE = 'FRANCE'; // 12
    const METHOD_TURKEY = 'TURKEY'; // 13
    const METHOD_RUSSIA = 'RUSSIA'; // 14
    const METHOD_MOONSIGHTING = 'MOONSIGHTING'; // 15
    const METHOD_DUBAI = 'DUBAI'; // 16
    const METHOD_JAKIM  = 'JAKIM'; // 17
    const METHOD_TUNISIA = 'TUNISIA'; // 18
    const METHOD_ALGERIA = 'ALGERIA'; // 19
    const METHOD_KEMENAG = 'KEMENAG'; // 20
    const METHOD_MOROCCO = 'MOROCCO'; // 21
    const METHOD_PORTUGAL = 'PORTUGAL'; // 22
    const METHOD_JORDAN = 'JORDAN'; // 23
    const METHOD_CUSTOM = 'CUSTOM'; // 99

    /**
     * Name of custom method
     * @var string
     */
    public $name;

    /**
     * Default configuration parameters
     * @var array
     */
    public $params = [];

    /**
     * Constructor
     * @param string $name
     */
    public function __construct($name = 'Custom')
    {
        $this->name = $name;
        // Default Params
        $this->params = [
            PrayerTimes::FAJR => 15,
            PrayerTimes::ISHA => 15
        ];

    }

    /**
     * Set the Fajr Angle
     * @param float $angle 18 or 18.5 for degrees
     */
    public function setFajrAngle($angle): void
    {
        $this->params[PrayerTimes::FAJR] = $angle;
    }

    /**
     * Set Maghrib angle or minutes after sunset. Example 18 or 18.5 or '20 min'
     * @param string $angleOrMinsAfterSunset
     */
    public function setMaghribAngleOrMins($angleOrMinsAfterSunset): void
    {
        $this->params[PrayerTimes::MAGHRIB] = $angleOrMinsAfterSunset;
    }

    /**
     * Set Isha angle or mins after Maghrib. Example 18 or 18.5 or '90 min'
     * @param string $angleOrMinsAfterMaghrib
     */
    public function setIshaAngleOrMins($angleOrMinsAfterMaghrib): void
    {
        $this->params[PrayerTimes::ISHA] = $angleOrMinsAfterMaghrib;
    }

    public static function getMethodCodes(): array
    {
        return [
            self::METHOD_MWL,
            self::METHOD_ISNA,
            self::METHOD_EGYPT,
            self::METHOD_MAKKAH,
            self::METHOD_KARACHI,
            self::METHOD_TEHRAN,
            self::METHOD_JAFARI,
            self::METHOD_GULF,
            self::METHOD_KUWAIT,
            self::METHOD_QATAR,
            self::METHOD_SINGAPORE,
            self::METHOD_FRANCE,
            self::METHOD_TURKEY,
            self::METHOD_RUSSIA,
            self::METHOD_MOONSIGHTING,
            self::METHOD_DUBAI,
            self::METHOD_JAKIM,
            self::METHOD_TUNISIA,
            self::METHOD_ALGERIA,
            self::METHOD_KEMENAG,
            self::METHOD_MOROCCO,
            self::METHOD_PORTUGAL,
            self::METHOD_JORDAN,
            self::METHOD_CUSTOM,
        ];
    }

    public static function getMethods(): array
    {
        return [
             self::METHOD_MWL => [
                'id' => 3,
                'name' => 'Muslim World League',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 17
                ],
                'location' => [ // Goodge Street, London, UK
                    'latitude' => 51.5194682,
                    'longitude' => -0.1360365,
                ]
            ],
            self::METHOD_ISNA => [
                'id' => 2,
                'name' => 'Islamic Society of North America (ISNA)',
                'params' => [
                    PrayerTimes::FAJR => 15,
                    PrayerTimes::ISHA => 15
                ],
                'location' => [ // Plainfield, Indiana, USA
                    'latitude' => 39.70421229999999,
                    'longitude' => -86.39943869999999,
                ]
            ],
            self::METHOD_EGYPT => [
                'id' => 5,
                'name' => 'Egyptian General Authority of Survey',
                'params' => [
                    PrayerTimes::FAJR => 19.5,
                    PrayerTimes::ISHA => 17.5
                ],
                'location' => [ // Cairo, Egype
                    'latitude' => 30.0444196,
                    'longitude' => 31.2357116,
                ]
            ],
            self::METHOD_MAKKAH => [
                'id' => 4,
                'name' => 'Umm Al-Qura University, Makkah',
                'params' => [
                    PrayerTimes::FAJR => 18.5, // Fajr was 19 degrees before 1430 hijri
                    PrayerTimes::ISHA => '90 min'
                ],
                'location' => [ // Makkah, Saudi Arabia
                    'latitude' => 21.3890824,
                    'longitude' => 39.8579118
                ]
            ],
            self::METHOD_KARACHI => [
                'id' => 1,
                'name' => 'University of Islamic Sciences, Karachi',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 18
                ],
                'location' => [ // Karachi, Pakistan
                    'latitude' => 24.8614622,
                    'longitude' => 67.0099388
                ]
            ],
            self::METHOD_TEHRAN => [
                'id' => 7,
                'name' => 'Institute of Geophysics, University of Tehran',
                'params' => [
                    PrayerTimes::FAJR => 17.7,
                    PrayerTimes::ISHA => 14,
                    PrayerTimes::MAGHRIB => 4.5,
                    PrayerTimes::MIDNIGHT => self::METHOD_JAFARI
                ],
                'location' => [ // Tehran, Iran
                    'latitude' => 35.6891975,
                    'longitude' => 51.3889736
                ]
            ],
            self::METHOD_JAFARI => [
                'id' => 0,
                'name' => 'Shia Ithna-Ashari, Leva Institute, Qum',
                'params' => [
                    PrayerTimes::FAJR => 16,
                    PrayerTimes::ISHA => 14,
                    PrayerTimes::MAGHRIB => 4,
                    PrayerTimes::MIDNIGHT => self::METHOD_JAFARI
                ],
                'location' => [ // Qum, Iran
                    'latitude' => 34.6415764,
                    'longitude' => 50.8746035
                ]
            ],
            self::METHOD_GULF => [
                'id' => 8,
                'name' => 'Gulf Region',
                'params' => [
                    PrayerTimes::FAJR => 19.5,
                    PrayerTimes::ISHA => '90 min'
                ],
                'location' => [ // Khasbat Al Reed Island, Abu Dhabi, UAE
                    'latitude' => 24.1323638,
                    'longitude' => 53.3199527
                ]
            ],
            self::METHOD_KUWAIT => [
                'id' => 9,
                'name' => 'Kuwait',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 17.5
                ],
                'location' => [ // Kuwait City, Kuwait
                    'latitude' => 29.375859,
                    'longitude' => 47.9774052
                ]
            ],
            self::METHOD_QATAR => [
                'id' => 10,
                'name' => 'Qatar',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => '90 min'
                ],
                'location' => [ // Doha, Qatar
                    'latitude' => 25.2854473,
                    'longitude' => 51.5310398
                ]
            ],
            self::METHOD_SINGAPORE => [
                'id' => 11,
                'name' => 'Majlis Ugama Islam Singapura, Singapore',
                'params' => [
                    PrayerTimes::FAJR => 20,
                    PrayerTimes::ISHA => 18
                ],
                'location' => [
                    'latitude' => 1.352083,
                    'longitude' => 103.819836
                ]
            ],
            self::METHOD_FRANCE => [
                'id' => 12,
                'name' => 'Union Organization Islamic de France',
                'params' => [
                    PrayerTimes::FAJR => 12,
                    PrayerTimes::ISHA => 12
                ],
                'location' => [
                    'latitude' => 48.856614,
                    'longitude' => 2.3522219
                ]
            ],
            self::METHOD_TURKEY => [
                'id' => 13,
                'name' => 'Diyanet İşleri Başkanlığı, Turkey (experimental)',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 17
                ],
                'location' => [ // Ankara, Turkey
                    'latitude' => 39.9333635,
                    'longitude' => 32.8597419
                ]
            ],
            self::METHOD_RUSSIA => [
                'id' => 14,
                'name' => 'Spiritual Administration of Muslims of Russia',
                'params' => [
                    PrayerTimes::FAJR => 16,
                    PrayerTimes::ISHA => 15
                ],
                'location' => [ // Ufa city, Republic Bashkortostan, Russia
                    'latitude' => 54.73479099999999,
                    'longitude' => 55.9578555
                ]

            ],
            self::METHOD_MOONSIGHTING => [
                'id' => 15,
                'name' => 'Moonsighting Committee Worldwide (Moonsighting.com)',
                'params' => [
                    'shafaq' => Isha::SHAFAQ_GENERAL
                ]
            ],
            self::METHOD_DUBAI => [
                'id' => 16,
                'name' => 'Dubai (experimental)',
                'params' => [
                    PrayerTimes::FAJR => 18.2,
                    PrayerTimes::ISHA => 18.2,
                ],
                'location' => [ // Dubai, UAE
                    'latitude' => 25.0762677,
                    'longitude' => 55.087404
                ]
            ],
            self::METHOD_JAKIM => [
                'id' => 17,
                'name' => 'Jabatan Kemajuan Islam Malaysia (JAKIM)',
                'params' => [
                    PrayerTimes::FAJR => 20,
                    PrayerTimes::ISHA => 18,
                ],
                'location' => [ // Kuala Lumpur, Malaysia
                    'latitude' => 3.139003,
                    'longitude' => 101.686855
                ]
            ],
            self::METHOD_TUNISIA => [
                'id' => 18,
                'name' => 'Tunisia',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 18,
                ],
                'location' => [ // Tunis, Tunisia
                    'latitude' => 36.8064948,
                    'longitude' => 10.1815316
                ]
            ],
            self::METHOD_ALGERIA => [
                'id' => 19,
                'name' => 'Algeria',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::ISHA => 17,
                ],
                'location' => [ // Algiers, Algeria
                    'latitude' => 36.753768,
                    'longitude' => 3.0587561
                ]
            ],
            self::METHOD_KEMENAG => [
                'id' => 20,
                'name' => 'Kementerian Agama Republik Indonesia',
                'params' => [
                    PrayerTimes::FAJR => 20,
                    PrayerTimes::ISHA => 18,
                ],
                'location' => [ // Jakarta, Indonesia
                    'latitude' => -6.2087634,
                    'longitude' => 106.845599
                ]
            ],
            self::METHOD_MOROCCO => [
                'id' => 21,
                'name' => 'Morocco',
                'params' => [
                    PrayerTimes::FAJR => 19,
                    PrayerTimes::ISHA => 17,
                ],
                'location' => [ // Rabat, Morocco
                    'latitude' => 33.9715904,
                    'longitude' => -6.8498129
                ]
            ],
            self::METHOD_PORTUGAL => [
                'id' => 22,
                'name' => 'Comunidade Islamica de Lisboa',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::MAGHRIB => '3 min',
                    PrayerTimes::ISHA => '77 min',
                ],
                'location' => [ // Lisbon, Portugal
                    'latitude' => 38.7222524,
                    'longitude' => -9.1393366
                ]
            ],
            self::METHOD_JORDAN => [
                'id' => 23,
                'name' => 'Ministry of Awqaf, Islamic Affairs and Holy Places, Jordan',
                'params' => [
                    PrayerTimes::FAJR => 18,
                    PrayerTimes::MAGHRIB => '5 min',
                    PrayerTimes::ISHA => 18,
                ],
                'location' => [ // Amman, Jordan
                    'latitude' => 31.9461222,
                    'longitude' => 35.923844
                ]
            ],
            self::METHOD_CUSTOM => [
                'id' => 99
            ],
        ];
    }
}
