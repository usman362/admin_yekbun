<?php

namespace Database\Seeders;

use App\Helpers\LanguagesHelpers;
use App\Jobs\TranslateLanguageKeywords;
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

        LanguageDetail::truncate();

        foreach ($languages as $language) {
            TranslateLanguageKeywords::dispatch($language->id, $language->code);
        }
    }
}
