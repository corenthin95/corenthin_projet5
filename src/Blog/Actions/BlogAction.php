<?php

namespace App\Blog\Actions;

use App\Models\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogAction
{
    /**
     * @var RendererInteface
     */
    private $renderer;

    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');
        if ($slug) {
            return $this->home($slug);
        } else {
            return $this->index();
        }
    }

    public function index(): string
    {
        return $this->renderer->render('@blog/index');
    }

    public function home(string $slug): string
    {
        return $this->renderer->render('@blog/home', [
            'slug' => $slug
        ]);
    }
}