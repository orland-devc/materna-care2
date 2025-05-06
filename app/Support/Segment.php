<?php

namespace App\Support;

use Illuminate\Support\Str;

class Segment
{
    protected string $model;

    protected ?string $tenantId;

    protected ?string $tenantColumn;

    protected ?array $filters;

    protected string $slug;

    protected string $monthYear;

    protected string $modelCode;

    const ALPHA_FORMAT = 1; // COM-XXXX-XXXX

    const ALPHA_PATTERN = '/([a-zA-Z0-9]{3})-?([a-zA-Z0-9]{4})-?([a-zA-Z0-9]{4})/';

    public function __construct(string $model, ?string $tenantId = null, $tenantColumn = 'company_id', ?array $filters = null)
    {
        $this->model = $model;
        $this->tenantId = $tenantId;
        $this->tenantColumn = $tenantColumn;
        $this->filters = $filters;
    }

    public static function of(string $model, ?string $tenantId = null): self
    {
        return new self($model, $tenantId);
    }

    public function generate($format = self::ALPHA_FORMAT): self
    {
        if ($format === self::ALPHA_FORMAT) {
            $this->slug = "{$this->getModelCode()}{$this->getMonthYear()}{$this->getTenantCount()}";
        }

        return $this;
    }

    public function raw(): string
    {
        return $this->slug;
    }

    public function display($pattern = self::ALPHA_PATTERN): string
    {
        return Str::of($this->slug)->replaceMatches($pattern, '$1-$2-$3');
    }

    public static function toRaw(string $str, $pattern = self::ALPHA_PATTERN): string
    {
        return Str::of($str)->replaceMatches($pattern, '$1$2$3');
    }

    public static function toDisplay(string $str, $pattern = self::ALPHA_PATTERN): string
    {
        return Str::of($str)->replaceMatches($pattern, '$1-$2-$3');
    }

    private function getMonthYear(): string
    {

        return $this->monthYear ?? now()->format('ym');
    }

    public function setMonthYear(string $monthYear): self
    {
        $this->monthYear = $monthYear;

        return $this;
    }

    private function getTenantCount(): string
    {
        $count = $this->model::when($this->tenantId, function ($query) {
            return $query->where($this->tenantColumn, $this->tenantId)->when($this->filters, function ($query) {
                foreach ($this->filters as $column => $value) {
                    $query->where($column, $value);
                }
            });
        })->max('id') + 1;

        return Str::of($count)->padLeft(4, '0');
    }

    private function getModelCode(): string
    {
        return $this->modelCode ?? Str::of(class_basename($this->model))->substr(0, 3)->upper();
    }

    public function setModelCode(string $code): self
    {
        $this->modelCode = $code;

        return $this;
    }
}
