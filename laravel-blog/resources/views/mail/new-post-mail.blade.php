<x-mail::message>
# New Post

{{ $post->author->title }} has posted recently.
Click here to read the post.

<x-mail::button :url="route('post.show', ['user' => $post->author, 'post' => $post])">
Read the Post
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
