<?php

namespace WeArePixel\LaravelModelObjects;

trait HasLaravelModelObject
{
    private $encryptionEnabled;

    public function __construct()
    {
        parent::__construct();
    }

    public function getHiddenProperties()
    {
        $hiddenProperties = $this->hiddenProperties ?? [];

        if (config('laravel-model-objects.hide_primary_key')) {
            $hiddenProperties[] = $this->getKeyName() ?? 'id';
        }

        if (config('laravel-model-objects.hide_timestamps')) {
            $hiddenProperties[] = 'created_at';
            $hiddenProperties[] = 'updated_at';
        }

        return $hiddenProperties;
    }

    public function getModelObjectAttribute()
    {
        // return a json object of the model, with hidden properties removed
        $model = $this->toArray();

        foreach ($this->getHiddenProperties() as $hiddenProperty) {
            unset($model[$hiddenProperty]);
        }

        return !empty($this->modelObjectPrefix) ? $this->modelObjectPrefix.':'.json_encode($model) : json_encode($model);
    }
}
