<?php


namespace App\Traits;

trait Human
{
    public function getGenders()
    {
        return [
            'man',
            'woman'
        ];
    }

    public function getFullName()
    {
        return $this->name . " " . $this->surname;
    }

    public function getOld()
    {
        $birthday = new \DateTime("1997-10-09");
        $today = new \DateTime();
        $diff = $today->diff($birthday);
        return $diff->y;

    }

    public function getGender()
    {
        if ($this->gender == "man") {
            return "Kişi";
        } else {
            return "Qadın";
        }
    }
}
