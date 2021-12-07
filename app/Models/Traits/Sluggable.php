<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable(): void
    {
        static::creating(function (Model $model) {
            $model->addSlug();
        });

        static::updating(function (Model $model) {
            $model->addSlug();
        });
    }

    public static function findBySlug(string $slug, $columns = ['*'])
    {
        $column = (new static)->saveSlugTo();

        return static::where($column, $slug)->firstOrFail($columns);
    }

    public function buildSlugFrom(): string
    {
        return $this->sluggable['build_from'] ?? 'title';
    }

    public function saveSlugTo(): string
    {
        return $this->sluggable['save_to'] ?? 'slug';
    }

    public function getRouteKeyName(): string
    {
        return $this->saveSlugTo();
    }

    public function addSlug(): void
    {
        $slug = $this->makeSlugUnique($this->generateNonUniqueSlug());

        $this->setAttribute($this->saveSlugTo(), $slug);
    }

    protected function generateNonUniqueSlug(): string
    {
        return Str::slug($this->getAttribute($this->buildSlugFrom()));
    }

    protected function makeSlugUnique(string $slug, int $suffix = 1): string
    {
        $originalSlug = $this->generateNonUniqueSlug();

        while ($this->otherRecordExistsWithSlug($slug) || empty($slug)) {
            $slug = $originalSlug.'-'.$suffix++;
        }

        return $slug;
    }

    protected function otherRecordExistsWithSlug(string $slug): bool
    {
        return static::where($this->saveSlugTo(), $slug)
            ->where($this->getKeyName(), '!=', $this->getKey() ?? '0')
            ->withoutGlobalScopes()
            ->exists();
    }
}
