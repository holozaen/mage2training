<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.12.16
 * Time: 12:55
 */

namespace Mage2Kata\Interceptor\Test\Integration;


use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\DeploymentConfig\Reader as DeploymentConfigReader;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Module\ModuleList;
use Magento\TestFramework\ObjectManager;

class InterceptorModuleConfigTest extends \PHPUnit_Framework_TestCase
{
	private $moduleName = 'Mage2Kata_Interceptor';

	public function testTheModuleIsRegistered()
	{
		$registrar = new ComponentRegistrar();
		$this->assertArrayHasKey($this->moduleName,$registrar->getPaths(ComponentRegistrar::MODULE));
	}

	public function testTheModuleIsConfiguredAndEnabledInLiveEnvironment()
	{
		/** @var ObjectManager $objectManager */
		$objectManager = ObjectManager::getInstance();

		$directoryList = $objectManager->create(DirectoryList::class,['root'=> BP]);
		$deploymentConfigReader = $objectManager->create(DeploymentConfigReader::class,['dirList'=>$directoryList]);
		$deploymentConfig = $objectManager->create(DeploymentConfig::class, ['reader'=> $deploymentConfigReader]);


		/** @var ModuleList $moduleList */
		$moduleList = $objectManager->create(ModuleList::class, ['config' => $deploymentConfig]);
		$this->assertTrue($moduleList->has($this->moduleName));
	}
}
