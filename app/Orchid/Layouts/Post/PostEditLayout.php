<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Input::make('post.title')
                ->type('text')
                ->required()
                ->title(__('Title')),

            Quill::make('post.html')
                ->required(),

            CheckBox::make('post.published')
                ->value(1)
                ->title(__('Published')),
        ];

    }
}
