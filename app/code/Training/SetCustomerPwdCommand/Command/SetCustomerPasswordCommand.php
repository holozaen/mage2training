<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 07.04.16
 * Time: 11:48
 */

namespace Training\SetCustomerPwdCommand\Command;


use Exception;
use Magento\Customer\Model\Customer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Training\SetCustomerPwdCommand\Model\PasswordSetter;
//use Training\SetCustomerPwdCommand\Model\PasswordSetter\Proxy as PasswordSetter; //alternative: wird erst generiert durch 1. Aufruf

class SetCustomerPasswordCommand extends command
{

    /**
     * @var PasswordSetter
     */
    private $passwordSetter;

    /**
     * SetCustomerPasswordCommand constructor.
     * @param PasswordSetter $passwordSetter
     */
    public function __construct(
        PasswordSetter $passwordSetter
    )
    {
        parent::__construct();

        $this->passwordSetter = $passwordSetter;
    }

    public function configure()
    {
        $this->setName('customer:password:set')
            ->setDescription('Sets new customer password')
            ->setDefinition([
                new InputArgument(
                    'email',
                    InputArgument::REQUIRED,
                    'Please input customer email'
                ),
                new InputArgument(
                    'password',
                    InputArgument::REQUIRED,
                    'Please input password'
                ),
            ]);
        parent::configure();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try{
            $this->updateCustomerPassword($input, $output);
        } catch (\Exception $e){
            $message='Error: ' . $e->getMessage();
            $output->writeln("<error>$message</error>");
        }
     }


    private function updateCustomerPassword(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        $this->passwordSetter->setByEmail($email, $password);
        $this->displaySuccessMessage($output, $email);
    }

    private function displaySuccessMessage(OutputInterface $output, $email)
    {
        $message = "Updated password for customer " . $email;
        $output->writeln("<info>$message</info>");
    }
}