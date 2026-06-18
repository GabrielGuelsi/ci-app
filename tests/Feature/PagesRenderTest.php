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
            'higher-education' => ['/higher-education'],
            'career-bridge' => ['/career-bridge'],
            'for-employers' => ['/for-employers'],
            'why-ci-ireland' => ['/why-ci-ireland'],
            'pt.home' => ['/pt'],
            'pt.welcome' => ['/pt/home'],
            'pt.higher-education' => ['/pt/higher-education'],
            'pt.career-bridge' => ['/pt/career-bridge'],
            'pt.for-employers' => ['/pt/for-employers'],
            'pt.why-ci-ireland' => ['/pt/why-ci-ireland'],
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
            'study-in-ireland' => ['/study-in-ireland', '/higher-education'],
            'already-in-ireland' => ['/already-in-ireland', '/higher-education'],
            'professional' => ['/professional', '/career-bridge'],
            'corporate' => ['/corporate', '/for-employers'],
            'erasmus' => ['/erasmus', '/higher-education'],
            'teens' => ['/teens', '/higher-education'],
            'start-your-plan' => ['/start-your-plan', '/higher-education'],
            'pt.start-your-plan' => ['/pt/start-your-plan', '/higher-education'],
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
