<?php
// @link https://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Advanced+Metadata
namespace PHPSTORM_META {

	override(
		\Cake\ORM\TableRegistry::get(0),
		map([
			'Answers' => \OurSociety\Model\Table\AnswersTable::class,
			'App' => \OurSociety\Model\Table\AppTable::class,
			'ArticleTypes' => \OurSociety\Model\Table\ArticleTypesTable::class,
			'Articles' => \OurSociety\Model\Table\ArticlesTable::class,
			'Audits' => \OurSociety\Model\Table\AuditsTable::class,
			'Candidates' => \OurSociety\Model\Table\CandidatesTable::class,
			'Categories' => \OurSociety\Model\Table\CategoriesTable::class,
			'CategoriesUsers' => \OurSociety\Model\Table\CategoriesUsersTable::class,
			'Contests' => \OurSociety\Model\Table\ContestsTable::class,
			'DistrictTypes' => \OurSociety\Model\Table\DistrictTypesTable::class,
			'Elections' => \OurSociety\Model\Table\ElectionsTable::class,
			'ElectoralDistricts' => \OurSociety\Model\Table\ElectoralDistrictsTable::class,
			'Events' => \OurSociety\Model\Table\EventsTable::class,
			'Nodes' => \OurSociety\Model\Table\NodesTable::class,
			'OfficeTypes' => \OurSociety\Model\Table\OfficeTypesTable::class,
			'Offices' => \OurSociety\Model\Table\OfficesTable::class,
			'PoliticianAwards' => \OurSociety\Model\Table\PoliticianAwardsTable::class,
			'PoliticianPositions' => \OurSociety\Model\Table\PoliticianPositionsTable::class,
			'PoliticianQualifications' => \OurSociety\Model\Table\PoliticianQualificationsTable::class,
			'PoliticianVideos' => \OurSociety\Model\Table\PoliticianVideosTable::class,
			'Questions' => \OurSociety\Model\Table\QuestionsTable::class,
			'States' => \OurSociety\Model\Table\StatesTable::class,
			'Users' => \OurSociety\Model\Table\UsersTable::class,
			'ValueMatches' => \OurSociety\Model\Table\ValueMatchesTable::class,
			'VoteVariations' => \OurSociety\Model\Table\VoteVariationsTable::class,
			'CakeDC/Enum.Lookups' => \CakeDC\Enum\Model\Table\LookupsTable::class,
			'DebugKit.Panels' => \DebugKit\Model\Table\PanelsTable::class,
			'DebugKit.Requests' => \DebugKit\Model\Table\RequestsTable::class,
		])
	);

	override(
		\Cake\ORM\Locator\LocatorInterface::get(0),
		map([
			'Answers' => \OurSociety\Model\Table\AnswersTable::class,
			'App' => \OurSociety\Model\Table\AppTable::class,
			'ArticleTypes' => \OurSociety\Model\Table\ArticleTypesTable::class,
			'Articles' => \OurSociety\Model\Table\ArticlesTable::class,
			'Audits' => \OurSociety\Model\Table\AuditsTable::class,
			'Candidates' => \OurSociety\Model\Table\CandidatesTable::class,
			'Categories' => \OurSociety\Model\Table\CategoriesTable::class,
			'CategoriesUsers' => \OurSociety\Model\Table\CategoriesUsersTable::class,
			'Contests' => \OurSociety\Model\Table\ContestsTable::class,
			'DistrictTypes' => \OurSociety\Model\Table\DistrictTypesTable::class,
			'Elections' => \OurSociety\Model\Table\ElectionsTable::class,
			'ElectoralDistricts' => \OurSociety\Model\Table\ElectoralDistrictsTable::class,
			'Events' => \OurSociety\Model\Table\EventsTable::class,
			'Nodes' => \OurSociety\Model\Table\NodesTable::class,
			'OfficeTypes' => \OurSociety\Model\Table\OfficeTypesTable::class,
			'Offices' => \OurSociety\Model\Table\OfficesTable::class,
			'PoliticianAwards' => \OurSociety\Model\Table\PoliticianAwardsTable::class,
			'PoliticianPositions' => \OurSociety\Model\Table\PoliticianPositionsTable::class,
			'PoliticianQualifications' => \OurSociety\Model\Table\PoliticianQualificationsTable::class,
			'PoliticianVideos' => \OurSociety\Model\Table\PoliticianVideosTable::class,
			'Questions' => \OurSociety\Model\Table\QuestionsTable::class,
			'States' => \OurSociety\Model\Table\StatesTable::class,
			'Users' => \OurSociety\Model\Table\UsersTable::class,
			'ValueMatches' => \OurSociety\Model\Table\ValueMatchesTable::class,
			'VoteVariations' => \OurSociety\Model\Table\VoteVariationsTable::class,
			'CakeDC/Enum.Lookups' => \CakeDC\Enum\Model\Table\LookupsTable::class,
			'DebugKit.Panels' => \DebugKit\Model\Table\PanelsTable::class,
			'DebugKit.Requests' => \DebugKit\Model\Table\RequestsTable::class,
		])
	);

