<?php

namespace App\Models;

class Listing
{
    // Get all lisitngs
    public static function getAll()
    {
        return [
            [
                "id" => "1",
                'title' => "React Developer",
                "body" => "Curious side note: early versions of Laravel didn’t 
        even have Eloquent ORM or Blade templating — those were later 
        additions that made it the “artisan’s framework” we know. Taylor
         named the framework before it became famous, as if he already
          knew it was going to be something beautiful."
            ],
            [
                "id" => "2",
                "title" => "React Developer",
                "body" => "Curious side note: early versions of Laravel didn’t 
        even have Eloquent ORM or Blade templating — those were later 
        additions that made it the “artisan’s framework” we know. Taylor
         named the framework before it became famous, as if he already
          knew it was going to be something beautiful."
            ],
            [
                "id" => "3",
                "title" => "Java Developer",
                "body" => "Curious side note: early versions of Laravel didn’t 
        even have Eloquent ORM or Blade templating — those were later 
        additions that made it the “artisan’s framework” we know. Taylor
         named the framework before it became famous, as if he already
          knew it was going to be something beautiful."
            ],
        ];
    }


    // Get  single listing
    public static function get($id)
    {
        $listings = self::getAll();
        foreach ($listings as $listing) {
            if ($listing["id"] == $id) {
                return $listing;
            }
        }
    }
}
