<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'header',
        'short_header',
        'content',
        'photo',
    ];

    /**
     * Get user who uploaded this article.
     * 
     * @return BelongsTo
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
    

    /**
     * Mutator for photo field.
     * 
     * @return Attribute
     */
    public function photo(): Attribute
    {
        return Attribute::make(
            fn ($value) => Storage::disk('public')->url($value)
        );
    }
    
    /**
     * Get first 300 characters of unformatted content.
     *
     * @return string
     */
    public function shortContent(): string
    {
        $shortContent = strip_tags($this->content);
        
        return $shortContent > 300 ?
            mb_substr($shortContent, 0, 300) . '...' :
            $shortContent;
    }
}
