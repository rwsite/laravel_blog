<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Comment>
 */
class CommentResource extends ModelResource
{
    protected string $model = Comment::class;

    protected string $title = 'Комментарии';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Textarea::make('Content'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
