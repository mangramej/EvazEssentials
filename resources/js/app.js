import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import 'tw-elements';
import 'flowbite';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
