<?php
    require_once "C:\wamp64\www\SPM\LJPS\backend\Job.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\JobDAO.php";

    class LJPSTest extends \PHPUnit\Framework\TestCase {
        
        public function testGetJobName(){
            $job = new Job("999", "Swavek", "lorem");
            $job->setJobName('Eric');
            $this->assertEquals($job->getJobName(),'Eric');
        }

        public function testCreateJob(){
            $job = new Job("999", "Swavek", "lorem");
            $dao = new JobDAO();
            $status = $dao->create($job);
            $this->assertEquals($status, true);
        }

        
    }

?>