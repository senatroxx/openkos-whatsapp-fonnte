<?php

namespace OpenKOS\WhatsAppFonnte;

use OpenKOS\Platform\OpenKOSManager;
use OpenKOS\Platform\Plugin\Plugin;
use OpenKOS\Platform\Plugin\PluginManifest;

final class FonntePlugin extends Plugin
{
    public function manifest(): PluginManifest
    {
        return new PluginManifest(
            id: 'openkos/whatsapp-fonnte',
            name: 'Fonnte WhatsApp',
            version: '0.2.4',
            description: 'Fonnte WhatsApp notification driver for OpenKOS.',
            coreVersion: '^0.2',
        );
    }

    public function register(OpenKOSManager $platform): void
    {
        $provider = new FonnteServiceProvider(app());
        $provider->register();
        $provider->boot($platform);
    }
}