	override(
		\Cake\Datasource\ModelAwareTrait::loadModel(0),
		map([
			'Answers' => \OurSociety\Model\Table\AnswersTable::class,
			'App' => \OurSociety\Model\Table\AppTable::class,
			'ArticleTypes' => \OurSociety\Model\Table\ArticleTypesTable::class,
			'Articles' => \OurSociety\Model\Table\ArticlesTable::class,
			'Audits' => \OurSociety\Model\Table\AuditsTable::class,
			'Candidates' => \OurSociety\Model\Table\CandidatesTable::class,
			'Categories' => \OurSociety\Model\Table\CategoriesTable::class,
			'CategoriesUsers' => \OurSociety\Model\Table\CategoriesUsersTable::class,
			'Contests' => \OurSociety\Model\Table\ContestsTable::class,
			'DistrictTypes' => \OurSociety\Model\Table\DistrictTypesTable::class,
			'Elections' => \OurSociety\Model\Table\ElectionsTable::class,
			'ElectoralDistricts' => \OurSociety\Model\Table\ElectoralDistrictsTable::class,
			'Events' => \OurSociety\Model\Table\EventsTable::class,
			'Nodes' => \OurSociety\Model\Table\NodesTable::class,
			'OfficeTypes' => \OurSociety\Model\Table\OfficeTypesTable::class,
			'Offices' => \OurSociety\Model\Table\OfficesTable::class,
			'PoliticianAwards' => \OurSociety\Model\Table\PoliticianAwardsTable::class,
			'PoliticianPositions' => \OurSociety\Model\Table\PoliticianPositionsTable::class,
			'PoliticianQualifications' => \OurSociety\Model\Table\PoliticianQualificationsTable::class,
			'PoliticianVideos' => \OurSociety\Model\Table\PoliticianVideosTable::class,
			'Questions' => \OurSociety\Model\Table\QuestionsTable::class,
			'States' => \OurSociety\Model\Table\StatesTable::class,
			'Users' => \OurSociety\Model\Table\UsersTable::class,
			'ValueMatches' => \OurSociety\Model\Table\ValueMatchesTable::class,
			'VoteVariations' => \OurSociety\Model\Table\VoteVariationsTable::class,
			'CakeDC/Enum.Lookups' => \CakeDC\Enum\Model\Table\LookupsTable::class,
			'DebugKit.Panels' => \DebugKit\Model\Table\PanelsTable::class,
			'DebugKit.Requests' => \DebugKit\Model\Table\RequestsTable::class,
		])
	);

