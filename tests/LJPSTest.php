<?php
    require_once "C:\wamp64\www\SPM\LJPS\backend\Job.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\JobDAO.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\Skill.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\SkillDAO.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\Course.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\CourseDAO.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\JobSkill.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\JobSkillDAO.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\SkillCourse.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\SkillCourseDAO.php";
    require_once "C:\wamp64\www\SPM\LJPS\backend\LJDAO.php";

    class LJPSTest extends \PHPUnit\Framework\TestCase {
        
    	// jobs
        public function testGetJobId(){
            $job = new Job("999", "Swavek", "lorem");
            $job->setJobId('900');
            $this->assertEquals($job->getJobId(),'900');
        }

        public function testGetJobName(){
            $job = new Job("999", "Swavek", "lorem");
            $job->setJobName('Eric');
            $this->assertEquals($job->getJobName(),'Eric');
        }

        public function testGetJobDescription(){
            $job = new Job("999", "Swavek", "lorem");
            $job->setJobDescription('lorem lmao');
            $this->assertEquals($job->GetJobDescription(),'lorem lmao');
        }

        public function testCreateJob(){
            $job = new Job("993", "Swavek", "lorem");
            $dao = new JobDAO();
            $status = $dao->create($job);
            $this->assertEquals($status, true);
        }

        public function testUpdateJob(){
            $job = new Job("993", "Swavek", "lorem");
            $dao = new JobDAO();
            $status = $dao->edit($job, "Eric", "lorem");
            $this->assertEquals($status, true);
        }

        public function testDeleteJob(){
            $job = new Job("993", "Eric", "lorem");
            $dao = new JobDAO();
            $status = $dao->delete($job);
            $this->assertEquals($status, true);
        }

        



        // skills

        public function testGetSkillId(){
            $skill = new Skill("99999","testing");
            $skill->setSkillId('99888');
            $this->assertEquals($skill->getSkillId(),'99888');
        }

        public function testGetSkillName(){
            $skill = new Skill("99999","testing");
            $skill->setSkillName('Eric');
            $this->assertEquals($skill->getSkillName(),'Eric');
        }

        public function testCreateSkill(){
            $skill = new Skill("99993","testing");
            $dao = new SkillDAO();
            $status = $dao->create($skill);
            $this->assertEquals($status, true);
        }

        public function testUpdateSkill(){
            $skill = new Skill("99993","testing");
            $dao = new SkillDAO();
            $status = $dao->edit($skill, "testing2");
            $this->assertEquals($status, true);
        }

        public function testDeleteSkill(){
            $skill = new Skill("99993","testing2");
            $dao = new SkillDAO();
            $status = $dao->delete($skill);
            $this->assertEquals($status, true);
        }


       	// courses

       	public function testGetCourseId(){
       		$course = new Course("TEST001","123456","testing course functions","Active","Internal",'Core');
       		$course->setCourseId("TEST002");
       		$this->assertEquals($course->getCourseId(),'TEST002');
       	}

       	public function testGetCourseName(){
       		$course = new Course("TEST001","testing","testing course functions","Active","Internal",'Core');
       		$course->setCourseName("testing2");
       		$this->assertEquals($course->getCourseName(),'testing2');
       	}

       	public function testGetCourseDesc(){
       		$course = new Course("TEST001","testing","testing course functions","Active","Internal",'Core');
       		$course->setCourseDesc("testing2 course functions");
       		$this->assertEquals($course->getCourseDesc(),'testing2 course functions');
       	}

       	public function testGetCourseStatus(){
       		$course = new Course("TEST001","testing","testing course functions","Active","Internal",'Core');
       		$course->setCourseStatus("Active2");
       		$this->assertEquals($course->getCourseStatus(),'Active2');
       	}

       	public function testGetCourseType(){
       		$course = new Course("TEST001","testing","testing course functions","Active","Internal",'Core');
       		$course->setCourseType("External");
       		$this->assertEquals($course->getCourseType(),'External');
       	}

       	public function testGetCourseCategory(){
       		$course = new Course("TEST001","testing","testing course functions","Active","Internal",'Core');
       		$course->setCourseCategory("Elective");
       		$this->assertEquals($course->getCourseCategory(),'Elective');
       	}

        // job skill
        public function testCreateJobSkill(){
            $dao = new JobSkillDAO();
            $status = $dao->create("105", "Swavek", "10007");
            $this->assertEquals($status, true);
        }

        public function testDeleteJobSkill(){
            $dao = new JobSkillDAO();
            $status = $dao->delete("105", "10007");
            $this->assertEquals($status, true);
        }

        public function testGetJobSkill_JobId(){
            $jobskill = new JobSkill("999", "Swavek", "99999");
            $jobskill->setJobId('99998');
            $this->assertEquals($jobskill->getJobId(),'99998');
        }

        public function testGetJobSkill_Name(){
            $jobskill = new JobSkill("999", "Swavek", "99999");
            $jobskill->setJobName('Eric');
            $this->assertEquals($jobskill->getJobName(),'Eric');
        }

        public function testGetJobSkill_SkillId(){
            $jobskill = new JobSkill("999", "Swavek", "99999");
            $jobskill->setSkillId('99888');
            $this->assertEquals($jobskill->getSkillId(),'99888');
        }

        // skill course
        public function testCreateSkillCourse(){
            $skillCourse = new SkillCourse("FIN002","10004");
            $dao = new SkillCourseDAO();
            $status = $dao->create($skillCourse);
            $this->assertEquals($status, true);
        }

        public function testDeleteSkillCourse(){
            $skillCourse = new SkillCourse("FIN002","10004");
            $dao = new SkillCourseDAO();
            $status = $dao->delete($skillCourse);
            $this->assertEquals($status, true);
        }

        public function testGetSkillCourse_CourseId(){
            $skillCourse = new SkillCourse("TEST001","1234567");
            $skillCourse->setCourseId("TEST002");
            $this->assertEquals($skillCourse->getCourseId(),'TEST002');
        }

        public function testGetSkillCourse_SkillId(){
            $skillCourse = new SkillCourse("TEST001","1234567");
            $skillCourse->setSkillId("7654321");
            $this->assertEquals($skillCourse->getSkillId(),'7654321');
        }

        // Learning Journey

        public function testGetLearningJourney(){
            $dao = new LJDAO();
            $status = $dao->create(130001, 105, '420', "yes", "lorem", 10006, "FIN002");
            $this->assertEquals($status, true);
        }

        public function testDeleteLearningJourney(){
            $dao = new LJDAO();
            $status = $dao->deleteLJ(130001, 105, 10006, "FIN002");
            $this->assertEquals($status, true);
        }

        public function testsetToNoLJ(){
            $dao = new LJDAO();
            $status = $dao->setToNo(130002);
            $this->assertEquals($status, true);
        }

        public function testSwitchLJ(){
            $dao = new LJDAO();
            $status = $dao->switchLJ(130002,600);
            $this->assertEquals($status, true);
        }

        public function testGetLJ_Name(){
            $lj = new LJ(130001, 105, '420', "yes", "lorem", 10006, "FIN002");
            $lj->setLearningJourneyName("421");
            $this->assertEquals($lj->getLearningJourneyName(), "421");
        }

        public function testGetLJ_Main(){
            $lj = new LJ(130001, 105, '420', "yes", "lorem", 10006, "FIN002");
            $lj->setLearningJourneyMain("no");
            $this->assertEquals($lj->getLearningJourneyMain(), "no");
        }

        public function testGetLJ_Desc(){
            $lj = new LJ(130001, 105, '420', "yes", "lorem", 10006, "FIN002");
            $lj->setLearningJourneyDescription("lorem ipsum");
            $this->assertEquals($lj->getLearningJourneyDescription(), "lorem ipsum");
        }
        
    }

?>