<?php
/**
 * Created by PhpStorm.
 * User: diesel
 * Date: 19/06/17
 * Time: 16:52
 */

namespace CaradvisorBundle\Entity\Model;


class ChangePassword
{
    /**
     * @var string
     * @SecurityAssert\UserPassword(
     *     message = "Wrong value for your current password"
     * )
     */
    private $oldPassword;
    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @return string
     */
    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    /**
     * @param string $oldPassword
     * @return ChangePassword
     */
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     * @return ChangePassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }


}