<?php
return [

    /*
*
* Shared translations.
*
*/
    'title' => 'مثبت التطبيق',
    'next' => 'الخطوة التالية',
    'back' => 'السابق',
    'refresh' => 'تحديث الصفحة',
    'checkagain' => 'التحقق مرة أخرى',
    'finish' => 'تثبيت',
    'forms' => [
        'errorTitle' => 'حدثت الأخطاء التالية:',
    ],

    /*
*
* Home page translations.
*
*/
    'welcome' => [
        'templateTitle' => 'مرحبًا بك في التطبيق',
        'title' => 'مثبت التطبيق',
        'message' => 'معالج التثبيت السهل وإعداد التطبيق.',
        'body' => 'يرجى اتباع جميع التعليمات التالية خطوة بخطوة.',
        'next' => 'التحقق من الشروط',
    ],

    /*
*
* Requirements page translations.
*
*/
    'requirements' => [
        'templateTitle' => 'الخطوة 1 | متطلبات الخادم',
        'title' => 'متطلبات الخادم',
        'next' => 'التحقق من الأذونات',
    ],

    /*
*
* Permissions page translations.
*
*/
    'permissions' => [
        'templateTitle' => 'الخطوة 2 | الأذونات',
        'title' => 'الأذونات',
        'next' => 'تكوين البيئة',
    ],

    /*
*
* Environment page translations.
*
*/
    'environment' => [
        'menu' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة',
            'title' => 'إعدادات البيئة',
            'desc' => 'يرجى تحديد كيفية تكوين ملف تطبيق <code>.env</code>.',
            'wizard-button' => 'إعداد معالج النموذج',
            'classic-button' => 'محرر النص الكلاسيكي',
        ],
        'wizard' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة | معالج موجه',
            'title' => 'معالج إعدادات البيئة الموجه',
            'tabs' => [
                'verify' => 'التحقق',
                'environment' => 'البيئة',
                'database' => 'قاعدة البيانات',
                'application' => 'التطبيق',
            ],
            'form' => [
                'name_required' => 'مطلوب اسم البيئة.',
                'app_name_label' => 'اسم التطبيق',
                'app_name_placeholder' => 'اسم التطبيق',
                'app_environment_label' => 'بيئة التطبيق',
                'app_environment_label_local' => 'محلي',
                'app_environment_label_developement' => 'تطوير',
                'app_environment_label_qa' => 'جودة',
                'app_environment_label_production' => 'إنتاج',
                'app_environment_label_other' => 'آخر',
                'app_environment_placeholder_other' => 'أدخل بيئتك...',
                'app_debug_label' => 'تصحيح التطبيق',
                'app_debug_label_true' => 'صحيح',
                'app_debug_label_false' => 'غير صحيح',
                'app_log_level_label' => 'مستوى سجل التطبيق',
                'app_log_level_label_debug' => 'تصحيح',
                'app_log_level_label_info' => 'معلومات',
                'app_log_level_label_notice' => 'إشعار',
                'app_log_level_label_warning' => 'تحذير',
                'app_log_level_label_error' => 'خطأ',
                'app_log_level_label_critical' => 'حرج',
                'app_log_level_label_alert' => 'تنبيه',
                'app_log_level_label_emergency' => 'طوارئ',
                'app_url_label' => 'رابط التطبيق',
                'app_url_placeholder' => 'رابط التطبيق',
                'env_key_error' => 'لقد قدمت مفتاح الشراء خاطئًا.',
                'db_connection_failed' => 'تعذر الاتصال بقاعدة البيانات.',
                'db_connection_error_importing' => 'حدث خطأ! تحقق من اتصال قاعدة البيانات الخاصة بك أو تأكد من أن هذه قاعدة البيانات فارغة',
                'db_error_importing' => 'حدث خطأ! تأكد من أن هذه قاعدة البيانات فارغة',
                'db_connection_label' => 'اتصال قاعدة البيانات',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'خادم قاعدة البيانات',
                'db_host_placeholder' => 'خادم قاعدة البيانات',
                'db_port_label' => 'منفذ قاعدة البيانات',
                'db_port_placeholder' => 'منفذ قاعدة البيانات',
                'db_name_label' => 'اسم قاعدة البيانات',
                'db_name_placeholder' => 'اسم قاعدة البيانات',
                'db_username_label' => 'اسم مستخدم قاعدة البيانات',
                'db_username_placeholder' => 'اسم مستخدم قاعدة البيانات',
                'db_password_label' => 'كلمة مرور قاعدة البيانات',
                'db_password_placeholder' => 'كلمة مرور قاعدة البيانات',

                'app_tabs' => [
                    'email_for_news' => 'عنوان البريد الإلكتروني',
                    'email_for_news_placeholder' => 'أدخل بريدك الإلكتروني لتلقي أحدث التحديثات',
                    'more_info' => 'مزيد من المعلومات',
                    'broadcasting_title' => 'البث والتخزين المؤقت، الجلسة، والطابور',
                    'broadcasting_label' => 'سائق البث',
                    'broadcasting_placeholder' => 'سائق البث',
                    'cache_label' => 'سائق التخزين المؤقت',
                    'cache_placeholder' => 'سائق التخزين المؤقت',
                    'session_label' => 'سائق الجلسة',
                    'session_placeholder' => 'سائق الجلسة',
                    'queue_label' => 'سائق الطابور',
                    'queue_placeholder' => 'سائق الطابور',
                    'redis_label' => 'سائق ريديس',
                    'redis_host' => 'خادم ريديس',
                    'redis_password' => 'كلمة مرور ريديس',
                    'redis_port' => 'منفذ ريديس',

                    'mail_label' => 'بريد',
                    'mail_driver_label' => 'معرف البريد',
                    'mail_driver_placeholder' => 'سائق البريد',
                    'mail_host_label' => 'خادم البريد',
                    'mail_host_placeholder' => 'خادم البريد',
                    'mail_port_label' => 'منفذ البريد',
                    'mail_port_placeholder' => 'منفذ البريد',
                    'mail_username_label' => 'اسم مستخدم البريد',
                    'mail_username_placeholder' => 'اسم مستخدم البريد',
                    'mail_password_label' => 'كلمة مرور البريد',
                    'mail_password_placeholder' => 'كلمة مرور البريد',
                    'mail_encryption_label' => 'تشفير البريد',
                    'mail_encryption_placeholder' => 'تشفير البريد',

                    'pusher_label' => 'بوشر',
                    'pusher_app_id_label' => 'هوية تطبيق بوشر',
                    'pusher_app_id_palceholder' => 'هوية تطبيق بوشر',
                    'pusher_app_key_label' => 'مفتاح تطبيق بوشر',
                    'pusher_app_key_palceholder' => 'مفتاح تطبيق بوشر',
                    'pusher_app_secret_label' => 'سر تطبيق بوشر',
                    'pusher_app_secret_palceholder' => 'سر تطبيق بوشر',
                ],
                'buttons' => [
                    'setup_verify' => 'التحقق من الشراء',
                    'setup_env' => 'التالي إعداد البيئة',
                    'setup_database' => 'التالي إعداد قاعدة البيانات',
                    'setup_application' => 'التالي إعداد التطبيق',
                    'install' => 'انقر للتثبيت',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'الخطوة 3 | إعدادات البيئة | محرر كلاسيكي',
            'title' => 'محرر البيئة الكلاسيكي',
            'save' => 'حفظ .env',
            'back' => 'استخدام معالج النموذج',
            'install' => 'حفظ وتثبيت',
        ],
        'success' => 'تم حفظ إعدادات ملف .env الخاص بك بنجاح.',
        'errors' => 'تعذر حفظ ملف .env، يرجى إنشاؤه يدويًا.',
    ],

    'install' => 'تثبيت',

    /*
    *
    * Installed Log translations.
    *
    */
    'installed' => [
        'success_log_message' => 'تم تثبيت مثبت التطبيق بنجاح في ',
    ],

    /*
    *
    * Final page translations.
    *
    */
    'final' => [
        'title' => 'انتهاء التثبيت',
        'templateTitle' => 'انتهاء التثبيت',
        'finished' => 'تم تثبيت التطبيق بنجاح.',
        'migration' => 'نتائج الهجرة والبذر:',
        'console' => 'نتائج وحدة التحكم في التطبيق:',
        'log' => 'إدخال سجل التثبيت:',
        'env' => 'ملف .env النهائي:',
        'exit' => 'انقر هنا للخروج',
    ],

    /*
    *
    * Update specific translations
    *
    */
    'updater' => [
        /*
        *
        * Shared translations.
        *
        */
        'title' => 'محدث التطبيق',

        /*
        *
        * Welcome page translations for update feature.
        *
        */
        'welcome' => [
            'title' => 'مرحبًا بك في المحدث',
            'message' => 'مرحبًا بك في معالج التحديث.',
        ],

        /*
        *
        * Welcome page translations for update feature.
        *
        */
        'overview' => [
            'title' => 'نظرة عامة',
            'message' => 'هناك تحديث واحد.|هناك :number تحديثات.',
            'install_updates' => 'تثبيت التحديثات',
        ],

        /*
        *
        * Final page translations.
        *
        */
        'final' => [
            'title' => 'انتهاء',
            'finished' => 'تم تحديث قاعدة بيانات التطبيق بنجاح.',
            'exit' => 'انقر هنا للخروج',
        ],

        'log' => [
            'success_message' => 'تم تحديث مثبت التطبيق بنجاح في ',
        ],

    ],
];
