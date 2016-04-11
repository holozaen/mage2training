<?php

namespace Training\SetCustomerPwdCommand\Model;

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerRegistry;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;

class PasswordSetter
{

    /**
     * @var AccountManagementInterface
     */
    private $accountManagement;
    /**
     * @var State
     */
    private $state;
    /**
     * @var CustomerRegistry
     */
    private $customerRegistry;
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * PasswordSetter constructor.
     * @param CustomerRepositoryInterface $customerRepository
     * @param AccountManagementInterface $accountManagement
     * @param CustomerRegistry $customerRegistry
     * @param State $state
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        AccountManagementInterface $accountManagement,
        CustomerRegistry $customerRegistry,
        State $state)
    {
        $this->customerRepository = $customerRepository;
        $this->accountManagement = $accountManagement;
        $this->state = $state;
        $state->setAreaCode(Area::AREA_FRONTEND);
        $this->customerRegistry = $customerRegistry;
    }


    /**
     * @param string $email
     * @param string $password
     * @throws \Exception
     */
    public function setByEmail($email, $password)
    {
        try {
            $customer = $this->customerRepository->get($email);
            $customerSecure = $this->customerRegistry->retrieveSecureData($customer->getId());
            $hash = $this->accountManagement->getPasswordHash($password);
            $customerSecure->setPasswordHash($hash);
            $customerSecure->setRpToken(null);
            $customerSecure->setRpTokenCreatedAt(null);

            $this->customerRepository->save($customer, $password);
        } catch (\Exception $e) {
            $message = "Could not set new password for user ".$email;
            throw new \Exception($message);
        }
    }
}