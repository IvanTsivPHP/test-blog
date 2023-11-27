<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use App\Orchid\Layouts\Post\PostListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PostListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'posts' => Post::filters()->defaultSort('id', 'desc')->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Posts');
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->href(route('platform.posts.create')),
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
            PostListLayout::class,
        ];
    }

    public function remove(Request $request): void
    {

        $post = Post::findOrFail($request->input('id'));

        $post->delete();

        Toast::info(__('Offer was removed'));
    }
}