	override(
		\ModelAwareTrait::loadModel(0),
		map([
			'Answers' => \OurSociety\Model\Table\AnswersTable::class,
			'App' => \OurSociety\Model\Table\AppTable::class,
			'ArticleTypes' => \OurSociety\Model\Table\ArticleTypesTable::class,
			'Articles' => \OurSociety\Model\Table\ArticlesTable::class,
			'Audits' => \OurSociety\Model\Table\AuditsTable::class,
			'Candidates' => \OurSociety\Model\Table\CandidatesTable::class,
			'Categories' => \OurSociety\Model\Table\CategoriesTable::class,
			'CategoriesUsers' => \OurSociety\Model\Table\CategoriesUsersTable::class,
			'Contests' => \OurSociety\Model\Table\ContestsTable::class,
			'DistrictTypes' => \OurSociety\Model\Table\DistrictTypesTable::class,
			'Elections' => \OurSociety\Model\Table\ElectionsTable::class,
			'ElectoralDistricts' => \OurSociety\Model\Table\ElectoralDistrictsTable::class,
			'Events' => \OurSociety\Model\Table\EventsTable::class,
			'Nodes' => \OurSociety\Model\Table\NodesTable::class,
			'OfficeTypes' => \OurSociety\Model\Table\OfficeTypesTable::class,
			'Offices' => \OurSociety\Model\Table\OfficesTable::class,
			'PoliticianAwards' => \OurSociety\Model\Table\PoliticianAwardsTable::class,
			'PoliticianPositions' => \OurSociety\Model\Table\PoliticianPositionsTable::class,
			'PoliticianQualifications' => \OurSociety\Model\Table\PoliticianQualificationsTable::class,
			'PoliticianVideos' => \OurSociety\Model\Table\PoliticianVideosTable::class,
			'Questions' => \OurSociety\Model\Table\QuestionsTable::class,
			'States' => \OurSociety\Model\Table\StatesTable::class,
			'Users' => \OurSociety\Model\Table\UsersTable::class,
			'ValueMatches' => \OurSociety\Model\Table\ValueMatchesTable::class,
			'VoteVariations' => \OurSociety\Model\Table\VoteVariationsTable::class,
			'CakeDC/Enum.Lookups' => \CakeDC\Enum\Model\Table\LookupsTable::class,
			'DebugKit.Panels' => \DebugKit\Model\Table\PanelsTable::class,
			'DebugKit.Requests' => \DebugKit\Model\Table\RequestsTable::class,
		])
	);

	override(
		\Cake\ORM\Table::addBehavior(0),
		map([
			'CounterCache' => \Cake\ORM\Table::class,
			'Timestamp' => \Cake\ORM\Table::class,
			'Translate' => \Cake\ORM\Table::class,
			'Tree' => \Cake\ORM\Table::class,
			'AuditLog' => \Cake\ORM\Table::class,
			'DefaultOrder' => \Cake\ORM\Table::class,
			'Slug' => \Cake\ORM\Table::class,
			'AuditStash.AuditLog' => \Cake\ORM\Table::class,
			'CakeDC/Enum.Enum' => \Cake\ORM\Table::class,
			'DebugKit.Timed' => \Cake\ORM\Table::class,
			'Josegonzalez/Upload.Upload' => \Cake\ORM\Table::class,
			'Muffin/Orderly.Orderly' => \Cake\ORM\Table::class,
			'Muffin/Slug.Slug' => \Cake\ORM\Table::class,
			'Search.Search' => \Cake\ORM\Table::class,
		])
	);

	override(
		\Cake\Controller\Controller::loadComponent(0),
		map([
			'Auth' => \OurSociety\Controller\Component\AuthComponent::class,
			'Cookie' => \Cake\Controller\Component\CookieComponent::class,
			'Csrf' => \Cake\Controller\Component\CsrfComponent::class,
			'Flash' => \OurSociety\Controller\Component\FlashComponent::class,
			'Paginator' => \Cake\Controller\Component\PaginatorComponent::class,
			'RequestHandler' => \Cake\Controller\Component\RequestHandlerComponent::class,
			'Security' => \Cake\Controller\Component\SecurityComponent::class,
			'Crud' => \OurSociety\Controller\Component\CrudComponent::class,
			'Crud.Crud' => \Crud\Controller\Component\CrudComponent::class,
			'DebugKit.Toolbar' => \DebugKit\Controller\Component\ToolbarComponent::class,
			'Gourmet/KnpMenu.Menu' => \Gourmet\KnpMenu\Controller\Component\MenuComponent::class,
			'Search.Prg' => \Search\Controller\Component\PrgComponent::class,
		])
	);

