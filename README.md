# OpenKOS WhatsApp Fonnte

Fonnte WhatsApp notification driver for OpenKOS.

## Installation

```sh
composer require openkos/whatsapp-fonnte
```

Set the Fonnte token in the application environment:

```dotenv
FONNTE_TOKEN=your-fonnte-token
```

The package registers the `openkos/fonnte` WhatsApp driver automatically. In
OpenKOS settings, select the `fonnte` driver and save its token when using
application-managed credentials.

Fonnte does not support WhatsApp pairing or QR codes.
