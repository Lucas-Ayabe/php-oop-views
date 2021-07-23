<?php

namespace Application\Presentation\Templates\MainTemplate;

use Application\Presentation\Components\Navbar\Navbar;
use Application\Presentation\Contracts\ITemplate;
use Application\Presentation\FileTemplate;

/**
 * Factory class to render a page in a template
 */
class MainTemplate
{
    private const VIEWS_DIRECTORY = __DIR__ . "/../../Views";

    public static function from(string $path, array $data = []): ITemplate
    {
        $template = new FileTemplate(__DIR__ . "/template.php");
        $pageTemplate = new FileTemplate(
            self::VIEWS_DIRECTORY . "/{$path}.php"
        );

        $template->setData([
            "title" => 'Site',
            "navbar" => new Navbar([
                [
                    'href' => '/',
                    'text' => 'Home'
                ],
                [
                    'href' => '/about-us',
                    'text' => 'About us'
                ],
                [
                    'href' => '/contact',
                    'text' => 'Contact'
                ],
            ]),
            'page' => $pageTemplate->setData($data)
        ]);

        return $template;
    }
}
