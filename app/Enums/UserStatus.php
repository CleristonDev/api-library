<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTIVE()
 * @method static static INACTIVE()
 * @method static static PENDING_CONFIRMATION()
 * @method static static EMAIL_PENDING_CONFIRMATION()
 */
final class UserStatus extends Enum
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const PENDING_CONFIRMATION = 'pending_confirmation';
    const EMAIL_PENDING_CONFIRMATION = 'email_pending_confirmation';
}
