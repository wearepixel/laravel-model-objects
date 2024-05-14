<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use WeArePixel\LaravelModelObjects\HasModelObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestUser extends Model
{
    use HasFactory;
    use HasModelObject;

    protected $guarded = [];

    private $hiddenProperties = [];

    protected $modelObjectPrefix;

    protected $table = 'test_users';

    protected $encryptableAttributes = [
        'date_of_birth',
        'email_verified_at',
    ];

    public function setHiddenProperties($properties)
    {
        $this->hiddenProperties = $properties;
    }

    public function setModelObjectPrefix($prefix)
    {
        $this->modelObjectPrefix = $prefix;
    }
}
