<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('meal_plan')->insert([
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Lugaw with egg, arroz caldo, fried fish',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Pancit canton with egg, boiled saba',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Whole wheat pandesal, sardines, kamote',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Brown rice, grilled chicken, steamed pechay',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Ginisang sardinas with rice, fresh milk',
            'created_at' => now(),
            'updated_at' => now(),
            ],
             [
            'category' => 'Normal',
            'meal_plan' => 'Pork sinigang, rice, fresh lumpia',
            'created_at' => now(),
            'updated_at' => now(),
            ],
             [
            'category' => 'Overweight',
            'meal_plan' => 'Fried tofu, brown rice, miso soup',
            'created_at' => now(),
            'updated_at' => now(),
            ],
             [
            'category' => 'Obese',
            'meal_plan' => 'Ensaladang talong, boiled egg, grilled bangus',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Bistek Tagalog, white rice, fruit shake',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Chicken inasal, rice, laing',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Ampalaya con carne, brown rice, fresh buko juice',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Clear vegetable soup, boiled fish, kamote',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Ginataang mais, ensaymada, hot choco',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Daing na bangus, red rice, eggplant',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Chicken tinola, brown rice, steamed okra',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Grilled eggplant with egg, quinoa, green salad',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Puto with keso, fresh mango juice',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Tuyo with garlic rice, fresh tomato',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Tinolang isda, red rice, fresh coconut juice',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Fresh lumpia, grilled tofu, quinoa',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Tapsilog, atchara, fresh fruit',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Adobo flakes, brown rice, atchara',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Chicken barbecue, kamote rice, cucumber salad',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Boiled saba, clear miso soup, grilled tofu',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Severely Wasted',
            'meal_plan' => 'Arroz caldo, suman, hot chocolate',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Normal',
            'meal_plan' => 'Ginisang gulay with ground pork, rice',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Overweight',
            'meal_plan' => 'Grilled fish, steamed malunggay, kamote fries',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'category' => 'Obese',
            'meal_plan' => 'Ginataang gulay, grilled chicken, quinoa',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}