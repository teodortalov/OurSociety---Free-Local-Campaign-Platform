<?php
declare(strict_types=1);

namespace OurSociety\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property string $id The answer ID.
 * @property string $question_id The question ID.
 * @property string $user_id The user ID.
 * @property string $name The answer human name.
 * @property string $answer The answer numerical value.
 * @property \Cake\I18n\FrozenTime $created The created timestamp.
 * @property \Cake\I18n\FrozenTime $modified The modified timestamp.
 *
 * @property \OurSociety\Model\Entity\Question $question
 * @property \OurSociety\Model\Entity\User $user
 */
class Answer extends Entity
{
    public const ANSWER_STRONGLY_AGREE = 100;
    public const ANSWER_SOMEWHAT_AGREE = 50;
    public const ANSWER_SOMEWHAT_DISAGREE = -50;
    public const ANSWER_STRONGLY_DISAGREE = -100;

    public const ANSWER_YES = 75;
    public const ANSWER_NO = -75;

    public const ANSWERS_SCALE = [
        self::ANSWER_STRONGLY_AGREE => 'Strongly Agree',
        self::ANSWER_SOMEWHAT_AGREE => 'Somewhat Agree',
        self::ANSWER_SOMEWHAT_DISAGREE => 'Somewhat Disagree',
        self::ANSWER_STRONGLY_DISAGREE => 'Strongly Disagree',
    ];

    public const ANSWERS_BOOL = [
        self::ANSWER_YES => 'Yes',
        self::ANSWER_NO => 'No',
    ];

    public function __construct(array $properties = [], array $options = [])
    {
        parent::__construct($properties, $options);

        $this->_accessible = ['*' => true, 'id' => false];
        $this->_hidden = ['answer'];
    }

    protected function _getName(): string
    {
        return Answer::ANSWERS_SCALE[$this->answer] ?? Answer::ANSWERS_BOOL[$this->answer];
    }
}