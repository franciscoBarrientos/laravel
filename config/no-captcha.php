<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Credentials
     | ------------------------------------------------------------------------------------------------
     */
    'secret'  => getenv('NOCAPTCHA_SECRET')  ?: '6LePmBQTAAAAABmgpaMGESHRdBkLpR33XSWG40rw',
    'sitekey' => getenv('NOCAPTCHA_SITEKEY') ?: '6LePmBQTAAAAAFxJwqEwsRT43VCjmj5Ob-4DfpgH',

    /* ------------------------------------------------------------------------------------------------
     |  Localization
     | ------------------------------------------------------------------------------------------------
     */
    'lang'    => app()->getLocale(),
];
