<?php

namespace Application\Presentation\Contracts;

interface ITemplate
{
    public function render(array $data = []): string;
    public function print(array $data = []): void;
}
