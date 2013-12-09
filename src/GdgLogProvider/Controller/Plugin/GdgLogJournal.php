<?php

/* * 
 * Copyright (c) 2013, Gab Amba <gamba@gabbydgab.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * GdgLogProvider\Controller\Plugin\GdgLogJournal
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 */

namespace GdgLogProvider\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceLocatorInterface;
use GdgLogProvider\Service;

class GdgLogJournal extends AbstractPlugin
{
    /**
     * @var Service\LogInterface
     */
    protected $_logService;    
    
    
    /**
     * Log reader interface 
     * 
     * @param \GdgLogProvider\Controller\Plugin\LogReaderInterface $reader
     */
    public function setLoggingService(Service\LogInterface $service)
    {
        $this->_logService = $service;
    }
    
    /**
     * @return LogReaderInterface
     */
    public function getLoggingService()
    {
        return $this->_logService;
    }
    

    /**
     * Count if there are QUEUED changes in a log
     * 
     * @return boolean
     */
    public function hasQueued()
    {
        return $this->getServiceMapper()->hasQueued();
    }
    
    
    public function getServiceMapper()
    {
        return $this->getLoggingService()->getMapper();
    }
    
    
    public function getServiceEntity()
    {
        return $this->getLoggingService()->getEntity();
    }
    
    public function fetchByStatus($status)
    {
        return $this->getLoggingService()->fetchByStatus($status);
    }
}
