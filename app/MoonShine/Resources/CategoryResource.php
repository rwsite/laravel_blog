<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\PostCategory;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<PostCategory>
 */
class CategoryResource extends ModelResource
{
    protected string $model = PostCategory::class;

    protected string $title = 'Категории';

    public function fields(): array
    {
        return [
            Block::make([
                Image::make('Thumbnail', 'image'),
                ID::make()->sortable(),
                Text::make('Title'),
                /*Slug::make('Slug'),*/
                Textarea::make('Content'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
