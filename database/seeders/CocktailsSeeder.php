<?php

namespace Database\Seeders;


use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Http;

class CocktailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $response = Http::get("http://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Ordinary_Drink");
        if ($response ->successful()){ 
            $cocktails= $response->json();
            //var_dump($cocktails["drinks"]);
            //die;
            foreach($cocktails["drinks"] as $cocktail){
                $newCocktail = new Cocktail(); 
                $newCocktail->name = $cocktail['strDrink'];
                $newCocktail->content = $faker->paragraphs(10, true);
                $newCocktail->image = $cocktail['strDrinkThumb'];
                $newCocktail->save();
            }
            $this ->command->info('success');
        }

    }
}
