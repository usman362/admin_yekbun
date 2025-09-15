<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\LanguageDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stichoza\GoogleTranslate\GoogleTranslate;

class KurdishTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language = Language::where('code', 'KU')->first();

        $details = LanguageDetail::where('language_id', $language->id)->get();
        $tr = new GoogleTranslate();
        $tr->setTarget('ku');

        // Create progress bar
        $bar = $this->command->getOutput()->createProgressBar($details->count());
        $bar->start();

        foreach ($details as $detail) {
            $translated = $tr->translate($detail->keyword);
            $detail->translated = $translated;
            $detail->save();

            // Advance progress bar
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n✅ Translation completed!");
    }
}
