<?php
    require_once "C:\wamp64\www\SPM\LJPS\backend\Job.php";

    class LJPSTest extends \PHPUnit\Framework\TestCase {
        
        public function testCreate(){
            $job = new Job("999", "Swavek", "lorem");
            $job->setJobName('Eric');
            $this->assertEquals($job->getJobName(),'Eric');
        }
    }

?>