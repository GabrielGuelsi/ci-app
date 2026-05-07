<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesRenderTest extends TestCase
{
    /**
     * @return array<string, array<int, string>>
     */
    public static function pageRoutes(): array
    {
        return [
            'home' => ['/'],
            'welcome' => ['/home'],
            'study-in-ireland' => ['/study-in-ireland'],
            'already-in-ireland' => ['/already-in-ireland'],
            'career-bridge' => ['/career-bridge'],
            'for-employers' => ['/for-employers'],
            'why-ci-ireland' => ['/why-ci-ireland'],
            'start-your-plan' => ['/start-your-plan'],
            'pt.home' => ['/pt'],
            'pt.welcome' => ['/pt/home'],
            'pt.study-in-ireland' => ['/pt/study-in-ireland'],
            'pt.already-in-ireland' => ['/pt/already-in-ireland'],
            'pt.career-bridge' => ['/pt/career-bridge'],
            'pt.for-employers' => ['/pt/for-employers'],
            'pt.why-ci-ireland' => ['/pt/why-ci-ireland'],
            'pt.start-your-plan' => ['/pt/start-your-plan'],
        ];
    }

    /**
     * @dataProvider pageRoutes
     */
    public function test_page_renders_without_errors(string $url): void
    {
        $this->get($url)->assertOk();
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function legacyRedirects(): array
    {
        return [
            'about' => ['/about', '/why-ci-ireland'],
            'higher-education' => ['/higher-education', '/study-in-ireland'],
            'professional' => ['/professional', '/career-bridge'],
            'corporate' => ['/corporate', '/for-employers'],
            'erasmus' => ['/erasmus', '/study-in-ireland'],
            'teens' => ['/teens', '/study-in-ireland'],
        ];
    }

    /**
     * @dataProvider legacyRedirects
     */
    public function test_legacy_url_redirects_to_new_page(string $from, string $to): void
    {
        $this->get($from)->assertRedirect($to);
    }
}
