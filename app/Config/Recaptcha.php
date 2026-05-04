<?php

/**
 * This file is part of PHPDevsr/recaptcha-codeigniter4.
 *
 * (c) 2023 Denny Septian Panggabean <xamidimura@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Recaptcha extends BaseConfig
{
    /**
     * Site Key
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaSiteKey = '6Leh9NgsAAAAAH4L1w-9Gycik7-yQTrgJbyYAZ2L
';

    /**
     * Secret Key
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaSecretKey = '6Leh9NgsAAAAAMBk2xDqmw9CljeIAgUQxlNTQM51';

    /**
     * Language
     *
     * @see http://www.google.com/recaptcha/admin
     */
    public string $recaptchaLang = 'es';
}
