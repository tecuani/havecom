<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    /** @test */
    public function guests_can_see_the_products_show()
    {
        $product = Product::factory()->count(5)->create()->first();

        $this->get("/productos/$product->slug")
            ->assertViewIs('products.show')
            ->assertSeeInOrder([
                $product->image,
                $product->title,
                $product->cost/100,
                'Cantidad',
                'AGREGAR AL CARRITO',
                $product->body,
                'Tambien te puede gustar',
            ])
            ->assertViewHas('recomended', fn ($recomended) => $recomended->count() === 3)
            ->assertSuccessful();
    }
}
