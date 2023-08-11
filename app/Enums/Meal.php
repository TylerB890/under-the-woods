<?php

namespace App\Enums;

enum Meal: string
{
    case Breakfast = 'Breakfast';
    case Brunch = 'Brunch';
    case Lunch = 'Lunch';
    case Dinner = 'Dinner';
    case Dessert = 'Dessert';
    case Snack = 'Snack';
}
