<?php


namespace Magneto\Blog\ViewModel;


use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magneto\Blog\Service\PostRepository;

class Blog implements ArgumentInterface
{
    /**
     * @var SerializerInterface
     */
    private $_serializer;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * Blog constructor.
     * @param SerializerInterface $serializer
     * @param PostRepository $postRepository
     * @param UrlInterface $url
     */
    public function __construct(
        SerializerInterface $serializer,
        PostRepository $postRepository,
        UrlInterface $url
    ) {
        $this->_serializer = $serializer;
        $this->postRepository = $postRepository;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPostsJSON(): string
    {
        $posts = $this->getPosts();
        return $this->_serializer->serialize($posts);
    }

    /**
     * @return array
     */
    public function getPosts(): array
    {
        $postSearchResults = $this->postRepository->get();

        $result = [];

        foreach ($postSearchResults->getItems() as $post) {
            $result[] = [
                "id"             => $post->getId(),
                "title"          => $post->getTitle(),
                "published_date" => $post->getCreationTime(),
                "author"         => "Alex Cher",
                "url"            => $this->url->getUrl($post->getIdentifier()),
                "content"        => $this->truncate($post->getContent()),
            ];
        }

        return $result;
    }

    /**
     * @param string $sentence
     * @param int $max_words
     * @return string
     */
    private function truncate(string $sentence, int $max_words = 50): string
    {
        $sentence = strip_tags($sentence);
        if($max_words < 0) return $sentence;

        $sentence_array = explode(' ', $sentence);

        if(count($sentence_array) > $max_words) {
            $sentence = implode(' ', array_slice($sentence_array, 0, $max_words));
        }
        return $sentence;
    }
}
