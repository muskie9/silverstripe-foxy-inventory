<?php

namespace Dynamic\Foxy\Inventory\Test\Extension;

use Dynamic\Foxy\Extension\Purchasable;
use Dynamic\Foxy\Inventory\Extension\ProductExpirationManager;
use Dynamic\Foxy\Inventory\Extension\ProductInventoryManager;
use Dynamic\Foxy\Inventory\Model\CartReservation;
use Dynamic\Foxy\Inventory\Test\TestOnly\Page\TestProduct;
use Dynamic\Foxy\Model\Variation;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;

class ProductExpirationManagerTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * @var array
     */
    protected static $extra_dataobjects = [
        TestProduct::class,
    ];

    /**
     * @var array
     */
    protected static $required_extensions = [
        TestProduct::class => [
            Purchasable::class,
            ProductInventoryManager::class,
            ProductExpirationManager::class,
        ],
    ];

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();

        Config::modify()->set('Dynamic\\Foxy\\SingleSignOn\\Client\\CustomerClient', 'foxy_sso_enabled', false);
        Config::modify()->set(Variation::class, 'has_one', ['TestProduct' => TestProduct::class]);
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = Injector::inst()->create(TestProduct::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertInstanceOf(GridField::class, $fields->dataFieldByName('CartReservations'));
    }

    /**
     * @throws \SilverStripe\ORM\ValidationException
     */
    public function testGetCartReservations()
    {
        $this->markTestSkipped();
        $object = Injector::inst()->create(TestProduct::class);
        $object->CartExpiration = 1;

        $this->assertEquals(0, $object->getCartReservations()->count());

        for ($i = 0; $i < 5; $i++) {
            $reservation = CartReservation::create();
            if ($i < 3) {
                $reservation->Expires = date('Y-m-d H:i:s', strtotime('tomorrow'));
            }
            $reservation->ProductID = $object->ID;
            $reservation->write();
        }

        $object2 = TestProduct::get()->byID($object->ID);

        $this->assertEquals(3, $object2->getCartReservations()->count());
    }
}
