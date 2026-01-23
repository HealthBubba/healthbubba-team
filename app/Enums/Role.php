<?php

namespace App\Enums;

enum Role:string {

    case ADMIN = 'admin';
    case SUPERADMIN = 'super_admin';
    case MARKETER = 'marketer';
    case PATIENT = 'patient';

    function label(){
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::SUPERADMIN => 'Super Administrator',
            self::MARKETER => 'Marketer',
            self::PATIENT => 'Patient',
        };
    }

    static function managers(){
        return [self::ADMIN, self::SUPERADMIN];
    }

    static function options(){
        return [
            self::ADMIN->value => self::ADMIN->label(),
            self::SUPERADMIN->value => self::SUPERADMIN->label(),
            self::MARKETER->value => self::MARKETER->label(),
            self::PATIENT->value => self::PATIENT->label(),
        ];
    }

}