	override(
		\Cake\View\View::loadHelper(0),
		map([
			'Breadcrumbs' => \OurSociety\View\Helper\BreadcrumbsHelper::class,
			'Flash' => \OurSociety\View\Helper\FlashHelper::class,
			'Form' => \OurSociety\View\Helper\FormHelper::class,
			'Html' => \OurSociety\View\Helper\HtmlHelper::class,
			'Number' => \Cake\View\Helper\NumberHelper::class,
			'Paginator' => \OurSociety\View\Helper\PaginatorHelper::class,
			'Rss' => \Cake\View\Helper\RssHelper::class,
			'Session' => \Cake\View\Helper\SessionHelper::class,
			'Text' => \Cake\View\Helper\TextHelper::class,
			'Time' => \OurSociety\View\Helper\TimeHelper::class,
			'Url' => \OurSociety\View\Helper\UrlHelper::class,
			'Video' => \OurSociety\View\Helper\VideoHelper::class,
			'Bake.Bake' => \Bake\View\Helper\BakeHelper::class,
			'Bake.DocBlock' => \Bake\View\Helper\DocBlockHelper::class,
			'BootstrapUI.Breadcrumbs' => \BootstrapUI\View\Helper\BreadcrumbsHelper::class,
			'BootstrapUI.Flash' => \BootstrapUI\View\Helper\FlashHelper::class,
			'BootstrapUI.Form' => \BootstrapUI\View\Helper\FormHelper::class,
			'BootstrapUI.Html' => \BootstrapUI\View\Helper\HtmlHelper::class,
			'BootstrapUI.Paginator' => \BootstrapUI\View\Helper\PaginatorHelper::class,
			'CrudView.CrudView' => \CrudView\View\Helper\CrudViewHelper::class,
			'DebugKit.Credentials' => \DebugKit\View\Helper\CredentialsHelper::class,
			'DebugKit.SimpleGraph' => \DebugKit\View\Helper\SimpleGraphHelper::class,
			'DebugKit.Tidy' => \DebugKit\View\Helper\TidyHelper::class,
			'DebugKit.Toolbar' => \DebugKit\View\Helper\ToolbarHelper::class,
			'Gourmet/KnpMenu.Menu' => \Gourmet\KnpMenu\View\Helper\MenuHelper::class,
			'Migrations.Migration' => \Migrations\View\Helper\MigrationHelper::class,
			'VideoEmbed.Video' => \VideoEmbed\View\Helper\VideoHelper::class,
		])
	);

	override(
		\Cake\ORM\Table::belongsTo(0),
		map([
			'Answers' => \Cake\ORM\Association\BelongsTo::class,
			'App' => \Cake\ORM\Association\BelongsTo::class,
			'ArticleTypes' => \Cake\ORM\Association\BelongsTo::class,
			'Articles' => \Cake\ORM\Association\BelongsTo::class,
			'Audits' => \Cake\ORM\Association\BelongsTo::class,
			'Candidates' => \Cake\ORM\Association\BelongsTo::class,
			'Categories' => \Cake\ORM\Association\BelongsTo::class,
			'CategoriesUsers' => \Cake\ORM\Association\BelongsTo::class,
			'Contests' => \Cake\ORM\Association\BelongsTo::class,
			'DistrictTypes' => \Cake\ORM\Association\BelongsTo::class,
			'Elections' => \Cake\ORM\Association\BelongsTo::class,
			'ElectoralDistricts' => \Cake\ORM\Association\BelongsTo::class,
			'Events' => \Cake\ORM\Association\BelongsTo::class,
			'Nodes' => \Cake\ORM\Association\BelongsTo::class,
			'OfficeTypes' => \Cake\ORM\Association\BelongsTo::class,
			'Offices' => \Cake\ORM\Association\BelongsTo::class,
			'PoliticianAwards' => \Cake\ORM\Association\BelongsTo::class,
			'PoliticianPositions' => \Cake\ORM\Association\BelongsTo::class,
			'PoliticianQualifications' => \Cake\ORM\Association\BelongsTo::class,
			'PoliticianVideos' => \Cake\ORM\Association\BelongsTo::class,
			'Questions' => \Cake\ORM\Association\BelongsTo::class,
			'States' => \Cake\ORM\Association\BelongsTo::class,
			'Users' => \Cake\ORM\Association\BelongsTo::class,
			'ValueMatches' => \Cake\ORM\Association\BelongsTo::class,
			'VoteVariations' => \Cake\ORM\Association\BelongsTo::class,
			'CakeDC/Enum.Lookups' => \Cake\ORM\Association\BelongsTo::class,
			'DebugKit.Panels' => \Cake\ORM\Association\BelongsTo::class,
			'DebugKit.Requests' => \Cake\ORM\Association\BelongsTo::class,
		])
	);

