<?php
namespace Muballigh\Prayers;
require __DIR__ . '/../vendor/autoload.php'; // Include Composer's autoloader

use PHPUnit\Framework\TestCase;

use DateTime;
use DateTimeZone;

class PrayerTimesTest extends TestCase
{
    // Test for the current day's prayer times
    public function testGetTimesForToday()
    {
        $latitude = 51.5074;  // Example: London
        $longitude = -0.1278;
        $timezone = 'Europe/London';

        // Create an instance of the PrayerTimes class (assuming 'ISNA' method is used)
        $prayerTimes = new PrayerTimes('ISNA');
        
        // Get today's prayer times
        $times = $prayerTimes->getTimesForToday($latitude, $longitude, $timezone);
        print_r($times); // Check what is returned

        // Assert that the prayer times are correctly returned for today
        $this->assertArrayHasKey('Fajr', $times);
        $this->assertArrayHasKey('Dhuhr', $times);
        $this->assertArrayHasKey('Asr', $times);
        $this->assertArrayHasKey('Maghrib', $times);
        $this->assertArrayHasKey('Isha', $times);

        // Check if the prayer times are not empty
        foreach ($times as $time) {
            $this->assertNotEmpty($time, 'Prayer time should not be empty.');
        }

        // Check that prayer times are in a valid time format (24-hour format or ISO 8601)
        foreach ($times as $time) {
            $this->assertMatchesRegularExpression('/^(?:[01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time, 'Invalid time format: ' . $time);
        }
    }

    // Test for prayer times on a specific date
    public function testGetTimesForSpecificDate()
    {
        $latitude = 51.5074;  // Example: London
        $longitude = -0.1278;
        $timezone = 'Europe/London';
        $date = new DateTime('2024-04-25', new DateTimeZone($timezone));  // Specific date

        // Create an instance of the PrayerTimes class
        $prayerTimes = new PrayerTimes('ISNA');
        
        // Get prayer times for the specific date
        $times = $prayerTimes->getTimes($date, $latitude, $longitude);
        print_r($times); // Check what is returned

        // Assert that the prayer times are correctly returned for the specific date
        $this->assertArrayHasKey('Fajr', $times);
        $this->assertArrayHasKey('Dhuhr', $times);
        $this->assertArrayHasKey('Asr', $times);
        $this->assertArrayHasKey('Maghrib', $times);
        $this->assertArrayHasKey('Isha', $times);

        // Check if the prayer times are not empty
        foreach ($times as $time) {
            $this->assertNotEmpty($time, 'Prayer time should not be empty.');
        }

        // Check that prayer times are in a valid time format (24-hour format or ISO 8601)
        foreach ($times as $time) {
            $this->assertMatchesRegularExpression('/^(?:[01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time, 'Invalid time format: ' . $time);
        }
    }
}
