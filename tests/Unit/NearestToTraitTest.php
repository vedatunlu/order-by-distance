<?php

namespace Unlu\NearestTo\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Unlu\NearestTo\Tests\Models\Location;

class NearestToTraitTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->createLocations('gebze', 40.79416288788229, 29.44550690579937);
        $this->createLocations('tuzla', 40.84193744509763, 29.302968010944628);
        $this->createLocations('pendik', 40.87643959900778, 29.261035314939324);
        $this->createLocations('kadikoy', 40.97851988615076, 29.060579817200228);
        $this->createLocations('ankara', 39.93882822951195, 32.841185166607154);
    }

    private function createLocations(string $title, float $latitude, float $longitude): Location
    {
        return Location::create([
            'title' => $title,
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
    }

    private function orderedLocationsToArray(): array
    {
        return Location::nearestTo(41.02488721726937, 29.015275681371868)->pluck('title')->toArray();
    }

    public function test_locations_can_be_ordered_by_distance()
    {
        $this->assertCount(5, $this->orderedLocationsToArray());
        $this->assertEquals( 'kadikoy', $this->orderedLocationsToArray()[0]);
        $this->assertEquals( 'pendik', $this->orderedLocationsToArray()[1]);
        $this->assertEquals( 'tuzla', $this->orderedLocationsToArray()[2]);
        $this->assertEquals( 'gebze', $this->orderedLocationsToArray()[3]);
        $this->assertEquals( 'ankara', $this->orderedLocationsToArray()[4]);
    }

    public function test_if_any_location_removed_from_the_list()
    {
        Location::whereIn('title', ['kadikoy', 'gebze'])->delete();
        $this->assertCount(3, $this->orderedLocationsToArray());
        $this->assertEquals( 'pendik', $this->orderedLocationsToArray()[0]);
        $this->assertEquals( 'tuzla', $this->orderedLocationsToArray()[1]);
        $this->assertEquals( 'ankara', $this->orderedLocationsToArray()[2]);
    }

}