	override(
		\Cake\ORM\Table::hasOne(0),
		map([
			'Answers' => \Cake\ORM\Association\HasOne::class,
			'App' => \Cake\ORM\Association\HasOne::class,
			'ArticleTypes' => \Cake\ORM\Association\HasOne::class,
			'Articles' => \Cake\ORM\Association\HasOne::class,
			'Audits' => \Cake\ORM\Association\HasOne::class,
			'Candidates' => \Cake\ORM\Association\HasOne::class,
			'Categories' => \Cake\ORM\Association\HasOne::class,
			'CategoriesUsers' => \Cake\ORM\Association\HasOne::class,
			'Contests' => \Cake\ORM\Association\HasOne::class,
			'DistrictTypes' => \Cake\ORM\Association\HasOne::class,
			'Elections' => \Cake\ORM\Association\HasOne::class,
			'ElectoralDistricts' => \Cake\ORM\Association\HasOne::class,
			'Events' => \Cake\ORM\Association\HasOne::class,
			'Nodes' => \Cake\ORM\Association\HasOne::class,
			'OfficeTypes' => \Cake\ORM\Association\HasOne::class,
			'Offices' => \Cake\ORM\Association\HasOne::class,
			'PoliticianAwards' => \Cake\ORM\Association\HasOne::class,
			'PoliticianPositions' => \Cake\ORM\Association\HasOne::class,
			'PoliticianQualifications' => \Cake\ORM\Association\HasOne::class,
			'PoliticianVideos' => \Cake\ORM\Association\HasOne::class,
			'Questions' => \Cake\ORM\Association\HasOne::class,
			'States' => \Cake\ORM\Association\HasOne::class,
			'Users' => \Cake\ORM\Association\HasOne::class,
			'ValueMatches' => \Cake\ORM\Association\HasOne::class,
			'VoteVariations' => \Cake\ORM\Association\HasOne::class,
			'CakeDC/Enum.Lookups' => \Cake\ORM\Association\HasOne::class,
			'DebugKit.Panels' => \Cake\ORM\Association\HasOne::class,
			'DebugKit.Requests' => \Cake\ORM\Association\HasOne::class,
		])
	);

