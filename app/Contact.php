<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Contact extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'list_id', 'subscribed', 'unsubscribed_at', 'bounced_at', 'complaint_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->uuid = Str::uuid();
        });
    }

    public function list(): BelongsTo
    {
        return $this->belongsTo(Lists::class);
    }

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class)->withPivot('value');
    }

    public function sent(): HasMany
    {
        return $this->hasMany(SendingLog::class);
    }

    public function getFieldValue($field_id)
    {
        if ($this->fields()->where('field_id', $field_id)->first()) {
            return $this->fields()->where('field_id', $field_id)->first()->pivot->value;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('subscribed', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('subscribed', 0);
    }
}
