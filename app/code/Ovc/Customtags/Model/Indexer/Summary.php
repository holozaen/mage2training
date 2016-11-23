<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 11:44
 */

namespace Ovc\Customtags\Model\Indexer;


use Magento\Framework\Indexer\ActionInterface;
use Magento\Framework\Mview\ActionInterface as mviewActionInterface;

class Summary implements ActionInterface, mviewActionInterface
{

    /**
     * Execute full indexation
     *
     * @return void
     */
    public function executeFull()
    {
        // TODO: Implement executeFull() method.
    }

    /**
     * Execute partial indexation by ID list
     *
     * @param int[] $ids
     * @return void
     */
    public function executeList(array $ids)
    {
        // TODO: Implement executeList() method.
    }

    /**
     * Execute partial indexation by ID
     *
     * @param int $id
     * @return void
     */
    public function executeRow($id)
    {
        // TODO: Implement executeRow() method.
    }

    /**
     * Execute materialization on ids entities
     *
     * @param int[] $ids
     * @return void
     * @api
     */
    public function execute($ids)
    {
        // TODO: Implement execute() method.
    }
}