	override(
		\Cake\ORM\Table::hasMany(0),
		map([
			'Answers' => \Cake\ORM\Association\HasMany::class,
			'App' => \Cake\ORM\Association\HasMany::class,
			'ArticleTypes' => \Cake\ORM\Association\HasMany::class,
			'Articles' => \Cake\ORM\Association\HasMany::class,
			'Audits' => \Cake\ORM\Association\HasMany::class,
			'Candidates' => \Cake\ORM\Association\HasMany::class,
			'Categories' => \Cake\ORM\Association\HasMany::class,
			'CategoriesUsers' => \Cake\ORM\Association\HasMany::class,
			'Contests' => \Cake\ORM\Association\HasMany::class,
			'DistrictTypes' => \Cake\ORM\Association\HasMany::class,
			'Elections' => \Cake\ORM\Association\HasMany::class,
			'ElectoralDistricts' => \Cake\ORM\Association\HasMany::class,
			'Events' => \Cake\ORM\Association\HasMany::class,
			'Nodes' => \Cake\ORM\Association\HasMany::class,
			'OfficeTypes' => \Cake\ORM\Association\HasMany::class,
			'Offices' => \Cake\ORM\Association\HasMany::class,
			'PoliticianAwards' => \Cake\ORM\Association\HasMany::class,
			'PoliticianPositions' => \Cake\ORM\Association\HasMany::class,
			'PoliticianQualifications' => \Cake\ORM\Association\HasMany::class,
			'PoliticianVideos' => \Cake\ORM\Association\HasMany::class,
			'Questions' => \Cake\ORM\Association\HasMany::class,
			'States' => \Cake\ORM\Association\HasMany::class,
			'Users' => \Cake\ORM\Association\HasMany::class,
			'ValueMatches' => \Cake\ORM\Association\HasMany::class,
			'VoteVariations' => \Cake\ORM\Association\HasMany::class,
			'CakeDC/Enum.Lookups' => \Cake\ORM\Association\HasMany::class,
			'DebugKit.Panels' => \Cake\ORM\Association\HasMany::class,
			'DebugKit.Requests' => \Cake\ORM\Association\HasMany::class,
		])
	);

	override(
		\Cake\ORM\Table::belongToMany(0),
		map([
			'Answers' => \Cake\ORM\Association\BelongsToMany::class,
			'App' => \Cake\ORM\Association\BelongsToMany::class,
			'ArticleTypes' => \Cake\ORM\Association\BelongsToMany::class,
			'Articles' => \Cake\ORM\Association\BelongsToMany::class,
			'Audits' => \Cake\ORM\Association\BelongsToMany::class,
			'Candidates' => \Cake\ORM\Association\BelongsToMany::class,
			'Categories' => \Cake\ORM\Association\BelongsToMany::class,
			'CategoriesUsers' => \Cake\ORM\Association\BelongsToMany::class,
			'Contests' => \Cake\ORM\Association\BelongsToMany::class,
			'DistrictTypes' => \Cake\ORM\Association\BelongsToMany::class,
			'Elections' => \Cake\ORM\Association\BelongsToMany::class,
			'ElectoralDistricts' => \Cake\ORM\Association\BelongsToMany::class,
			'Events' => \Cake\ORM\Association\BelongsToMany::class,
			'Nodes' => \Cake\ORM\Association\BelongsToMany::class,
			'OfficeTypes' => \Cake\ORM\Association\BelongsToMany::class,
			'Offices' => \Cake\ORM\Association\BelongsToMany::class,
			'PoliticianAwards' => \Cake\ORM\Association\BelongsToMany::class,
			'PoliticianPositions' => \Cake\ORM\Association\BelongsToMany::class,
			'PoliticianQualifications' => \Cake\ORM\Association\BelongsToMany::class,
			'PoliticianVideos' => \Cake\ORM\Association\BelongsToMany::class,
			'Questions' => \Cake\ORM\Association\BelongsToMany::class,
			'States' => \Cake\ORM\Association\BelongsToMany::class,
			'Users' => \Cake\ORM\Association\BelongsToMany::class,
			'ValueMatches' => \Cake\ORM\Association\BelongsToMany::class,
			'VoteVariations' => \Cake\ORM\Association\BelongsToMany::class,
			'CakeDC/Enum.Lookups' => \Cake\ORM\Association\BelongsToMany::class,
			'DebugKit.Panels' => \Cake\ORM\Association\BelongsToMany::class,
			'DebugKit.Requests' => \Cake\ORM\Association\BelongsToMany::class,
		])
	);

	override(
		\Cake\ORM\Table::find(0),
		map([
			'all' => \Cake\ORM\Query::class,
			'list' => \Cake\ORM\Query::class,
			'threaded' => \Cake\ORM\Query::class,
		])
	);

	override(
		\Cake\ORM\Association::find(0),
		map([
			'all' => \Cake\ORM\Query::class,
			'list' => \Cake\ORM\Query::class,
			'threaded' => \Cake\ORM\Query::class,
		])
	);

}