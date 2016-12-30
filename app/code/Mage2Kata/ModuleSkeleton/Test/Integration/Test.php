<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.12.16
 * Time: 12:02
 */

namespace Mage2Kata\ModuleSkeleton\Test\Integration;


use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\DeploymentConfig\Reader as ConfigReader;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Component\ComponentRegistrar;
use Magento\Framework\Module\ModuleListInterface as ModuleList;
use Magento\Framework\View\Asset\NotationResolver\Module;
use Magento\TestFramework\ObjectManager;

class SkeletonModuleConfigTest extends \PHPUnit_Framework_TestCase
{
	private $moduleName = 'Mage2Kata_ModuleSkeleton';

	public function testTheModuleIsRegistered()
	{
		$registrar = new ComponentRegistrar();
		$this->assertArrayHasKey($this->moduleName, $registrar->getPaths(ComponentRegistrar::MODULE));
	}

	public function testTheModuleIsConfiguredAndEnabledInTheTestEnvironment()
	{
		/** @var ObjectManager $objectManager */
		$objectManager = ObjectManager::getInstance();

		/** @var ModuleList $moduleList */
		$moduleList = $objectManager->create(ModuleList::class);

		$this->assertTrue($moduleList->has($this->moduleName), 'The module is not enabled in the test environment');
	}

	public function testTheModuleIsConfiguredAndEnabledInTheLiveEnvironment()
	{
		/** @var ObjectManager $objectManager */
		$objectManager = ObjectManager::getInstance();
		
		$directoryList = $objectManager->create(DirectoryList::class,['root' => BP]);

		$configReader = $objectManager->create(ConfigReader::class,['dirList' => $directoryList]);

		$deploymentConfig = $objectManager->create(DeploymentConfig::class, ['reader' => $configReader]);

		
		/** @var ModuleList $moduleList */
		$moduleList = $objectManager->create(ModuleList::class,['config'=>$deploymentConfig]);

		$this->assertTrue($moduleList->has($this->moduleName), 'The module is not enabled in the test environment');
	}

}
