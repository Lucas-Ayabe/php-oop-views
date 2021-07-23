<?php

namespace Application\Presentation\Components\Navbar;

use Application\Presentation\FileTemplate;

class Navbar extends FileTemplate
{
    private array $links;

    public function __construct(array $links = [])
    {
        parent::__construct(__DIR__ . "/template.php");
        $this->links = $links;
    }

    public function setData(array $links = []): self
    {
        if (!empty($links)) {
            $this->links = $links;
        }

        return $this;
    }

    public function render(array $links = []): string
    {
        $this->setData($links);
        return parent::render(["items" => $this->links]);
    }

    public function print(array $links = []): void
    {
        echo $this->render($links);
    }
}
