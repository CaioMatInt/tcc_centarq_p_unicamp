<?php

namespace App\Services;

use App\Repositories\ComplaintRepository;

class ComplaintService extends EloquentService
{

    private $complaintRepository;

    /**
     * ComplaintService constructor.
     * @param complaintRepository $complaintRepository
     */
    public function __construct(ComplaintRepository $complaintRepository)
    {
        $this->complaintRepository = $complaintRepository;
        parent::__construct($complaintRepository);
    }


}
