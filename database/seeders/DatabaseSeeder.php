<?php

namespace Database\Seeders;

use App\Models\Quiz\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // User Admin
        $userAdmin = User::create([
            'name' => "Administrador",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);


        // Questions
        $question = Question::create(['question' => 'Em 2021, Winston bateu um bilhão de unidades vendidas. Em que mês isso aconteceu?']);
        $question->options()->create([
            'text' => 'Maio',
            'is_correct' => 1
        ]);
        $question->options()->create([
            'text' => 'Junho',
        ]);
        $question->options()->create([
            'text' => 'Abril',
        ]);

        $question = Question::create(['question' => 'Qual foi o lançamento mais recente de Winston em 2021?']);
        $question->options()->create([
            'text' => 'Winston Red Slims: Sabor e suavidade na sua versão longa.',
            'is_correct' => 1
        ]);
        $question->options()->create([
            'text' => 'Winston Silver: O super light do nosso portfólio.',
        ]);
        $question->options()->create([
            'text' => 'Winston Blue Slims: O suave dos longos.',
        ]);

        $question = Question::create(['question' => 'Quais são os principais atributos trabalhados em Winston?']);
        $question->options()->create([
            'text' => 'Qualidade, brasilidade e liderança.',
            'is_correct' => 1
        ]);
        $question->options()->create([
            'text' => 'Qualidade, liderança e embalagem.',
        ]);
        $question->options()->create([
            'text' => 'Qualidade, liderança e internacionalidade.',
            'is_correct' => 1
        ]);
    }
}
