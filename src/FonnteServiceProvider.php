<?php

namespace OpenKOS\WhatsAppFonnte;

use Illuminate\Support\ServiceProvider;
use OpenKOS\Platform\Notification\NotificationDriverRegistration;
use OpenKOS\Platform\OpenKOSManager;

class FonnteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/fonnte.php', 'fonnte');
    }

    public function boot(OpenKOSManager $platform): void
    {
        $platform->notifications()->registerDriver(new NotificationDriverRegistration(
            name: 'openkos/fonnte',
            channel: 'whatsapp',
            driverClass: FonnteDriver::class,
            label: 'Fonnte (Unofficial)',
            config: ['token' => config('fonnte.token')],
        ));
    }
}
