<?php
namespace LmcUserTest\Factory\Form;

use Laminas\Form\FormElementManager;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Hydrator\ClassMethods;
use LmcUser\Factory\Form\Register as RegisterFactory;
use LmcUser\Options\ModuleOptions;
use LmcUser\Mapper\User as UserMapper;

class RegisterFormFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('laminasuser_module_options', new ModuleOptions);
        $serviceManager->setService('laminasuser_user_mapper', new UserMapper);
        $serviceManager->setService('laminasuser_register_form_hydrator', new ClassMethods());

        $formElementManager = new FormElementManager($serviceManager);
        $serviceManager->setService('FormElementManager', $formElementManager);

        $factory = new RegisterFactory();

        $this->assertInstanceOf('LmcUser\Form\Register', $factory->__invoke($serviceManager, 'LmcUser\Form\Register'));
    }
}