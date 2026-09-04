<?php

use OpenKOS\Platform\OpenKOSManager;
use OpenKOS\WhatsAppFonnte\FonnteDriver;
use OpenKOS\WhatsAppFonnte\FonntePlugin;
use OpenKOS\WhatsAppFonnte\FonnteServiceProvider;

it('registers the fonnte driver with the platform registry', function () {
    $platform = app(OpenKOSManager::class);
    $provider = new FonnteServiceProvider(app());

    $provider->register();
    $provider->boot($platform);

    expect($platform->notifications()->get('openkos/fonnte'))->not->toBeNull()
        ->and($platform->notifications()->get('openkos/fonnte')->driverClass)->toBe(FonnteDriver::class)
        ->and($platform->notifications()->get('openkos/fonnte')->config)->toBe(['token' => null]);
});

it('registers the fonnte driver through the canonical plugin entrypoint', function () {
    $platform = app(OpenKOSManager::class);
    $plugin = new FonntePlugin;

    $plugin->register($platform);

    expect($plugin->manifest()->id)->toBe('openkos/whatsapp-fonnte')
        ->and($platform->notifications()->get('openkos/fonnte')->driverClass)->toBe(FonnteDriver::class);
});
