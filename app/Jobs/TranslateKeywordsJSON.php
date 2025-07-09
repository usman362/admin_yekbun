<?php

namespace App\Jobs;

use App\Models\LanguageDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;

class TranslateKeywordsJSON implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $languageId;
    public $langCode;
    public $keywords;
    public $mainSection;
    public $sectionName;
    public $json;

    public function __construct($languageId, $langCode, $mainSection, $sectionName, $json)
    {
        $this->languageId = $languageId;
        $this->mainSection = $mainSection;
        $this->sectionName = $sectionName;
        $this->json = $json;
        $this->langCode = Str::lower($langCode);
    }

    public function handle(): void
    {

        foreach ($this->json as $keyword) {
            $translated = $keyword['translated'];

            if ($this->langCode !== 'en') {
                try {
                    $tr = new GoogleTranslate($this->langCode);
                    $translated = $tr->translate($keyword['translated']);
                } catch (\Exception $e) {
                    $translated = $keyword['translated'];
                }
            }

            LanguageDetail::updateOrCreate(['language_id' => $this->languageId, 'keyword' => $keyword['keyword']], [
                'language_id'   => $this->languageId,
                'keyword'       => $keyword['keyword'],
                'translated'    => $translated,
                'main_section'  => $this->mainSection,
                'section_name'  => $this->sectionName,
            ]);
        }
    }
}
