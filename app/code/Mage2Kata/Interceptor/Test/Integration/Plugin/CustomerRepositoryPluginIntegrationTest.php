<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.12.16
 * Time: 13:16
 */

namespace Mage2Kata\Interceptor\Plugin;



use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use Magento\TestFramework\Interception\PluginList;
use Magento\TestFramework\ObjectManager;

class CustomerRepositoryPluginIntegrationTest extends \PHPUnit_Framework_TestCase
{
	private $moduleId = 'mage2kata_interceptor';
	/** @var  ObjectManager $objectManager */
	private $objectManager;

	/**
	 * @param string $areaCode
	 */
	private function setArea($areaCode)
	{
		$appArea = $this->objectManager->get(State::class);
		$appArea->setAreaCode($areaCode);
	}

	/**
	 * @return array
	 */
	private function getCustomerRepositoryInterfacePluginInfo()
	{
		/** @var PluginList $pluginList */
		$pluginList = $this->objectManager->create(PluginList::class);
		return $pluginList->get(CustomerRepositoryInterface::class, []); //return empty as default
	}

	protected function setUp()
	{
		$this->objectManager = ObjectManager::getInstance();
	}

	protected function tearDown()
	{
		$this->setArea(null);
	}

	public function testTheModuleInterceptsCallsToTheCustomerRepositoryInWebapiRestScope()
	{
		$this->setArea(Area::AREA_WEBAPI_REST);
		$pluginInfo = $this->getCustomerRepositoryInterfacePluginInfo();
		$this->assertSame(CustomerRepositoryPlugin::class, $pluginInfo[ $this->moduleId ]['instance']);
	}

	public function testTheModuleDoesNotInterceptCallsToTheCustomerRepositoryInGlobalScope()
	{
		$this->setArea(Area::AREA_GLOBAL);
		$this->assertArrayNotHasKey($this->moduleId, $this->getCustomerRepositoryInterfacePluginInfo());
	}

}