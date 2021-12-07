<?php

namespace Tests\Unit\Models\Traits;

use App\Models\Traits\Sluggable;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SluggableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_method_to_add_the_slug_to_the_model()
    {
        $model = new SluggableStub([
            'title' => 'Some Random String',
            'slug' => null,
        ]);
        $model->addSlug();

        $this->assertEquals('some-random-string', $model->getAttribute('slug'));
    }

    /** @test */
    public function find_by_slug_returns_the_model()
    {
        $model = SluggableStub::create([
            'title' => 'Test Find By Slug',
            'slug' => 'test-find-by-slug',
        ]);

        $record = $model::findBySlug('test-find-by-slug');

        $this->assertInstanceOf(Model::class, $record);
        $this->assertTrue($record->is($model));
    }

    /** @test */
    public function find_by_slug_works_with_custom_save_to_column_name()
    {
        Schema::create('sluggable_test', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('custom_slug_column');
            $table->timestamps();
        });

        $model = new class extends Model
        {
            use Sluggable;
            protected $table = 'sluggable_test';
            protected $sluggable = ['save_to' => 'custom_slug_column'];
            protected $attributes = [
                'title' => 'Test find by custom slug column',
                'custom_slug_column' => 'test-find-by-custom-slug-column',
            ];
        };
        $model->save();

        $record = $model::findBySlug('test-find-by-custom-slug-column');

        $this->assertInstanceOf(Model::class, $record);
        $this->assertTrue($record->is($model));
    }

    /** @test */
    public function it_throws_an_exception_when_find_by_slug_does_not_exist()
    {
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        SluggableStub::findBySlug('test-exception');
    }

    /** @test */
    public function it_defaults_the_build_slug_from_column_to_title()
    {
        $this->assertEquals('title', (new SluggableStub)->buildSlugFrom());
    }

    /** @test */
    public function it_allows_to_override_a_method_to_indicate_from_which_column_to_generate_the_slug()
    {
        $model = new class extends Model
        {
            use Sluggable;

            public function buildSlugFrom(): string
            {
                return 'custom_build_from_column';
            }
        };

        $this->assertEquals('custom_build_from_column', $model->buildSlugFrom());
    }

    /** @test */
    public function it_defaults_the_save_to_column_to_slug()
    {
        $this->assertEquals('slug', (new SluggableStub)->saveSlugTo());
    }

    /** @test */
    public function it_allows_to_override_a_method_to_indicate_to_which_column_the_slug_should_be_saved()
    {
        $model = new class extends Model
        {
            use Sluggable;

            public function saveSlugTo(): string
            {
                return 'custom_save_to_column';
            }
        };

        $this->assertEquals('custom_save_to_column', $model->saveSlugTo());
    }

    /** @test */
    public function it_allows_models_to_define_a_property_to_indicate_the_build_and_save_columns()
    {
        $model = new class extends Model
        {
            use Sluggable;
            protected $sluggable = [
                'build_from' => 'custom_build_from_column',
                'save_to' => 'custom_save_to_column',
            ];
        };

        $this->assertEquals('custom_build_from_column', $model->buildSlugFrom());
        $this->assertEquals('custom_save_to_column', $model->saveSlugTo());
    }

    /** @test */
    public function it_defines_a_get_route_key_name_method()
    {
        $model = new SluggableStub;

        $this->assertTrue(method_exists($model, 'getRouteKeyName'));
        $this->assertEquals('slug', $model->getRouteKeyName());
    }

    /**
     * Refresh the in-memory database.
     *
     * @override \Illuminate\Foundation\Testing\RefreshDatabase
     *
     * @return void
     */
    protected function refreshDatabase()
    {
        Schema::create('sluggable_stubs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });

        $this->app[Kernel::class]->setArtisan(null);
    }
}

class SluggableStub extends Model
{
    use Sluggable;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;
}
