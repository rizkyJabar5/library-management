<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
    ];

    const string IS_ADMIN = 'admin';

    const string IS_STUDENT = 'student';

    const string IS_BORROWER = 'borrower';

    private static $roleMap = [
        self::IS_ADMIN => 1,
        self::IS_STUDENT => 2,
        self::IS_BORROWER => 3,
    ];

    public static function getId($roleName): ?int
    {
        return self::$roleMap[$roleName] ?? null;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
