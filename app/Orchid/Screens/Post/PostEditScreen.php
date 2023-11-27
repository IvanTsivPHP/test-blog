<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use App\Orchid\Layouts\Post\PostEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    public $post;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Post $post): iterable
    {
        return [
            'post' => $post,
            ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        $action = $this->post->exists ? __('Edit') : __('Create');

        return $action . ' Post';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PostEditLayout::class,
        ];
    }

    public function save(Request $request, Post $post): RedirectResponse
    {
        $post->fill($request->get('post'));

        $post->save();

        Toast::info(__('Post was saved'));

        return redirect()->route('platform.posts');
    }

    public function remove(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('platform.posts');
    }
}
