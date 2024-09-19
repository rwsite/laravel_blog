<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;

#[Icon('heroicons.outline.book-open')]
class PostResource extends ModelResource
{
    protected string $model = Post::class;
    protected string $title = 'Статьи';
    //protected array $with = ['category']; // Eager load
    protected string $sortColumn = ''; // Поле сортировки по умолчанию
    protected string $sortDirection = 'DESC'; // Тип сортировки по умолчанию
    protected int $itemsPerPage = 25; // Количество элементов на странице

    // public string $column = 'id'; // Поле для отображения значений в связях и хлебных крошках

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

    public function getActiveActions(): array
    {
        return ['create', 'view', 'update', 'delete', 'massDelete'];
    }
}
