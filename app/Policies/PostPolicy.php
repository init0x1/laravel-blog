<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine if the user can view any posts.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine if the user can view the post.
     */
    public function view(User $user, Post $post): bool
    {
        return true; // Anyone can view posts
    }

    /**
     * Determine if the user can create posts.
     */
    public function create(User $user): bool
    {
        return true; // Authenticated users can create posts
    }

    /**
     * Determine if the user can update the post.
     */
    public function update(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You are not authorized to update this post');
    }

    /**
     * Determine if the user can delete the post.
     */
    public function delete(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You are not authorized to delete this post');
    }
}
