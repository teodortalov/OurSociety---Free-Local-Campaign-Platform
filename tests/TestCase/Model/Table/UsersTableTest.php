<?php
declare(strict_types = 1);

namespace OurSociety\Test\TestCase\Model\Table;

/**
 * OurSociety\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends AppTableTest
{
    /**
     * {@inheritdoc}
     */
    public function provideValidationDefault(): array
    {
        return array_merge([
            'success (role is admin)' => [
                'field' => 'role',
                'value' => 'admin',
            ],
            'success (role is citizen)' => [
                'field' => 'role',
                'value' => 'citizen',
            ],
            'success (role is politician)' => [
                'field' => 'role',
                'value' => 'politician',
            ],
            'error (role is NOT in list)' => [
                'field' => 'role',
                'value' => 'unknown',
                'error' => ['inList' => 'The only valid roles are "admin", "citizen", "politician".'],
            ],
            // TODO: Validate rest of fields.
        ], parent::provideValidationDefault());
    }

    /**
     * {@inheritdoc}
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete();
        parent::testBuildRules(); // TODO: Implement.
    }

    /**
     * Test findAuth method
     *
     * @return void
     */
    public function testFindAuth(): void
    {
        $expected = $this->table->query();
        $actual = $this->table->find('auth');

        self::assertEquals($expected, $actual);
    }
}
