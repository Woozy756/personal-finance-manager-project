<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Salary',
                'type' => 'income',
                'icon' => 'fas fa-money-check-alt',
                'description' => 'Main income from full-time or part-time employment.'
            ],
            [
                'name' => 'Investments',
                'type' => 'income',
                'icon' => 'fas fa-chart-line',
                'description' => 'Dividends, interest earned, or capital gains from stocks/crypto.'
            ],
            [
                'name' => 'Housing',
                'type' => 'expense',
                'icon' => 'fas fa-home',
                'description' => 'Rent, mortgage payments, and home maintenance.'
            ],
            [
                'name' => 'Food & Dining',
                'type' => 'expense',
                'icon' => 'fas fa-utensils',
                'description' => 'Groceries, restaurants, and delivery services.'
            ],
            [
                'name' => 'Utilities',
                'type' => 'expense',
                'icon' => 'fas fa-bolt',
                'description' => 'Electricity, water, internet, and phone bills.'
            ],
            [
                'name' => 'Transportation',
                'type' => 'expense',
                'icon' => 'fas fa-car',
                'description' => 'Fuel, public transit, insurance, and repairs.'
            ],
            [
                'name' => 'Entertainment',
                'type' => 'expense',
                'icon' => 'fas fa-film',
                'description' => 'Movies, streaming services, hobbies, and events.'
            ],
            [
                'name' => 'Health',
                'type' => 'expense',
                'icon' => 'fas fa-heartbeat',
                'description' => 'Gym memberships, medical bills, and pharmacy.'
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
