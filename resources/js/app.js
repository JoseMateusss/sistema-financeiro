import './bootstrap';
import Alpine from 'alpinejs';

import flasher from "@flasher/flasher";
window.flasher = flasher; // only if you want to use it globally

window.Alpine = Alpine;


Alpine.start()
