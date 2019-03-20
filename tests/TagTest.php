<?php

class TagTest extends DiceTest {

    public function testNonexistentTag() {
        $objects = $this->dice->getAll( 'a tag' );
        $this->assertCount( 0, $objects );
    }

    public function testExistentTag() {
        $dice = $this->dice->addRules(
            [
                A::class => [ 'tag' => 'ABC' ],
                B::class => [ 'tag' => 'ABC' ],
                C::class => [ 'tag' => 'ABC' ]
            ]
        );

        $objects = iterator_to_array($dice->getAll('ABC'));

        $this->assertCount(3, $objects );
        $this->assertInstanceOf(A::class, $objects[0]);
        $this->assertInstanceOf(B::class, $objects[1]);
        $this->assertInstanceOf(C::class, $objects[2]);
    }


}