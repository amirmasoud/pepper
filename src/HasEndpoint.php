<?php

namespace Amirmasoud\Pepper;

interface HasEndpoint
{
    public function HasEndpoint(): bool;

    public function endpointFields(): array;

    public function endpointRelations(): array;

    public function guessFieldType(string $field): string;

    public function getFields(): array;

    public function typeName(): string;

    public function getName(): string;

    public function getDescription(): string;

    public function getQueryName(): string;

    public function getQueryDescription(): string;

    // public function resolve();

    // public function toArray(): array;

    // public function collection(): array;
}
