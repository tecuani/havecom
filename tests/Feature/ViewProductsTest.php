<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_see_the_products_index()
    {
        ProductCategory::factory()->count(2)->create()->first();
        Product::factory()->count(4)->create();

        $this->get(route('products.index'))
            ->assertViewIs('products.index')
            ->assertViewHas('products', fn ($products) => $products->count() === 3)
            ->assertViewHas('productCategories', fn ($productCategories) => $productCategories->count() === 2)
            ->assertSuccessful();
    }
}
