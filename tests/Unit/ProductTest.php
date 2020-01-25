<?php

namespace Tests\Unit;

use App\Category;
use App\Subcategory;

class ProductTest extends \Tests\TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCategory()
    {
        $c = new Category;
        $c->name = 'TestCategory 1';
        $c->save();

        $this->assertTrue(!!$c->id);
        $id = $c->id;

        $c->delete();

        $c = Category::where('id', $id)->first();

        $this->assertTrue($c === null);
    }

    public function testSubcategory()
    {
        $c = new Category;
        $c->name = 'TestCategory 2';
        $c->save();
        $id = $c->id;

        $this->assertTrue(!!$c->id);

        $sc = new Subcategory;
        $sc->name = 'TestCategory';
        $sc->category_id = $c->id;
        $sc->save();
        $sid = $sc->id;

        $this->assertTrue(!!$sc->id);
        $sc->delete();
        $c->delete();

        $c = Category::where('id', $id)->first();
        $this->assertTrue($c === null);

        $sc = Subcategory::where('id', $sid)->first();
        $this->assertTrue($sc === null);
    }
}
