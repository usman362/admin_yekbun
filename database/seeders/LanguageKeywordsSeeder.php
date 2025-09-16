<?php

namespace Database\Seeders;

use App\Helpers\LanguagesHelpers;
use App\Models\Language;
use App\Models\LanguageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::select(['_id', 'code'])->get();

        // Clear all language details before seeding again
        //LanguageDetail::truncate();

        // Create a progress bar for the number of languages
        $bar = $this->command->getOutput()->createProgressBar($languages->count());
        $bar->start();

        foreach ($languages as $language) {
            LanguagesHelpers::languages_keywords($language->id, $language->code);

            // Advance progress after each language
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n✅ Language keywords seeding completed!");
    }
}
