<?php

namespace TemperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCohort
 *
 * @ORM\Table(name="user_cohort")
 * @ORM\Entity(repositoryClass="TemperBundle\Repository\UserCohortRepository")
 */
class UserCohort
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="onboarding_perentage", type="integer")
     */
    private $onboardingPerentage;

    /**
     * @var int
     *
     * @ORM\Column(name="count_applications", type="integer")
     */
    private $countApplications;

    /**
     * @var int
     *
     * @ORM\Column(name="count_accepted_applications", type="integer")
     */
    private $countAcceptedApplications;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return UserCohort
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return UserCohort
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set onboardingPerentage
     *
     * @param integer $onboardingPerentage
     *
     * @return UserCohort
     */
    public function setOnboardingPerentage($onboardingPerentage)
    {
        $this->onboardingPerentage = $onboardingPerentage;

        return $this;
    }

    /**
     * Get onboardingPerentage
     *
     * @return int
     */
    public function getOnboardingPerentage()
    {
        return $this->onboardingPerentage;
    }

    /**
     * Set countApplications
     *
     * @param integer $countApplications
     *
     * @return UserCohort
     */
    public function setCountApplications($countApplications)
    {
        $this->countApplications = $countApplications;

        return $this;
    }

    /**
     * Get countApplications
     *
     * @return int
     */
    public function getCountApplications()
    {
        return $this->countApplications;
    }

    /**
     * Set countAcceptedApplications
     *
     * @param integer $countAcceptedApplications
     *
     * @return UserCohort
     */
    public function setCountAcceptedApplications($countAcceptedApplications)
    {
        $this->countAcceptedApplications = $countAcceptedApplications;

        return $this;
    }

    /**
     * Get countAcceptedApplications
     *
     * @return int
     */
    public function getCountAcceptedApplications()
    {
        return $this->countAcceptedApplications;
    }
}

