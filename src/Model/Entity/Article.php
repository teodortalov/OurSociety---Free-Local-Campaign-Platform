<?php
declare(strict_types=1);

namespace OurSociety\Model\Entity;

use Cake\Utility\Text;
use Faker\Factory as Example;
use OurSociety\View\AppView;
use OurSociety\View\Component\Field\FieldList;

/**
 * Article Entity
 *
 * @property string $id
 * @property string $politician_id
 * @property string $electoral_district_id
 * @property string $slug
 * @property string $name
 * @property string $body
 * @property int $version
 * @property \Cake\I18n\FrozenTime $approved
 * @property \Cake\I18n\FrozenTime $published
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \OurSociety\Model\Entity\Category $aspect
 * @property \OurSociety\Model\Entity\ArticleType $article_type
 * @property \OurSociety\Model\Entity\ElectoralDistrict $electoral_district
 * @property \OurSociety\Model\Entity\User $politician
 *
 * @property int $read_time Estimated read time (in minutes)
 * @property bool $is_example
 */
class Article extends AppEntity
{
    public static function example(array $data = null): self
    {
        $example = Example::create();
        $data = $data ?? [];
        $data += [
            'name' => 'Example Article',
            'body' => '<p>' . implode($example->paragraphs(random_int(10, 50)), '</p><p>') . '</p>',
            'aspect' => Category::random(),
            'article_type' => ArticleType::example(),
            'politician' => User::example(),
            'is_example' => true,
        ];

        return new self($data);
    }

    public function getScaffoldFieldList(): FieldList
    {
        return FieldList::fromArray($this->getModel(), [
            'politician_id',
            'name' => ['title' => 'Article Title'],
            'approved',
            'published',
        ]);
    }

    public function printArticleType(): string
    {
        return ($this->article_type ?? new ArticleType)->printName();
    }

    public function renderAspectIcon(AppView $view, array $options = null): string
    {
        $name = $this->aspect ? $this->aspect->slug : 'government-operation-politics';
        $options = ($options ?? []) + ['iconSet' => 'topic'];

        return $view->Html->icon($name, $options);
    }

    public function renderMunicipalViewLink(AppView $view, array $options = null): string
    {
        $text = $options['text'] ?? $this->name;

        if ($this->is_example) {
            return $text;
        }

        return $view->Html->link($text, [
            '_name' => 'municipality:article',
            'municipality' => $this->electoral_district->slug,
            'article' => $this->slug,
        ], $options ?? []);
    }

    public function renderPoliticianEditButton(AppView $view): string
    {
        return $view->Html->link(__('Edit article'), [
            'prefix' => 'politician/profile',
            'controller' => 'Articles',
            'action' => 'edit',
            $this->slug,
        ], ['class' => 'btn btn-default']);
    }

    public function printTruncatedBody(int $length = null): string
    {
        $bodyHtml = $this->_properties['body'] ?? 'Error: article body not found!';
        $bodyPlain = strip_tags(str_replace('<', ' <', $bodyHtml));

        return Text::truncateByWidth($bodyPlain, $length ?? 100);
    }

    public function renderProfileLink(AppView $view): string
    {
        return $view->Html->link($this->politician->name, $this->politician->getPublicProfileRoute());
    }

    public function getIcon(): string
    {
        return 'newspaper-o';
    }

    public function isApproved(): bool
    {
        $approved = $this->_properties['approved'] ?? null;

        return $approved === null;
    }

    public function isPublished(): bool
    {
        $published = $this->_properties['published'] ?? null;

        return $published === null;
    }

    public function isApprovedAndPublished(): bool
    {
        return $this->isApproved() && $this->isPublished();
    }

    public function isAuthor(User $user): bool
    {
        $authorId = $this->_properties['politician_id'] ?? null;

        return $authorId === $user->id;
    }

    public function renderPublishedDate(AppView $view): string
    {
        $published = $this->_properties['published'];

        if ($published === null) {
            return __('Unpublished');
        }

        return $view->Time->niceLong($published);
    }

    public function belongsTo(User $identity): bool
    {
        $ownerId = $this->_properties['politician_id'] ?? null;

        if ($ownerId === null) {
            return false;
        }

        // TODO: Should also return true if an article is written by another representative in the same municipality?

        return $ownerId === $identity->id;
    }

    /**
     * Read time.
     *
     * @link https://blog.medium.com/read-time-and-you-bc2048ab620c Medium Read Time (Reference Implementation)
     * @return int Estimated read time (in minutes).
     */
    protected function _getReadTime(): int
    {
        $adultReadingSpeed = 275; // WPM
        $wordCount = str_word_count($this->body);
        $readTimeMinutes = $wordCount / $adultReadingSpeed;

        $imageCount = substr_count($this->body, '<img');
        switch ($imageCount) {
            case 1:
                $imageTimeSeconds = 12;
                break;
            case 2:
                $imageTimeSeconds = 11;
                break;
            case 3:
                $imageTimeSeconds = 10;
                break;
            case 4:
                $imageTimeSeconds = 9;
                break;
            case 5:
                $imageTimeSeconds = 8;
                break;
            case 6:
                $imageTimeSeconds = 7;
                break;
            case 7:
                $imageTimeSeconds = 6;
                break;
            case 8:
                $imageTimeSeconds = 5;
                break;
            case 9:
                $imageTimeSeconds = 4;
                break;
            default:
                $imageTimeSeconds = $imageCount * 3;
        }
        $imageTimeMinutes = $imageTimeSeconds / MINUTE;

        return max((int)round($readTimeMinutes + $imageTimeMinutes), 1);
    }
}
