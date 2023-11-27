<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use App\Models\Post;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id', __('Id')),

            TD::make('title', __('Title')),

            TD::make('published', __('Published')),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(
                    fn (Post $post) => DropDown::make(__('...'))
                        ->list([
                            Link::make(__('Edit'))
                                ->route('platform.posts.edit', [$post->id])
                                ->icon('pencil'),

                            Button::make(__('Delete'))
                                ->icon('trash')
                                ->confirm(__('Are you sure you want to delete this entry?'))
                                ->method('remove', [
                                    'id' => $post->id,
                                ]),
                        ])),

        ];
    }
}
