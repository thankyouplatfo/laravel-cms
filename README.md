# نظام إدارة محتوى باستخدام Laravel
من خلال متابعتي لكورس (دورة تطوير تطبيقات الويب باستخدام PHP) مع (أكاديمية حسوب) قمت في هذا الجزء من بإعداد نظام إدارة محتوى يمكنك من التالي 
* إجراء عمليات crud على المستخدمين
* إجراء عمليات crud على المنشورات
*  إجراء عمليات crud على الصفحات مع وجود محرر داخلي لتحرير النصوص على طريقة (ما تراه تحصل عليه)
* التأكد من الريد الإلكتروني للمستخدم 
* التأكد من صلاحيات المستخدم وتأهله للقيام بدور معين
* وجود لوحة تحكم تحوي نضرة عامة على (الإحصائيات,المستخدمين,المنشورات,الأدورار,الصلاحيات) 
## خطوات التثبيت
* git clone https://github.com/HsoubAcademy/laravel-cms
* composer install
* php artisan migrate
* php artisan db:seed
* php artisan key:generate
* php artisan storage:link
* php artisan serve* 
* DB:seed
### إعدادات .env
* التسجيل في موقع https://mailtrap.io/
* انتقل إلى https://mailtrap.io/inboxes/ ثم Demo inbox
* انسخ اسم المستخدم وكلمة المرور إلى ملف env لتصبح الإعدادات كالتالي
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=كما وجدته في حسابك على الموقع
MAIL_PASSWORD=ما وجدته في حسابك على الموقع
```