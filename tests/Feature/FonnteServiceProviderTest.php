<?php

use OpenKOS\Platform\OpenKOSManager;
use OpenKOS\WhatsAppFonnte\FonnteDriver;
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
